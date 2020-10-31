<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type_Sponsorship;
use App\Sponsorship;
use Braintree;

class PaymentController extends Controller
{
    
    // Funzione privata che restituisce il gateway
    private function getGateway(){

        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3pw8dbdrxkmh4xdg',
            'publicKey' => 'js8wnyfs8nst8hs2',
            'privateKey' => '45e0330486e5c7833a5ba1fb180e5fe4'
            ]);
            
            return $gateway;
        }
        
    // Funzione che porta alla pagina di pagamento
    public function index($id){
                
        $gateway = $this -> getGateway();
                
        $clientToken = $gateway->clientToken()->generate();
        $types_sponsorship = Type_Sponsorship::all();     
        
        return view('payment', compact('clientToken', 'types_sponsorship', 'id'));
    }

    // Funzione che elabora la sponsorizzazione e il pagamento
    public function payment(Request $request){

        
        $gateway = $this -> getGateway();
        $types_sponsorship = Type_Sponsorship::all();

        // Trova che tipo di sponsorizzazione ha inserito l'utente
        foreach($types_sponsorship as $sponsorship){
            if( $request -> sponsorship == $sponsorship -> name){
                // Salva il tipo
                $sponsorship_choose = $sponsorship;
                // Salva il prezzo
                $price = strval($sponsorship -> price);
            }
        }

        
        
        // Pagamento
        $result = $gateway-> transaction() -> sale([
            'amount' => $price, // prezzo
            'paymentMethodNonce' => $request -> payment_method_nonce, // metodo di pagamento
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        if($result){

            $date_now = date_create( date("Y/m/d") );
            //dd($date_now);
            if($sponsorship_choose -> name == 'h24'){
                $end_date = date_add($date_now,date_interval_create_from_date_string("1 days"));
            }

            elseif($sponsorship_choose -> name == 'h72'){
                $end_date = date_add($date_now,date_interval_create_from_date_string("3 days"));
            }

            elseif($sponsorship_choose -> name == 'h144'){
                $end_date = date_add($date_now,date_interval_create_from_date_string("6 days"));
            }

            //dd($end_date);
            $new_sponsorship = Sponsorship::create([
                'start_date' => date("Y/m/d"),
                'end_date' => $end_date,
                'property_id' => $request -> property_id,
                'type_sponsorship_id' => $sponsorship_choose -> id 
            ]);
        }
        
        return redirect() -> route('dashboard');
    }
}

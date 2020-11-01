@extends('layouts.app')

@section('content')

    <div class="card-width">
      <div class="card card-shadow m-3">

        <div class="card-header input-title-text text-center">
          {{ __('Sponsorhip') }}
        </div>
        <div class="card-body">
          <div class="card-text">
          
            @if ($just == 0)
                
            {{-- Non toccare il form - solo aggiungere classi --}}
              <form id="payment-form" action="{{route('payment.store', $id)}}" method="post">
                  <!-- Putting the empty container you plan to pass to
                    `braintree.dropin.create` inside a form will make layout and flow
                    easier to manage -->
                  @csrf
                  @method('POST')
  
                  <div class="form-group">
                      <label class="font-weight-bold font-italic" for="sponsorship">
                        Type sponsorship
                      </label>
                      <select class="form-control" name="sponsorship">
  
                        @foreach ($types_sponsorship as $sponsorship)
                              <option value="{{$sponsorship -> name}}"> {{$sponsorship -> name}} - {{$sponsorship -> price}}</option>
                        @endforeach
  
                      </select>
                  </div>
  
                  <input type="hidden" value="{{$id}}" name="property_id">
  
                  <div id="dropin-container"></div>
                  <input class="btn btn-dark" type="submit" />
                  <input type="hidden" id="nonce" name="payment_method_nonce"/>
              </form>
              
              @else
                <h1> Appartamento già sponsorizzato </h1>
            @endif
          </div>
        </div>
      </div>
    </div>

    {{-- Non toccare --}}
    <script type="text/javascript">
        // call braintree.dropin.create code here

          const form = document.getElementById('payment-form');

          braintree.dropin.create({
          authorization: '{{$clientToken}}',
          container: '#dropin-container'
          }, (error, dropinInstance) => {
          if (error) console.error(error);

          form.addEventListener('submit', event => {
              event.preventDefault();

          dropinInstance.requestPaymentMethod((error, payload) => {
          if (error) console.error(error);

          // Step four: when the user is ready to complete their
          //   transaction, use the dropinInstance to get a payment
          //   method nonce for the user's selected payment method, then add
          //   it a the hidden field before submitting the complete form to
          //   a server-side integration
          document.getElementById('nonce').value = payload.nonce;
          form.submit();
        });
        });
        });
      </script>
@endsection

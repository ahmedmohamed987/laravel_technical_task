
@extends('master')
@section('content')
<script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Stripe Payment</h2>
        
      
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="amount" value="10"> 
        <div class="form-row w-50">
            <label for="card-element">Credit or debit card</label>
            <div id="card-element" class="form-control"></div>
            <div id="card-errors" class="text-danger mt-2" role="alert"></div>
        </div>
        <input type="submit" class="btn btn-primary mt-3" name="checkout">
    </form>

    </div>

    <script>const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        
        const card = elements.create('card', { hidePostalCode: true });
        card.mount('#card-element');
        
        const form = document.getElementById('payment-form');
        const cardErrors = document.getElementById('card-errors');
        
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            console.log("Form submission started...");
        
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    console.error("Error creating token: ", result.error.message);
                    cardErrors.textContent = result.error.message;
                } else {
                    console.log("Token created successfully: ", result.token);
                    stripeTokenHandler(result.token);
                }
            });
        });
        
                function stripeTokenHandler(token) {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            console.log("Submitting form...");
            HTMLFormElement.prototype.submit.call(form);
        }

        
    </script>
@endsection

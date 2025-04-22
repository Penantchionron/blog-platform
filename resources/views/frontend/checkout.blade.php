
@extends('layouts.vuePrincipal')

@section('title', 'Paiement')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('assets/product-placeholder.png') }}" class="card-img-top" alt="Produit">
                <div class="card-body">
                    <h5 class="card-title">{{ $content->title }}</h5>
                    <p class="card-text">{{ $content->description }}</p>
                    <span class="badge bg-secondary">{{ $content->type }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="paypal-button-container"></div>
        </div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.client_id') }}&currency=EUR"></script>
<script>
paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '{{ $content->price }}'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            window.location.href = "{{ route('paypal.success', $content->id) }}?token=" + data.orderID;
        });
    },
    onCancel: function (data) {
        window.location.href = "{{ route('paypal.cancel') }}";
    }
}).render('#paypal-button-container');
</script>
@endsection

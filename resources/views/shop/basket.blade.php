@extends('layouts.structure')
@section('content')
<div class="container">
        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="hidden" id="sample_full_basket_item">
                        @include('shop.cart.items_cart')
                    </div>
                    <div id="full_basket_items" class="col-xl-9 col-lg-8">
                    </div>
                    @include('shop.cart.basket_cart')
                </div>
            </div>
        </main>
        @stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            renderBasket();
        })
    </script>
@stop
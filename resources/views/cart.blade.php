@extends('layouts.structure')
@section('content')
<div class="container">
        <main class="page-content">
            <div class="container">
                <div class="row">
                    @include('shop.cart.items_cart')
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
@stop
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $product->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ $product->images[0] }}" style="width: 100%; height: auto;">
                            </div>
                            <div class="col-md-6">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                                <p>{{ $product->price }} €</p>
                                <form action="{{ route('cart.add', $product->id) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        @if($product_in_cart)
                                            <a href="{{route('cart.index')}}" class="btn btn-success" style="margin-left: auto">
                                                {{ __('Go to cart') }}
                                            </a>
                                        @else
                                            <input type="number" name="quantity" class="form-control" value="1" min="1" max="100">
                                            <button type="submit" class="btn btn-primary">{{ __('Add to cart') }}</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

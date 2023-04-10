@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cart') }}</div>
                    <div class="card-body d-flex flex-column gap-2">
                        @forelse($items as $product)
                            <div style="display: flex; justify-content: space-between; height: 8rem; flex-direction: row; column-gap: 0.5rem; padding: 0.4rem; border: solid 1px #d2d2d2; border-radius:0.3rem">
                                <a style="border-radius:0.2rem;" href="{{route('product', $product['extra_info']['slug'])}}">
                                    <img src="{{$product['extra_info']['image']}}" style="height: 100%;aspect-ratio: .83/1;">
                                </a>
                                <div style="width: 50%; display: flex; flex-direction: column">
                                    <a href="{{route('product', $product['extra_info']['slug'])}}" class="text-decoration-none text-dark">
                                        <h5>{{$product['title']}}</h5>
                                    </a>
                                    <p class="mb-0 mt-auto">{{__('Price')}}: {{$product['price']}} €</p>
                                    <p class="mb-0 mt-auto">{{__('Quantity')}}: {{$product['quantity']}}</p>
                                    <p class="mb-0 mt-auto">{{__('Total Price')}}: {{$product['total_price']}} €</p>
                                </div>
                                <div class="d-flex align-items-center" style="width: 15%">
                                    <form action="{{route('cart.update', $product['hash'])}}" method="post" class="d-flex flex-row" style="width: 100%">
                                        @csrf
                                        <input onchange="this.form.submit()" type="number" name="quantity" class="form-control" value="{{$product['quantity']}}" min="1" max="100">
                                    </form>
                                </form>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{route('cart.remove', $product['hash'])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            {{__('Delete')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-center m-0">{{ __('No products found in cart') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

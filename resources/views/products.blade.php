@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card" style="position: sticky;top: 1rem;">
                    <div class="card-header">{{ __('Categories') }}</div>
                    <div class="card-body d-flex flex-column mh-100 overflow-scroll gap-2">
                        <a href="{{ route('products') }}"
                           @class(['text-start text-decoration-none',
                                   'link-info' => !request()->has('category'),
                                   'text-dark' => request()->has('category'),
                            ])>{{ __('All') }}
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('products', ['category' => $category->slug]) }}"
                               @class(['text-start text-decoration-none',
                                       'link-info' => $category->slug == request()->get('category'),
                                       'text-dark' => $category->slug != request()->get('category'),
                                ])>{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body d-flex flex-column gap-2">
                        @forelse($products as $product)
                            <div style="display: flex; height: 8rem; flex-direction: row; column-gap: 0.5rem; padding: 0.4rem; border: solid 1px #d2d2d2; border-radius:0.3rem">
                                <a style="border-radius:0.2rem;" href="{{route('product', $product->slug)}}">
                                    <img src="{{$product->images[0]}}" style="height: 100%;aspect-ratio: .83/1;">
                                </a>
                                <div style="width: 80%; display: flex; flex-direction: column">
                                    <a href="{{route('product', $product->slug)}}" class="text-decoration-none text-dark">
                                        <h5>{{$product->name}}</h5>
                                    </a>
                                    <p style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">{!! $product->description !!}</p>
                                    <p class="mb-0 mt-auto">{{$product->price}} €</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center m-0">{{ __('No products found') }}</p>
                        @endforelse
                        @if($products->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $products->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

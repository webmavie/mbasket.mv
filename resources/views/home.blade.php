@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MBasket') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth()
                        {{ __('Welcome to our application').', '.Auth::user()->name }}
                    @else
                        {{ __('Please login to continue') }}
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

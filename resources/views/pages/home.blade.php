@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center p-3">
       <div class="col-12">
           <h1>Welkom, {{ Auth::User()->getValue('Roepnaam') }}!</h1>
       </div>
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Congrats! You are logged in!') }}

                        @if(Auth::User()->isAdmin())
                            {{ __('Congrats! You are admin!') }}
                        @endif

                        @if(Auth::User()->isUser())
                            {{ __('Congrats! You are User!') }}
                        @endif


                </div>
            </div>
        </div> <div class="col-12 col-md-4">
            <div class="card mb-3">
                <div class="card-header">{{ __('Mijn lidmaatschap') }}</div>

                <div class="card-body">

                </div>
            </div>  <div class="card">
                <div class="card-header">{{ __('Laatste nieuws') }}</div>

                <div class="card-body">
                    @include('pages.news')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

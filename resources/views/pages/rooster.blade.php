@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center p-3">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Rooster') }}</div>

                <div class="card-body">

                    @include('rooster.add')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

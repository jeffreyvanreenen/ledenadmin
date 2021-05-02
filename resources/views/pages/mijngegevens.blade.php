@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Gebruikergegevens') }} {{ $user->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                            @csrf

                            <div class="row p-1">
                                <div class="col-4 col-md-4">
                                    Emailadres
                                </div>
                                <div class="col-4 col-md-4">
                                   {{ $user->email }}
                                </div>
                                <div class="col-4 col-md-4"> <a href="#" class="fas fa-edit"></a></div>
                            </div>

                            @foreach($platform->fields as $field)
                                <div class="row p-1">
                                    <div class="col-4 col-md-4">
                                        {{ $field->name }}
                                    </div>
                                    <div class="col-4 col-md-4">

                                        {{ isset($user->fields[$field->id]) ? $user->fields[$field->id] : '' }}
                                    </div>
                                    <div class="col-4 col-md-4">
                                    @if($field->allow_change != 0)

                                        <a href="#" class="fas fa-edit"></a>

                                    @endif
                                    </div>

                                </div>
                            @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

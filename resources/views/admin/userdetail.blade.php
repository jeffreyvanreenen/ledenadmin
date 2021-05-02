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


                        <form method="post">
                            @csrf

                            <div class="row p-3">
                                <div class="col-12 col-md-6">
                                    Emailadres
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" value="{{ $user->email }}" class="form-control" name="email">
                                </div>
                            </div>

                            @foreach($platform->fields as $field)
                                <div class="row p-3">
                                    <div class="col-12 col-md-6">
                                        {{ $field->name }}
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <input type="text"
                                               value="{{ isset($user->fields[$field->id]) ? $user->fields[$field->id] : '' }}"
                                               name="fields[{{ $field->id }}]" class="form-control">
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-12 p-3">
                                <input type="submit" value="Opslaan" class="btn btn-primary">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

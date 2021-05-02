@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Gebruikers') }}
                    <span class="float-right ml-auto">        <a href="{{ route('admin.users')  }}/user/new"> <i class="fas fa-plus"></i> Gebruiker toevoegen</a>
</span></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped" id="table_id">
                            <thead>

                            <tr>
                                <td>Relatiecode</td>
                                <td>Clubcode</td>
                                <td>Naam</td>
                                <td>Geboortedatum</td>
                                <td>Geslacht</td>
                                <td>Woonplaats</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($users as $user)

                            @include('admin.user', ['user' => $user,])
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

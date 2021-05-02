@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Invoervelden') }}</div>

                    <div class="card-body">


                        <ul>
                            @foreach($invoerveld->fields as $invoerveld)



                                            <li>{{ $invoerveld->name }}</li>

                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Invoerveld toevoegen') }}</div>

                    <div class="card-body">


                        <form action="/admin/invoervelden/create" method="post">
                            @csrf
                            <div class="col-12 p-3"><input type="text" name="nieuwinvoerveld" class="form-control" onfocus="this.value=''" value="Nieuw invoerveld"></div>
                            <div class="col-12 p-3"><input type="submit" value="Opslaan" class="btn btn-primary"> </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

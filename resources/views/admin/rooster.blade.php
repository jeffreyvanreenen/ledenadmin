@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header text-center">
                        <span class="h3 font-weight-bold">
                            100%
                        </span><br> van rooster vol.

                    </div>
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header text-center">
                                              <span class="h3 font-weight-bold">
                            1000 uur
                        </span><br> totaal gevuld.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Bewakingsrooster') }}
                    </div>

                    <div class="card-body">

                        <table class="table table-striped text-center" id="table_id">
                            <thead>

                            <tr>
                                <td>Datum</td>
                                <td>Lifeguard #1</td>
                                <td>Lifeguard #2</td>
                                <td>Lifeguard #3</td>
                                <td>Lifeguard #4</td>
                                <td>Minimale bezetting</td>
                                <td>Huidige bezetting</td>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($roosterDays as $roosterDay)
                                @include('admin.roosterDay')
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

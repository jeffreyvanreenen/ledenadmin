<?php

use App\Models\RoosterData;
use App\Models\RoosterUser;

$roosterDates = RoosterData::where('platform_id', 1)->pluck('date', 'id');
$userRooster = RoosterUser::where('user_id', Auth::user()->id)->pluck('available', 'date_id');
    ?>
@if ($userRooster->count() > 0)
    <div class="alert alert-primary" role="alert">
         Bedankt voor het invullen van je beschikbaarheid. Indien je beschikbaarheid wijzigt, kun je deze hieronder aanpassen. <i class="fas fa-hand-holding-heart"></i>
    </div>
@endif
@if (isset($succes))
    <div class="alert alert-success" role="alert">
       {{ $succes }}
    </div>
@endif
<p>
    Vul hier de dagen in dat je beschikbaar bent en de dagen dat je niet beschikbaar bent.
</p>

<form method="post">
    <input type="hidden" name="abc" value="{{ Auth::user()->id }}">
    @csrf
@foreach($roosterDates as $key => $roosterDate)
    <div class="row p-2 border-bottom {{ $loop->even ? 'table-secondary' : '' }}">
        <div class="col-8">{{ date('d-m-Y', strtotime($roosterDate)) }}</div>
        <div class="col-2 text-center custom-control custom-radio">
        <input type="radio"
               name="date[{{$key}}]" value="beschikbaar" class="form-check-input"
            {{ isset($userRooster[$key]) && $userRooster[$key] ? 'checked' : '' }}
        >
            <label class="form-check-label agree"><i class="fas fa-check"></i></label>
        </div>
        <div class="col-2 text-center custom-control custom-radio">
            <input type="radio"
                   name="date[{{$key}}]" value="niet-beschikbaar" class="form-check-input"
                {{ !isset($userRooster[$key]) || !$userRooster[$key] ? 'checked' : '' }}
            >
            <label class="form-check-label disagree text-center"><i class="fas fa-times"></i>&nbsp;</label>
        </div>
    </div>
@endforeach
    <input class="btn btn-primary mt-3 float-right" value="Opslaan" type="submit">
</form>

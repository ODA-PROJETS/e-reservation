@extends('layouts.app')

@section('content')

<div class="card p-3 border-primary table-responsive">
    <p class="float-left" style="font-size: 25px;font-weight:bold"><i class=" "> </i>Reservation Enregistrée !
    </p>
    <div class="mt-3">
    <p>Mr/Mme {{\Auth::user()->name}}</p>
    <p class="">Votre reservation a été Enregistrée avec succes, vous recevrez un mail apres validation de votre demande par les administrateur de la salle</p>
    <p>vous pouvez suivre votre demande depuis votre espace client .</p>
    <a href="{{route('index')}}" class="btn btn-secondary" style="width: 250px">suivre ma reservation</a>
    </div>
  </div>

@endsection

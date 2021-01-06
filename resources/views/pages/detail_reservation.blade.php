@extends('layouts.app')
@section('extra-css')
<link rel="stylesheet" href="{{asset('css/bundle.css')}}">
@endsection
@section('content')
<div class="row mb-5">

    <div class="card col-3 d-none d-lg-block border-primary" style="max-height: 300px;">
        <div class="card-body">
          <h3 class="card-title">Menu</h3>
          <a href="{{route('index')}}" class="btn btn-inverse text- border-500">Mes reservations ({{$nbre_reservations_cours}}) </a>
          <br> <br>
          <a href="{{route('history')}}" class="btn btn-inverse text- border-500">Historique ({{$nbre_reservations_termines}}) </a>
          <br> <br> <br><br>
          <a href="{{route('logout')}}" class="btn btn-inverse text- border-500">Deconnexion </a>

        </div>

      </div>
    @php
                    $salle = \App\Models\Salle::where('id',$reservation->salle_id)->first();
                    $status = \App\Models\Status::where('id',$reservation->status_id)->first();

                    $nbre_valideur = DB::table('salles_has_users')->where('salle_id',$reservation->salle_id)->count();
                    $percent = ($reservation->niveau_validation*100)/$nbre_valideur
                @endphp
    <div class="col-lg-9">
      <div class="card p-lg-3" >
        <p class="float-left" style="font-size: 25px;font-weight:bold"><a href="{{route('index')}}" class="icon-arrow-previous btn text-primary" style="color: #002687"></a> detail reservation</p>
        <div class="card-body" >
            <div style="border:1px solid black;padding:8px;font-weight:bold;">
                <span class="text-secondary" style="font-size:20px;">Réservation n° {{$reservation->id}}</span> <br> <br>
                @if($status->id !=5)
                <a href="{{route('annuler',$reservation->id)}}" class="float-right btn btn-secondary mr-2 d-none d-lg-block" style="">annuler la réservation</a>
                @endif
                <span>Salle reservé : {{Auth()->user()->name}}</span> <br>
                <span class="">date debut: {{$reservation->date_start}} {{$reservation->hour_start}}</span> <br>
                <span class="">date fin: {{$reservation->date_end}} {{$reservation->hour_end}}</span> <br> <br>
                <span class="">motif : {{$reservation->motif}}</span> <br>

                <span><a href="#" class=" btn btn-outline-light mr-2 d-lg-none " style="color: #002687;border:1px solid #002687">annuler la commande</a></span>
            </div>
            <div class="card mt-3">
                <div class="card-header text-secondary" style="background:white; font-weight:bold;font-size:20px;"> Suivi de la réservation</div>
                <div class="card-body">
                  <div class="row">
                  <div class="light-bg">
                    <div class="gauge yellow" data-value="{{$percent}}"></div> <br>
                    <legend class="gauge-label">demande approuvé par {{$reservation->niveau_validation}} /{{$nbre_valideur}} valideur</legend>
                  </div>
                  <div>
                    <span class="text-primary font-weight-bold">STATUT </span> <br> <br>
                    <span>Réservation {{$status->name}}</span>
                  </div>
                </div>
                </div>

            </div>

        </div>
      </div>
  </div>
  </div>
@endsection
@section('extra-js')

  <script src="{{asset('js/man.js')}}"></script>

@endsection

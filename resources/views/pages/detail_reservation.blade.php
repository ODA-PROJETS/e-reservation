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
                @endphp
    <div class="col-lg-9">
      <div class="card p-lg-3" >
        <p class="float-left" style="font-size: 25px;font-weight:bold"><a href="{{route('index')}}" class="icon-arrow-previous btn text-primary" style="color: #002687"></a> detail reservation</p>
        <div class="card-body" >
            <div style="border:1px solid black;padding:8px;font-weight:bold;">
                <span class="text-secondary" style="font-size:20px;">Réservation n° {{$reservation->id}}</span> <br> <br>
                {{-- @if($status->id !=5) --}}
                <button  class="float-right btn btn-secondary mr-2 d-none d-lg-block" style="">annuler la réservation</button>
                {{-- @endif --}}
                <span>Salle reservé : {{Auth()->user()->name}}</span> <br>
                <span>date debut: {{$reservation->date_start}} {{$reservation->hour_start}}</span> <br>
                <span>date fin: {{$reservation->date_end}} {{$reservation->hour_end}}</span> <br> <br>
                <span>motif : {{$reservation->motif}}</span> <br>

                <span><a href="#" class=" btn btn-outline-light mr-2 d-lg-none " style="color: #002687;border:1px solid #002687">annuler la commande</a></span>
            </div>
            <div class="card mt-3">
                <div class="card-header text-secondary" style="background:white; font-weight:bold;font-size:20px;"> Suivi de la réservation</div>
                <div class="card-body">
                  <div class="row">
                  <div class="light-bg">
                    <div class="gauge yellow" data-value="50"></div> <br>
                    <legend class="gauge-label">demande approuvé par 2 /5 valideur</legend>
                  </div>
                  <div>
                    <span class="text-primary font-weight-bold">STATUT </span> <br> <br>
                    <span> en attente de validation</span>
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

    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
      </script>

  <script src="{{asset('form.j')}}s"></script>
  <script src="{{asset('js/main.js')}}"></script>
@endsection

@extends('layouts.app')

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
    <div class="col-lg-9">
      <div class="card p-3 border-primary table-responsive">
        <p class="float-left" style="font-size: 25px;font-weight:bold"><i class=" "> </i> Mes reservations
        </p>
        @if(count($reservations)>0)
        <input class="form-control" id="myInput" type="text" placeholder="Rechercher ...">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Code</th>
              <th scope="col">Salle</th>
              <th scope="col">Debut</th>
              <th scope="col">Fin</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach ($reservations as $res)
            @php
                $salle = \App\Models\Salle::where('id',$res->salle_id)->first();
                $status = \App\Models\Status::where('id',$res->status_id)->first();
            @endphp

            <tr>
                <th scope="row">res_0{{$res->id}}</th>
                <td>{{$salle->name}}</td>
                <td>{{$res->date_start}} {{$res->hour_start}}</td>
                <td>{{$res->date_end}} {{$res->hour_end}}</td>
                <td><label class="label">{{$status->name}}</label></td>
                <td><a href="{{route('detail_reservation',[$res->id])}}"><i class="icon-Pencil" style="color: black;"></i></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="mt-3">

        <h5 class="" style="color:red">Aucune reservation</h5>
        <a href="{{route('reserver')}}" class="btn btn-secondary" style="width: 250px">reservé dès maintenant</a>
        </div>
        @endif
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
@endsection

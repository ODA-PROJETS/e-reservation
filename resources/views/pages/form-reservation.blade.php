@extends('layouts.app')
@section('extra-css')
<link href="{{asset('css/perso.css')}}" rel="stylesheet">

@endsection
@section('content')
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
<div class="row featurette">
    <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="{{asset('img/ORANGE_LOGO_rgb.jpg')}}" alt="">
        {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em" class="font-weight-bold">aucune image</text></svg> --}}
    </div>
    <form class="col-md-7 mt-2 order-md-2" method="POST" action="{{route('valideReservation')}}" id="myform">
      @csrf
        <h2 class="featurette-heading">{{$salle->name}}</h2>
      <p class="lead">{{$salle->description}}</p>
      <input type="hidden" name="salle_id" value="{{$salle->id}}">
      @if($errors->has('error'))
      <p style="color:red">veuillez renseigner tous les champs</p>
      @endif

      <div class="row">
        <div class="form-group required col-6">
          <label for="PreDate" class="is-required">Date debut</label>
          <input name="date_debut" value="{{$debut}}" min="<?php echo date('Y-m-d'); ?>" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PreDate" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
        <div class="form-group required col-6">
          <label for="PostDate" class="is-required">Date fin</label>
          <input name="date_fin" value="{{$fin}}" min="<?php echo date('Y-m-d'); ?>" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PostDate" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
      </div>
      <div class="row">
        <div class="form-group required col-6">
          <label for="PostTime"  class="is-required">Heure de debut</label>
          <input name="heure_debut" id="hre_debut" class="form-control" type="time" id="PostTime" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une heure">
        </div>
        <div class="form-group required col-6">
          <label for="PostTime" class="is-required">Heure de fin</label>
          <input name="heure_fin" id="hre_fin" class="form-control" type="time" id="PostTime" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une heure">
        </div>
      </div>
       <div class="">
           @if(count($reservations)>0)
        <label for="dispo">Disponibilite</label>
        <div class="p-1" style="border:1px solid grey;max-height:100px;max-width:100%; overflow-y: scroll; overflow-x: scroll">
            <ul>
                @foreach ($reservations as $res)

                @endforeach
                <li style="font-weight: bold;">
                  <p> {{$res->date_start}} - {{$res->date_end}} @ {{$res->hour_start}} - {{$res->hour_end}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:red">indisponible</span></p>
                </li>

              </ul>
        </div>
        @endif
      </div> <br>
      <div class="form-group required">
        <label for="motif" id="motif" class="is-required">Motif de reservation  </label> <br>
        <textarea name="motif" id="motif" required="required" style="width: 100%;" rows="2"></textarea>
      </div>
      <div class="form-group">
        <label for="detail">Autre detail (optionnel)  </label> <br>
        <textarea name="detail" id="detail" style="width: 100%;" rows="4" placeholder="entrez d'autre detail utile comme des precisions sur l'heure et la date si eventuellement vous avez du mal à selectionner une date et une heure qui convienne"></textarea>
      </div>

      <button class="button">
        <span class="submit">Reserver</span>
        <span class="loading"><i class="icon-reload"></i></span>
        <span class="check"><i class="icon-checkbox-tick"></i></span>
      </button>


    </form>



  </div>

  <hr class="featurette-divider">
@endsection
@section('extra-js')
<script>

    const button = document.querySelector('.button');
const submit = document.querySelector('.submit');

function toggleClass() {
	this.classList.toggle('active');
}

function addClass() {
	this.classList.add('finished');
	setTimeout(() => {
        var form = document.forms["myform"];
            form.submit();
        // var hre_debut = document.forms["myform"]["hre_debut"].value;
        // var hre_fin = document.forms["myform"]["hre_fin"].value;
        // var motif = document.forms["myform"]["motif"].value;
        // if(hre_debut=="" or hre_fin=="" or motif=="") alert("veillez renseignez tous les champs")
        // else{
        //     var form = document.forms["myform"];
        //     form.submit();
        // }
; }, 2000);
}

button.addEventListener('click', toggleClass);
button.addEventListener('transitionend', toggleClass);
button.addEventListener('transitionend', addClass);


  </script>
@endsection

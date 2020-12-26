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
    <div class="col-md-7 mt-2 order-md-2">
      <h2 class="featurette-heading">{{$salle->name}}</h2>
      <p class="lead">{{$salle->description}}</p>
      <div class="row">
        <div class="form-group required col-6">
          <label for="PreDate" class="is-required">Date debut</label>
          <input pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PreDate" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
        <div class="form-group required col-6">
          <label for="PostDate" class="is-required">Date fin</label>
          <input pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PostDate" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
      </div>
      <div class="row">
        <div class="form-group required col-6">
          <label for="PostTime" class="is-required">Heure de debut</label>
          <input class="form-control" type="time" id="PostTime" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une heure">
        </div>
        <div class="form-group required col-6">
          <label for="PostTime" class="is-required">Heure de fin</label>
          <input class="form-control" type="time" id="PostTime" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une heure">
        </div>
      </div>
       <div class="">
        <label for="dispo">Disponibilite</label>
        <div class="p-1" style="border:1px solid grey;max-height:100px;max-width:100%; overflow-y: scroll; overflow-x: scroll">
            <ul>
                <li style="font-weight: bold;">
                  <p> 5/7/15 @ 15h- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:red">indisponible</span></p>
                </li>
                <li>
                  <p >5/7/15 @ 15h-16h &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:red">indisponible</span></p>
                </li>
                <li style="font-weight: bold;">
                    <p >5/7/15 @ 15h-1jhhhhhhhhhhhh6h &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:red">indisponible</span></p>
                  </li>
                  <li >
                    <p >5/7/15 @ 15h-16h &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:red">indisponible</span></p>
                  </li>
              </ul>
        </div>
      </div> <br>
      <div class="form-group required">
        <label for="motif " class="is-required">Motif de reservation  </label> <br>
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


    </div>



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
	setTimeout(() => {  window.location.href="#";
; }, 2000);
}

button.addEventListener('click', toggleClass);
button.addEventListener('transitionend', toggleClass);
button.addEventListener('transitionend', addClass);


  </script>
@endsection

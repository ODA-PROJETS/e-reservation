@extends('layouts.app')
@section('extra-css')
<link href="{{asset('css/perso.css')}}" rel="stylesheet">

@endsection
@section('content')
<div id="app">
      <p class="text-center mb-5" style="font-size: 25px;font-weight:bold">&nbsp; Salle à Reserver @{{lol}}</p>
      <div class="row">
        <div class="form-group col-6 col-lg-4 offset-lg-2">
          <label v-model="date_debut" for="PreDate" class="">Debut</label>
          <input pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PreDate" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
        <div class="form-group col-6 col-lg-4">
          <label for="PostDate" class="float-right">Fin</label>
          <input v-model="date_fin" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PostDate" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
      </div>
      <main class="page-content">
        <div v-for="salle in salles" class="card" style="background-image: url({{asset('img/ORANGE_LOGO_rgb.jpg')}})">
          <div title="disponible" style="margin:5px;z-index:1111;height:20px;width:20px;background:green;border-radius:50%">
          </div>
          <div class="content">
            <h2 class="title">@{{salle['name']}}</h2>
            <p class="copy">@{{salle['description']}}</p>
            <a href="{{route('detailSalle',1)}}" class="btn btn-primary">voir</a>
          </div>
        </div>

      </main>

</div>
<script src="{{mix('js/app.js')}}"></script>

@endsection



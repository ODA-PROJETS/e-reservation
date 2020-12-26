@extends('layouts.app')
@section('extra-css')
<link href="{{asset('css/perso.css')}}" rel="stylesheet">

@endsection
@section('content')

      <p class="text-center mb-5" style="font-size: 25px;font-weight:bold">&nbsp; Salle à Reserver </p>
      <div class="row">
        <div class="form-group col-6">
          <label for="PreDate" class="">Debut</label>
          <input pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PreDate" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
        <div class="form-group col-6">
          <label for="PostDate" class="float-right">Fin</label>
          <input pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PostDate" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
      </div>
      <main class="page-content">
        <div class="card">
          <div title="disponible" style="margin:5px;z-index:1111;height:20px;width:20px;background:green;border-radius:50%">
          </div>
          <div class="content">
            <h2 class="title">Salle 1</h2>
            <p class="copy">description de la salle etc etc eeeeeeeeeeeee</p>
            <button class="btn btn-primary">voir</button>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2 class="title">To The Beach</h2>
            <p class="copy">Plan your next beach trip with these fabulous destinations</p>
            <button class="btn">View Trips</button>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2 class="title">Desert Destinations</h2>
            <p class="copy">It's the desert you've always dreamed of</p>
            <button class="btn">Book Now</button>
          </div>
        </div>
        <div class="card">
          <div class="content">
            <h2 class="title">Explore The Galaxy</h2>
            <p class="copy">Seriously, straight up, just blast off into outer space today</p>
            <button class="btn">Book Now</button>
          </div>
        </div>
  <div class="card" style="background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);    ">
          <div class="content">
            <h2 class="title">Explore The Galaxy</h2>
            <p class="copy">Seriously, straight up, just blast off into outer space today</p>
            <button class="btn">Book Now</button>
          </div>
        </div>
      </main>


@endsection
@section('extra-js')

@endsection

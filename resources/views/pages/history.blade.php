@extends('layouts.app')
@section('extra-css')
<link href="{{asset('css/perso.css')}}" rel="stylesheet">

@endsection
@section('content')
<p class="text-center mb-5" style="font-size: 25px;font-weight:bold"><a href="{{route('index')}}" style="font-size: 25px;" class="btn icon-home text-primary"> </a> Historique
</p>
@if (count($reservations_termines)==0)
            <center>
                <p class="h2" style="color: grey">Historique vide</p>
                <p class="h3" style="color: grey">içi s'affichera votre historique de reservation</p>
                {{-- <span class="icon icon-pdf-file"></span> --}}
            </center>
            @endif
    <section class="timeline">
        <div class="container">

            @foreach($reservations_termines as $c=>$v)
                        @php $salle = \App\Models\Salle::where('id',$v->salle_id)->first(); @endphp

          <div class="timeline-item">
            <div class="timeline-img"></div>

            <div class="timeline-content timeline-card js--fadeInRight">

            <div class="timeline-img-header" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.4)), url('img/ORANGE_LOGO_rgb.jpg') center center no-repeat;">
                <h2>{{$salle->name}}</h2>
              </div>
              <div class="date">{{$v->date_start}} {{$v->hour_start}}-{{$v->hour_end}}</div>
              <p>{{$salle->description}}</p>

              <div class="p-2">
                  <form action="{{route('delete',$v->id)}}" method="post">
                    @csrf
                <button type="submit" class="btn btn-secondary icon-trash "></button>

                  </form>
                {{-- <a href="javascript:void(0)" class="btn btn-secondary ">reservé </a> --}}
              </div>
            </div>
          </div>

          @endforeach


        </div>
    </section>
@endsection

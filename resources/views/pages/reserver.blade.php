@extends('layouts.app')
@section('extra-css')
<link href="{{asset('css/perso.css')}}" rel="stylesheet">

@endsection
@section('content')
<div id="app">
      <p class="text-center mb-5" style="font-size: 25px;font-weight:bold">&nbsp; Salle à Reserver</p>
      <div class="row">

        <div class="form-group col-6 col-lg-4 offset-lg-2">
          <label for="PreDate" class="">Debut</label>
          <input name="date_debut" id="date_debut" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PreDate" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>
        <div class="form-group col-6 col-lg-4">
          <label for="PostDate" class="float-right">Fin</label>
          <input name="date_fin" id="date_fin" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" class="form-control" type="date" id="PostDate" aria-required="true" aria-describedby="date-format"  title="Entrer une date avec le format dd/mm/yyyy ">
        </div>

      </div>
      {{-- <div class="row">
        <div class="form-group col-6 col-lg-4 offset-lg-2">
            <label for="PostTime" >Heure de debut</label>
            <input value="{{old('heure_debut')}}" name="heure_debut" id="hre_debut" class="form-control" type="time" id="PostTime" required="required" aria-required="true" aria-describedby="date-format"  title="Entrer une heure">
          </div>
          <div class="form-group col-6 col-lg-4">
            <label for="PostTime"   >Heure de fin</label>
            <input name="heure_fin" class="form-control" value="{{old('heure_fin')}}" id="hre_fin" type="time" >
          </div>
      </div> --}}
      <main class="page-content mb-5">
          @foreach ($salles as $salle)

        <div v-for="" class="card" style="background-image: url({{asset('storage/'.$salle->image)}});background-size:cover">
          {{-- <div title="disponible" style="margin:5px;z-index:1111;height:20px;width:20px;background:green;border-radius:50%">
          </div> --}}
            <div class="content">
            <h2 class="title">{{$salle->name}}</h2>
            <p class="copy">{{$salle->description}}</p>
            <form style="" id="form" action="{{route('detailSalle')}}" method="get">
                <input type="hidden" name="salle_id" value="{{$salle->id}}">
                {{-- <input type="hidden" id="debut" name="debut">
                <input type="hidden" id="fin" name="fin"> --}}
            <button onclick="subm(this)" type="button" class="btn btn-primary">voir</button>

            </form>

          </div>
        </div>

        @endforeach

      </main>
<script>
    function subm(e){
        // alert(e);
        var date_d = document.getElementById('date_debut').value;
        var date_f = document.getElementById('date_fin').value;
        // document.getElementById('debut').value = date_d;
        // document.getElementById('fin').value = date_f;
        var debut = document.createElement("input");
        var fin = document.createElement("input");
        debut.setAttribute("type", "hidden");
        debut.setAttribute("name", "debut");
        debut.setAttribute("value", date_d);
        fin.setAttribute("type", "hidden");
        fin.setAttribute("name", "fin");
        fin.setAttribute("value", date_f);
        var f=e.parentElement;
        // alert(date_d);
        f.appendChild(debut);
        f.appendChild(fin);

        // alert(f);
        // f.appendChild(debut);
        // f.appendChild(fin);
        f.submit();
    }



</script>
</div>
{{-- <script src="{{mix('js/app.js')}}"></script> --}}

@endsection
@section('extra-js')
    <script>

        $( "#date_fin" ).change(function() {
            var date_debut = $("#date_debut").val();

            var date_fin = $(this).val();
            if(Date.parse(date_fin) <= Date.parse(date_debut)) {
            // alert(Date.parse(date_fin));

            }
    });
    </script>
@endsection


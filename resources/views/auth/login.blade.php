<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion-Inscription</title>
    <link rel="stylesheet" href="{{asset('css/forme.css')}}">
  <link href="{{asset('css/boosted.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('packages/noty/noty.css')}}">
  <link rel="stylesheet" href="{{asset('/css/noty_theme.css')}}">
  <link rel="stylesheet" href="{{asset('/css/aqua.css')}}">


</head>

<body>
<div class="c"id="container">
	{{-- <div class="form-container sign-up-container"> --}}
        <form class="login-form" action="{{url('submit')}}" method="POST">
            @csrf
            <h1>Connection</h1>
            @if($errors->has('invalid'))
            <h5 class="text-center" style="color:red">{{ $errors->first('invalid') }}</h5>
            @endif
            <div class="form-input-material">
			<input class="form-control-material" name="email" required type="email" placeholder=" " maxlength="40" value="{{ old('email') }}" />

              {{-- <input type="text" name="username" id="username" placeholder=" " autocomplete="off" class="form-control-material" required /> --}}
              <label for="email" style="color:white">Email</label>
            </div>
            <div class="form-input-material">
			<input class="form-control-material mt-3" style="border-color: white" name="password" id="password" required type="password" placeholder=" " />

              {{-- <input type="password" name="password" id="password" placeholder=" " autocomplete="off" class="form-control-material" required /> --}}
              <label for="password" style="color:white">Mot de Passe</label>
            </div>
            <button type="submit" class="btn btn-primary  btn-ghost text-center">Connexion</button>
          </form>

	{{-- </div> --}}


</div>

<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{ asset('packages/noty/noty.js') }}"></script>
@if(Session::has('alerte'))

<script type="text/javascript">
        Noty.overrideDefaults({
            layout: 'topRight',
            theme: 'backstrap',
            timeout: 2500,
            closeWith: ['click', 'button'],
        });

        new Noty({
            type: "{{ Session::get('type') }}",
            text: "{!! str_replace('"', "'", Session::get('alerte')) !!}"
        }).show();

    </script>
@endif
</body>
</html>

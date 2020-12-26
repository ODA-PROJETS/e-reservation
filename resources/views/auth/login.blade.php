<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion-Inscription</title>
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
  <link href="{{asset('css/boosted.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('packages/noty/noty.css')}}">
  <link rel="stylesheet" href="{{asset('/css/noty_theme.css')}}">


</head>

<body>
<div class="container col-8 d-none d-lg-block"id="container">
	<div class="form-container sign-up-container">
		<form  action="inscription" method="POST">
            @csrf
			<h1>Inscription</h1>
            @if($errors->has('invalid-inscription'))
                <h5 class="text-center" style="color:red">{{ $errors->first('invalid-inscription') }}</h5>
            @endif
            <input class="form-control" name="nom" type="text" placeholder="Entrez votre nom complet" required value="{{ old('nom') }}"/>
            <input class="form-control mt-3" name="email" type="email" placeholder="Entrez votre Email" required maxlength="40" value="{{ old('email') }}"/>
            <select class="form-control mt-3" name="departement" id="">
                <option value="">selectionnez votre departement</option>
                @foreach (\DB::table('departements')->get() as $d)
                <option value="{{$d->id}}">{{$d->name}}</option>
                @endforeach
            </select>
			<input  class="form-control mt-3" name="password" type="password" placeholder="mot de passe" required/>
			<button class="mt-4" type="submit">S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
        <form class="" method="POST" action="{{url('submit')}}">
            @csrf
            <h1>Connexion</h1> <br>
            @if($errors->has('invalid'))
                <h5 class="text-center" style="color:red">{{ $errors->first('invalid') }}</h5>
            @endif
			<input class="form-control" name="email" required type="email" placeholder="Email" maxlength="40" value="{{ old('email') }}" />
			<input class="form-control mt-3" name="password" required type="password" placeholder="mot de passe" />
			<!-- <a href="#">Forgot your password?</a> -->
			<button class="mt-4" type="submit">se connecter </button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenue !</h1>
				<p>Si vous avez deja un compte veillez entrez vos identifiants</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Nouvel utilisateur ?</h1>
				<p>
                    Veuillez compléter un bref formulaire d'inscription pour créer un compte et obtenir l'accès à ce site. Les personnes ayant
                    des adresses e-mail Orange internes bénéficient d'un accès immédiat, toutefois si vous entrez un mail non internes vous devrier patienté le temps d'être approuver .
                </p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>

{{-- <script>document.getElementById('signUp').click()</script> --}}
<div class="container-fluid d-lg-none d-block" style="margin-top: 150px">

    <div class="wr">

        <h1 class="h1 text-center text-primary">Connexion</h1>
        <div class="">
            <div class="">
                <div class="p">
                    <h3 class="text-center">Veillez vous connectez</h3>

                    <center>
                        <form class="border-top border-bottom col-md-8 " action="{{url('submit')}}" method="post" >
                         @csrf
                            <br>
                            @if($errors->has('invalid'))
                                <h3 class="text-warning help is-danger text-center">{{ $errors->first('invalid') }}</h3>
                            @endif
                            <div class="form-row  mt-3">
                                <label for="Username">Adresse e-mail<span class="req-star"> *</span></label>
                                <input class="form-control" required id="Username" name="email" type="text" value="">

                            </div> 

                            <div class="form-row mt-3">
                                <label for="Password">Mot de passe<span class="req-star"> *</span></label>
                                <input id="Password" required class="form-control" name="password" type="password">

                            </div>
                            <br>

                                <button class="btn btn-primary mt-3 mb-3" style="width:300px;"  type="submit"
                                >Connexion</button>

                            <br>
                        </form>
                    </center>
            </div>
            <br><br>
			<center class="">
				<div class="col-md-8">
					<h3 class="heading--orange">Nouvel utilisateur ?</h3>
					<p>Veuillez compléter un bref formulaire d'inscription pour créer un compte et obtenir l'accès à ce site.

Les personnes ayant des adresses e-mail Orange internes bénéficient d'un accès immédiat, toutefois si vous êtes un fournisseur ou un partenaire, vous devrez nous dire avec qui vous travaillez et nous demanderons à cette personne d'approuver votre demande.</p>
					<a class="btn btn-secondary" href="#">
                        S'inscrire
                    </a>
				</div>
			</center>

        </div>
    </div>
    <script>

        function onSubmitFunction() {
            document.getElementById("btnSubmit").disabled = true;

        }
    </script>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
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

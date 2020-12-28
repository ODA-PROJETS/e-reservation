<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion-Inscription</title>
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <link href="{{asset('css/boosted.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('packages/noty/noty.css')}}">
    <link rel="stylesheet" href="{{asset('/css/noty_theme.css')}}">
  
</head>
<body>
    <div class="container-fluid d-lg-none d-block" style="margin-top: 150px">

        <div class="wr">
    
            <h1 class="h1 text-center text-primary">Inscription</h1>
            <div class="">
                <div class="">
                    <div class="p">
                       <center>
                        
                            <form class="border-top border-bottom col-md-8 " action="inscription" method="POST" >
                             @csrf
                                <br>
                                @if($errors->has('invalid-inscription'))
                                <h5 class="text-center mt-2" style="color:red">{{ $errors->first('invalid-inscription') }}</h5>
                                @endif
                                <input class="form-control mt-3" name="nom" type="text" placeholder="Entrez votre nom complet" required value="{{ old('nom') }}"/>
                                <input class="form-control mt-3" name="email" type="email" placeholder="Entrez votre Email" required maxlength="40" value="{{ old('email') }}"/>
                                <select class="form-control mt-3" name="departement" id="">
                                    <option value="">selectionnez votre departement</option>
                                    @foreach (\DB::table('departements')->get() as $d)
                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                    @endforeach
                                </select>
                                <input  class="form-control mt-3" name="password" type="password" placeholder="mot de passe" required/>

    
                                <button class="btn btn-primary mt-3 mb-3" style="width:300px;"  type="submit">Valider</button>
    
                                <br>
                            </form>
                            <div>
                                    <br>
                                <strong class="mt-3">OU</strong> <br>
                                <a class="btn btn-secondary" href="{{route('login')}}">
                                    Se connecter
                                </a>
                            </div>
                        </center>
                </div>
                
    
            </div>
        </div>
       
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
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

</head>
<style>
    .alert-purple { border-color: #694D9F;background: #694D9F;color: #fff; }
.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
.glyphicon { margin-right:10px; }
.alert a {color: gold;}
</style>
<body>


<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <h2 class="ml-5">Reservation </h2>
        <div class="col-md-12">
            {{-- <div class="alert alert-purple alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Well done!</strong> Custom <a href="http://www.jquery2dotnet.com"
                        target="_blank">alert</a> message box with cool color</div>
            <div class="alert alert-info-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Well done!</strong> Custom <a href="http://www.jquery2dotnet.com"
                        target="_blank">alert</a> message box with cool color</div>
            <div class="alert alert-danger-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Well done!</strong> Custom <a href="http://www.jquery2dotnet.com"
                        target="_blank">alert</a> message box with cool color</div>
            <div class="alert alert-warning-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Well done!</strong> Custom <a href="http://www.jquery2dotnet.com"
                        target="_blank">alert</a> message box with cool color</div> --}}
            <div onclick="window.close();" class="alert alert-success-alt alert-dismissable">
                <span class="glyphicon glyphicon-certificate"></span>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button><strong>Well done!</strong> &nbsp;&nbsp;<a href="http://www.jquery2dotnet.com"
                    onclick="window.close();" target="_blank">{{$msg}}</a></div>
        </div>
    </div>
</div>


    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/boosted.bundle.min.js')}}"></script>
<script src="{{ asset('packages/noty/noty.js') }}"></script>
<script>

    setTimeout(() => {window.location.replace('https://www.google.com');}, 2000)

</script>
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


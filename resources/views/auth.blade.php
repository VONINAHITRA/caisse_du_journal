<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Caisse | Connexion</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!--css login-->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #efefef;
        color: #C1C3C6
      }
      .btn-connexion{
        background-color: #8bc349;
        color: #fff;
      }
      .user-login{
        background-color: #fff;
      }
    </style>
   </head>
   <body>
    
    <div class="container">
      <form class="form-signin" role="form" action="{{route('auth.connexion')}}" method="post">
        @csrf
        <h3 class="form-signin-heading" style="color:#000">Veuillez connecter</h3>
        <div class="form-group">
          @include('flash-message')
          <div class="input-group">
            <div class="input-group-addon" style="background: #8bc349;">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" style="background: #fff; color:#000; border-color: #ccc;" class="form-control user-login" maxlength="8" name="identifiant" id="identifiant" placeholder="Utilisateur" autocomplete="off" required />
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon" style="background: #8bc349;">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" style="background: #fff; color:#000; border-color: #ccc;" class="form-control user-pwd" maxlength="15" name="motDePasse" id="motDePasse" placeholder="Mot de passe" autocomplete="off" required />
          </div>
        </div>
        <button class="btn btn-md btn-default btn-connexion " type="submit"><i class=" fa fa-sign-in "></i> Connexion</button>
      </form>
    </div>
  </body>
   <!--script login-->
  <script type="text/javascript" src="{{asset('assets/js/js.min.js')}}"></script>
    <!-- jquery -->
   <script type="text/javascript" src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
</html>

<!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"> <i class="glyphicon glyphicon-euro"></i>AISSE DU JOUR</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="getting-started.html"></a></li>
              <li class="active"><a href="index.html"></a></li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;{{Session::get('identifiantUser')}}<b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header"></li>
                  <li class="deconnexion"><a href="{{route('auth.deconnexion')}}"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
  <!--Specifique style for nav-->
  <style>
    .navbar-brand{
      color: #e7d78f;
    }
    a:hover{
      color: #e0d396;
    }
    .navbar-custom{
      color: #e0d396;
    }
    .deconnexion{
      color: #e0d396;
    }
  </style>

  <!-- Parametre script -->
  <script>
    function confirmAction(){
       var confirm = window.confirm("Etes vous sûr de vouloir effectuer cette action ?");
      if(confirm){
        return true;
      }else{
       return false;
      }
     }
   

 </script>
      </nav>
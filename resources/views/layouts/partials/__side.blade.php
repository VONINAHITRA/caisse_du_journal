
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
  <ul class="list-group panel">
      <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>MENU PRINCIPAL</b></li>

      <li class="list-group-item @if(\Request::is('index')) active  @endif"
       style="font-size:14px"><a href="{{route('index')}}"><i class="glyphicon glyphicon-home" style="font-size:14px"></i>Accueil</li></a>

      <li class="list-group-item
      @if(\Request::is('dashboard/index')) active  @endif
      @if(\Request::is('dashboard/create')) active  @endif
      @if(\Request::is('dashboard/destroy')) active  @endif
      @if(\Request::is('dashboard/{id}/edit')) active  @endif
      @if(\Request::is('dashboard/update')) active  @endif
      " 
      style="font-size:14px"><a href="{{route('dashboard.index')}}"><i class="glyphicon glyphicon-dashboard"></i>Dashboard </li></a>

      <li class="list-group-item 
       @if(\Request::is('mouvement/index')) active  @endif
       @if(\Request::is('mouvement/create')) active  @endif
       @if(\Request::is('mouvement/destroy')) active  @endif
       @if(\Request::is('mouvement/{id}/edit')) active  @endif
       @if(\Request::is('mouvement/update')) active  @endif
      "
       style="font-size:14px"><a href="{{route('mouvements.index')}}"><i class="glyphicon glyphicon-transfer"></i>Mouvements</a></li>

      <li class="list-group-item 
      @if(\Request::is('parametre/index')) active  @endif
      @if(\Request::is('parametre/create')) active  @endif
      @if(\Request::is('parametre/destroy')) active  @endif
      @if(\Request::is('parametre/{id}/edit')) active  @endif
      @if(\Request::is('parametre/update')) active  @endif

      " style="font-size:14px"><a href="{{route('params.index')}}"><i class="glyphicon glyphicon-cog"></i>Paramètres</a></li>
  <li>
  </li>
</ul>
</div>
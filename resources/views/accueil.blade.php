@extends('layouts.master')
@section('contenu')
         <div class="col-xs-12 col-sm-9 content" style="height:100%">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a></h3>
                 </div>
                  <div class="panel-body">
                   <div class="content-row">
                    <div class="row">
                     <h1 id="bienvenu">BIENVENUE</h1>
                     <br>
                     <h3 class="caisseText"><i class="glyphicon glyphicon-euro euro"></i>AISSE DU JOUR</h3>
                    </div>
                   </div>
                </div>
               </div>
           </div>
        </div>

<!-- Style for accueil page-->
<style>
hr{
height: 4px;
background-color: #e0d396;
border: none;
}

#bienvenu{
  text-align: center;
  
}
.caisseText{
  text-align: center;
}
.euro{
  font-size: 100px;
  color: #f8e27e;
}
</style>
@endsection



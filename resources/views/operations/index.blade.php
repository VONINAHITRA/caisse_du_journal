@extends('layouts.master')
@section('contenu')
       <div class="col-xs-12 col-sm-9 content" style="height: 100%">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a></h3>
              </div>
              <div class="panel-body">
                  <div class="content-row">
                    <div class="row">
                      <h4 style="font-weight: initial;">Entrée de fond de caisse</h4>
                      <hr/>
                      <div class="col-md-12">
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="">Type d'opération</label>
                          <select class="form-control" name="">
                            @foreach($types as $type)
                            <option>{{$type["typeOperation"]}}</option>
                            @endforeach
                          </select>
                          </div>
                          </div>
                          <div class="col-md-6" style="text-align:right;">
                           <h3><span id="total"></span><i class="glyphicon glyphicon-euro"></i></h3>
                          </div>
                      </div>

                      <div class="col-md-12">
                          <div class="col-md-4">
                          <div class="form-group">
                          <label for="">Date</label>
                          <input type="date" class="form-control" name="" 
                            value="@php echo date('Y-m-d') @endphp" readonly>
                          </div>
                          </div>
                           <div class="col-md-12">
                          <div class="form-group">
                          <label for="exampleInputEmail1">Note</label>
                           <textarea class="form-control"></textarea>
                          </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <h4 style="font-weight: initial;">Billets</h4>
                      <hr/>
                      <div class="col-md-12">
                          <div class="col-md-3">
                          <div class="form-group">
                           <label for="">Nominal</label>
                            <select class="form-control" name="nominalBillet" id="nominalBillet" onChange="selectBillet(event);">
                            <option>0</option>
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                            <option>200</option>
                            <option>500</option>
                          </select>
                          </div>
                          </div>
                          <div class="col-md-2">
                            <label for="">Quantité</label>
                            <input type="text" class="form-control" name="qtBillet" id="qtBillet" onkeyPress="calculerBillet(event);" onkeyup="effacerBillet(event);">
                          </div>
                          <div class="col-md-7" style="text-align: right;margin-top: -6px; text-align: right;">
                            <div class="row">
                            <h3>
                            <div class="col-md-6" style="float: right;">
                              <span id="afficherBillet"></span> <i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-default" id="btnBillet" style="background-color: #8bc349; color: #fff;">Ajouter</button>
                          </div>
                          <div class="col-md-12">
                            <div id="divB">
                            <table class="table table-hover" id="tableB">
                              <tr>
                                <td>Nominal</td>
                                <td>Quantité</td>
                                <td>Total</td>
                                <td>Action</td>
                              </tr>
                            </table>
                            <span id="sBillet"></span>
                          </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <h4 style="font-weight: initial;">Pièces</h4>
                      <hr/>
                      <div class="col-md-12">
                          <div class="col-md-3">
                          <div class="form-group">
                           <label for="">Nominal</label>
                            <select class="form-control" name="nominalPiece" id="nominalPiece" onChange="selectPiece(event);">
                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                          </select>
                          </div>
                          </div>
                          <div class="col-md-2">
                            <label for="">Quantité</label>
                            <input type="text" class="form-control" name="qtPiece" id="qtPiece" onkeyPress="calculerPiece(event);" onkeyup="effacerPiece(event);">
                          </div>
                         <div class="col-md-7" style="text-align: right;margin-top: -6px; text-align: right;">
                            <div class="row">
                            <h3>
                            <div class="col-md-6" style="float: right;">
                              <span id="afficherPiece"></span> <i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-default" style="background-color: #8bc349; color: #fff;">Ajouter</button>
                          </div>
        
                      </div>
                    </div>

                    <div class="row">
                      <h4 style="font-weight: initial;">Centimes</h4>
                      <hr/>
                      <div class="col-md-12">
                          <div class="col-md-3">
                          <div class="form-group">
                           <label for="">Nominal</label>
                            <select class="form-control" name="nominalCentime" id="nominalCentime" onChange="selectCentime(event);">
                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                          </select>
                          </div>
                          </div>
                          <div class="col-md-2">
                            <label for="">Quantité</label>
                            <input type="text" class="form-control" name="qtCentime" id="qtCentime" onkeyPress="calculerCentime(event);" onkeyup="effacerCentime(event);">
                          </div>
                           <div class="col-md-7" style="text-align: right;margin-top: -6px; text-align: right;">
                            <div class="row">
                            <h3>
                            <div class="col-md-6" style="float: right;">
                                <span id="afficherCentime"></span>
                               <i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-default" style="background-color: #8bc349; color: #fff;">Ajouter</button>
                          </div>
                      </div>
                    </div>

                    <hr class="hrFin" />
                    <div class="row" style="text-align:center">
                      <button class="btn btn-default" style="background-color: #424242; color: #fff;padding: 13px; padding-left: 25px;padding-right: 25px;">Enregistrer</button>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <style>
          hr{
            height: 4px;
            background-color: #e0d396;
            border: none;
          }
          .hrFin{
            height: 2px;
            background-color:#f0f1f6;
            border: none;
          }
        </style>

      <!-- jquery -->
      <script type="text/javascript" src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
      <script>
      //Initialisation
      $(document).ready(function(){
        document.getElementById('afficherBillet').innerHTML=0;
        document.getElementById('afficherPiece').innerHTML=0;
        document.getElementById('afficherCentime').innerHTML=0;
        document.getElementById('total').innerHTML=0;
        document.getElementById('tableB').hidden=true;
        });

       $('#btnBillet').click(function(){
         var nominalBillet = document.getElementById('nominalBillet').value;
         var qtBillet = document.getElementById('qtBillet').value;
         if(qtBillet=="" || isNaN(qtBillet)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableB').hidden=false;
         var resB = (nominalBillet * qtBillet);
        /* var nominalBT = document.getElementById('nominalBT').innerHTML=nominalBillet;
         var qtBT = document.getElementById('qtBT').innerHTML=qtBillet;
         var resBT = document.getElementById('resBT').innerHTML=resB; */
         $('#tableB').append('<tr><td>'+nominalBillet+'</td><td>'+qtBillet+'</td><td>'+resB+'</td><td><button class="btn btn-danger btn-xs" id="btnSuprimer">Supprimer</button></td></tr>');

       });

       $('#btnSuprimer').click(function(){
        alert("OK");
        //document.getElementById('tableB').hidden=true;
        $(this).parents("tr").remove();
       });

      //Sous total de chaque block
      function sBillet(){

      }

        //Total
        function sTotal(event){
          //Get Billets
           var nominalBillet = document.getElementById('nominalBillet').value;
           var qtBillet = document.getElementById('qtBillet').value;
           var resB = (nominalBillet * qtBillet);

           //Get Pièces
           var nominalPiece = document.getElementById('nominalPiece').value;
           var qtPiece = document.getElementById('qtPiece').value;
           var resP = (nominalPiece * qtPiece);

           //Get Centimes
           var nominalCentime = document.getElementById('nominalCentime').value;
           var qtCentime = document.getElementById('qtCentime').value;
           var resC = (nominalCentime * qtCentime) / 100;
           var total = (resB + resP + resC);

           document.getElementById('total').innerHTML=total;
           console.log(total);
        }

       //Calcule en temps réel valeur du Billet
      function calculerBillet(event){
       var nominalBillet = document.getElementById('nominalBillet').value;
       var qtBillet = document.getElementById('qtBillet').value;
       if(isNaN(qtBillet)){
          document.getElementById('qtBillet').style.color="red";
          document.getElementById('afficherBillet').innerHTML=0;
          document.getElementById('total').innerHTML=0;
          return 0;
        }
       var res = (nominalBillet * qtBillet);
          var afficher = document.getElementById('afficherBillet').innerHTML=res;
          sTotal(event);     
        console.log(afficher);
       }

       function selectBillet(event){
       var nominalBillet = document.getElementById('nominalBillet').value;
       var qtBillet = document.getElementById('qtBillet').value;
       if(isNaN(qtBillet)){
          document.getElementById('qtBillet').style.color="red";
          document.getElementById('afficherBillet').innerHTML=0;
          document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtBillet').style.color="#000";
       var res = (nominalBillet * qtBillet);
       sTotal(event);
       var afficher = document.getElementById('afficherBillet').innerHTML=res;
        
        console.log(afficher);
       }

      function effacerBillet(event){
        if(event.keyCode ===8){
          sTotal(event);
       var nominalBillet = document.getElementById('nominalBillet').value;
       var qtBillet      = document.getElementById('qtBillet').value;
                           $('#afficherBillet').text();
       if(isNaN(qtBillet)){
          document.getElementById('qtBillet').style.color="red";
          document.getElementById('afficherBillet').innerHTML=0;
                    document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtBillet').style.color="#000";
        var res = (nominalBillet * qtBillet);
        return afficher = document.getElementById('afficherBillet').innerHTML=res;
        sTotal(event);
        console.log(afficher);
        }else{
        calculerBillet(event); 
        }
      }

      //Calcule en temps réel valeur du Pièces
      function calculerPiece(event){
       var nominalPiece = document.getElementById('nominalPiece').value;
       var qtPiece = document.getElementById('qtPiece').value;
       if(isNaN(qtPiece)){
          document.getElementById('qtPiece').style.color="red";
          document.getElementById('afficherPiece').innerHTML=0;
           document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtPiece').style.color="#000";
       var res = (nominalPiece * qtPiece);
       var afficher = document.getElementById('afficherPiece').innerHTML=res;
       sTotal(event);
        console.log(afficher);
       }

       function selectPiece(event){
       var nominalPiece = document.getElementById('nominalPiece').value;
       var qtPiece = document.getElementById('qtPiece').value;
       if(isNaN(qtPiece)){
          document.getElementById('qtPiece').style.color="red";
          document.getElementById('afficherPiece').innerHTML=0;
           document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtPiece').style.color="#000";
       var res = (nominalPiece * qtPiece);
       var afficher = document.getElementById('afficherPiece').innerHTML=res;
       document.getElementById('total').innerHTML=0;
       sTotal(event);
        console.log(afficher);
       }

      function effacerPiece(event){
        if(event.keyCode ===8){
       var nominalPiece = document.getElementById('nominalPiece').value;
       var qtPiece = document.getElementById('qtPiece').value;
       if(isNaN(qtPiece)){
          document.getElementById('qtPiece').style.color="red";
          document.getElementById('afficherPiece').innerHTML=0;
           document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtPiece').style.color="#000";
       var res = (nominalPiece * qtPiece);
       var afficher = document.getElementById('afficherPiece').innerHTML=res;
       sTotal(event);
        }else{
       calculerPiece(event);    
        }
      }

      //Calcule en temps réel valeur du Centimes
      function calculerCentime(event){
       var nominalCentime = document.getElementById('nominalCentime').value;
       var qtCentime = document.getElementById('qtCentime').value;
        if(isNaN(qtCentime)){
          document.getElementById('qtCentime').style.color="red";
          document.getElementById('afficherCentime').innerHTML=0;
           document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtCentime').style.color="#000";
       var res = Math.abs((nominalCentime * qtCentime) / 100) ;
       var afficher = document.getElementById('afficherCentime').innerHTML=res;
       sTotal(event);
        console.log(afficher);
       }

       function selectCentime(event){
       var nominalCentime = document.getElementById('nominalCentime').value;
       var qtCentime = document.getElementById('qtCentime').value;
       if(isNaN(qtCentime)){
          document.getElementById('qtCentime').style.color="red";
          document.getElementById('afficherCentime').innerHTML=0;
           document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtCentime').style.color="#000";
       var res = (nominalCentime * qtCentime) / 100;
       var afficher = document.getElementById('afficherCentime').innerHTML=res;
       sTotal(event);
        console.log(afficher);
       }

      function effacerCentime(event){
        if(event.keyCode ===8){
       var nominalCentime = document.getElementById('nominalCentime').value;
       var qtCentime = document.getElementById('qtCentime').value;
       if(isNaN(qtCentime)){
           document.getElementById('qtCentime').style.color="red";
           document.getElementById('afficherCentime').innerHTML=0;
           document.getElementById('total').innerHTML=0;
          return 0;
        }
       document.getElementById('qtCentime').style.color="#000";
       var res = (nominalCentime * qtCentime) / 100;
       var afficher = document.getElementById('afficherCentime').innerHTML=res;
       sTotal(event);
        }else{
       calculerCentime(event);    
        }
      }

      //Fonciton globale sur la totalité
      function total(){

      }

     

    </script>
@endsection



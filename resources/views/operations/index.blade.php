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
                           <h3><!--span id="total"></span--> <span id="globalTotalAll"></span><i class="glyphicon glyphicon-euro"></i></h3>
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
                            <div class="col-md-6" style="float: right;font-size: 22px;font-style: normal;;font-weight:initial;">
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
                            <div class="col-md-6" style="float: right;font-size: 22px;font-style: normal;font-weight:initial;">
                              <span id="afficherPiece"></span> <i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-default" id="btnPiece" style="background-color: #8bc349; color: #fff;">Ajouter</button>
                          </div>
                          <div class="col-md-12">
                            <div id="divP">
                            <table class="table table-hover" id="tableP">
                              <tr>
                                <td>Nominal</td>
                                <td>Quantité</td>
                                <td>Total</td>
                                <td>Action</td>
                              </tr>
                              
                            </table>
                            <span id="spiece"></span>
                          </div>
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
                            <div class="col-md-6" style="float: right;font-size: 22px;font-style: normal;;font-weight:initial;">
                                <span id="afficherCentime"></span>
                               <i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-default" id="btnCentime" style="background-color: #8bc349; color: #fff;">Ajouter</button>
                          </div>
                           <div class="col-md-12">
                            <div id="divC">
                            <table class="table table-hover" id="tableC">
                              <tr>
                                <td>Nominal</td>
                                <td>Quantité</td>
                                <td>Total</td>
                                <td>Action</td>
                              </tr>
                            </table>
                            <span id="sCentimer"></span>
                          </div>
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
        <!-- TotalGblobal -->

      
      <!-- jquery -->
      <script type="text/javascript" src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
      <script>
      //Initialisation
      $(document).ready(function(){
        document.getElementById('afficherBillet').innerHTML=0;
        document.getElementById('afficherPiece').innerHTML=0;
        document.getElementById('afficherCentime').innerHTML=0;
        document.getElementById('globalTotalAll').innerHTML=0;
        document.getElementById('tableB').hidden=true;
        document.getElementById('tableP').hidden=true;
        document.getElementById('tableC').hidden=true;
        
        });

       //append billet
       $('#btnBillet').on('click',function(){
         var nominalBillet = document.getElementById('nominalBillet').value;
         var qtBillet = document.getElementById('qtBillet').value; 
         if(qtBillet=="" || isNaN(qtBillet)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableB').hidden=false;
         var resB = (nominalBillet * qtBillet);

         //update global Billet
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var cumuleGlobalB = globalTotal + resB;
             document.getElementById('globalTotalAll').innerHTML=cumuleGlobalB;

         //temp
         var tmp = parseFloat($('#afficherBillet').text()); 
         if(tmp == 0 || tmp ==null){
          var resBT = document.getElementById('afficherBillet').innerHTML=resB;
         }else{
          var resBT = document.getElementById('afficherBillet').innerHTML=tmp;
         }
         var div = $('#tableB').append('<tr><td>'+nominalBillet+'</td><td>'+qtBillet+'</td><td id="tdVal">'+resB+'</td><td><button class="btn btn-danger btn-xs suprimerB">Supprimer</button></td></tr>');

         //réinitialisé le calcul
         document.getElementById('afficherBillet').innerHTML=0;
         document.getElementById('qtBillet').value=""; 
       });

       //remove append billet
      $(document).on('click', 'button.suprimerB', function () {

        //update global billet
         var delB = parseFloat($(this).parents('tr').find('td:nth-child(3)').text());
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var deleteGlobalB = globalTotal - delB;
             document.getElementById('globalTotalAll').innerHTML=deleteGlobalB;
        //remove td
        $(this).closest('tr').remove();
        return false;
       });


      //append pièces
       $('#btnPiece').on('click',function(){
         var nominalPiece = document.getElementById('nominalPiece').value;
         var qtPiece = document.getElementById('qtPiece').value; 
         if(qtPiece=="" || isNaN(qtPiece)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableP').hidden=false;
         var resP = (nominalPiece * qtPiece);

         //update global Pièce
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var cumuleGlobalP = globalTotal + resP;
             document.getElementById('globalTotalAll').innerHTML=cumuleGlobalP;

         //tmp
         var tmp = parseFloat($('#afficherPiece').text()); 
         if(tmp == 0 || tmp ==null){
          var resPT = document.getElementById('afficherPiece').innerHTML=resP;
         }else{
          var resPT = document.getElementById('afficherPiece').innerHTML=tmp;
         }
         var div = $('#tableP').append('<tr><td>'+nominalPiece+'</td><td>'+qtPiece+'</td><td>'+resP+'</td><td><button class="btn btn-danger btn-xs suprimerP">Supprimer</button></td></tr>');

         //réinitialisé le calcul
         document.getElementById('afficherPiece').innerHTML=0;
         document.getElementById('qtPiece').value="";
       });
       //remove append pièces
      $(document).on('click', 'button.suprimerP', function () {
        //update global billet
         var delP = parseFloat($(this).parents('tr').find('td:nth-child(3)').text());
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var deleteGlobalP = globalTotal - delP;
             document.getElementById('globalTotalAll').innerHTML=deleteGlobalP;

        //remove td
        $(this).closest('tr').remove();
        return false;
       });

      //append Centimes
       $('#btnCentime').on('click',function(){
         var nominalCentime = document.getElementById('nominalCentime').value;
         var qtCentime = document.getElementById('qtCentime').value; 
         if(qtCentime=="" || isNaN(qtCentime)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableC').hidden=false;
         var resC = (nominalCentime * qtCentime) / 100;
         //update global Pièce
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var cumuleGlobalC = globalTotal + resC;
             document.getElementById('globalTotalAll').innerHTML=cumuleGlobalC;

         //tmp
         var tmp = parseFloat($('#afficherCentime').text()); 
         if(tmp == 0 || tmp ==null){
          var resCT = document.getElementById('afficherCentime').innerHTML=resC;
         }else{
          var resCT = document.getElementById('afficherCentime').innerHTML=tmp;
         }
         var div = $('#tableC').append('<tr><td>'+nominalCentime+'</td><td>'+qtCentime+'</td><td>'+resC+'</td><td><button class="btn btn-danger btn-xs suprimerC">Supprimer</button></td></tr>');

         //réinitialisé le calcul
         document.getElementById('afficherCentime').innerHTML=0;
         document.getElementById('qtCentime').value="";
       });

       //remove append Centimes
      $(document).on('click', 'button.suprimerC', function () {
        //update global Centime
         var delC = parseFloat($(this).parents('tr').find('td:nth-child(3)').text());
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var deleteGlobalC = globalTotal - delC;
             document.getElementById('globalTotalAll').innerHTML=deleteGlobalC;
             
        //remove td
        $(this).closest('tr').remove();
        return false;
       });

      //Sous total de chaque block
      function sBillet(){
        var nominalBillet = document.getElementById('nominalBillet').value;
        var qtBillet = document.getElementById('qtBillet').value;
        var resB = (nominalBillet * qtBillet);
      }

       //Calcule en temps réel valeur du Billet
      function calculerBillet(event){
       var nominalBillet = document.getElementById('nominalBillet').value;
       var qtBillet = document.getElementById('qtBillet').value;
       var tmpGetValueB = parseFloat($('#afficherBillet').text());
       if(isNaN(qtBillet)){
          document.getElementById('qtBillet').style.color="red";
          document.getElementById('afficherBillet').innerHTML=0;
          return 0;
        }
        var resB = (nominalBillet * qtBillet);
        document.getElementById('afficherBillet').innerHTML=resB;
       }

       function selectBillet(event){
       var nominalBillet = document.getElementById('nominalBillet').value;
       var qtBillet = document.getElementById('qtBillet').value;
       if(isNaN(qtBillet)){
          document.getElementById('qtBillet').style.color="red";
          document.getElementById('afficherBillet').innerHTML=0;
          
          return 0;
        }
        document.getElementById('qtBillet').style.color="#000";
       var res = (nominalBillet * qtBillet);
       //sTotal(event);
       var afficher = document.getElementById('afficherBillet').innerHTML=res;
        
        console.log(afficher);
       }

      function effacerBillet(event){
        if(event.keyCode ===8){
         // sTotal(event);
       var nominalBillet = document.getElementById('nominalBillet').value;
       var qtBillet      = document.getElementById('qtBillet').value;
                           $('#afficherBillet').text();
       if(isNaN(qtBillet)){
          document.getElementById('qtBillet').style.color="red";
          document.getElementById('afficherBillet').innerHTML=0;
                    
          return 0;
        }
        document.getElementById('qtBillet').style.color="#000";
        var res = (nominalBillet * qtBillet);
        return afficher = document.getElementById('afficherBillet').innerHTML=res;
        //sTotal(event);
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
          
          return 0;
        }
        document.getElementById('qtPiece').style.color="#000";
       var res = (nominalPiece * qtPiece);
       var afficher = document.getElementById('afficherPiece').innerHTML=res;
       //sTotal(event);
        console.log(afficher);
       }

       function selectPiece(event){
       var nominalPiece = document.getElementById('nominalPiece').value;
       var qtPiece = document.getElementById('qtPiece').value;
       if(isNaN(qtPiece)){
          document.getElementById('qtPiece').style.color="red";
          document.getElementById('afficherPiece').innerHTML=0;
          
          return 0;
        }
        document.getElementById('qtPiece').style.color="#000";
       var res = (nominalPiece * qtPiece);
       var afficher = document.getElementById('afficherPiece').innerHTML=res;
       
       //sTotal(event);
        console.log(afficher);
       }

      function effacerPiece(event){
        if(event.keyCode ===8){
       var nominalPiece = document.getElementById('nominalPiece').value;
       var qtPiece = document.getElementById('qtPiece').value;
       if(isNaN(qtPiece)){
          document.getElementById('qtPiece').style.color="red";
          document.getElementById('afficherPiece').innerHTML=0;
          
          return 0;
        }
        document.getElementById('qtPiece').style.color="#000";
       var res = (nominalPiece * qtPiece);
       var afficher = document.getElementById('afficherPiece').innerHTML=res;
      // sTotal(event);
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
          
          return 0;
        }
        document.getElementById('qtCentime').style.color="#000";
       var res = Math.abs((nominalCentime * qtCentime) / 100) ;
       var afficher = document.getElementById('afficherCentime').innerHTML=res;
      // sTotal(event);
        console.log(afficher);
       }

       function selectCentime(event){
       var nominalCentime = document.getElementById('nominalCentime').value;
       var qtCentime = document.getElementById('qtCentime').value;
       if(isNaN(qtCentime)){
          document.getElementById('qtCentime').style.color="red";
          document.getElementById('afficherCentime').innerHTML=0;
          // document.getElementById('total').innerHTML=0;
          return 0;
        }
        document.getElementById('qtCentime').style.color="#000";
       var res = (nominalCentime * qtCentime) / 100;
       var afficher = document.getElementById('afficherCentime').innerHTML=res;
       //sTotal(event);
        console.log(afficher);
       }

      function effacerCentime(event){
        if(event.keyCode ===8){
       var nominalCentime = document.getElementById('nominalCentime').value;
       var qtCentime = document.getElementById('qtCentime').value;
       if(isNaN(qtCentime)){
           document.getElementById('qtCentime').style.color="red";
           document.getElementById('afficherCentime').innerHTML=0;
           
          return 0;
        }
       document.getElementById('qtCentime').style.color="#000";
       var res = (nominalCentime * qtCentime) / 100;
       var afficher = document.getElementById('afficherCentime').innerHTML=res;
       //sTotal(event);
        }else{
       calculerCentime(event);    
        }
      }

      //Fonciton globale sur la totalité
      function total(){

      }

     

    </script>
@endsection



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
                       @include('flash-message')
                     <hr/>
                      <form action="{{route('mouvements.store')}}" method="post">
                        @csrf
                          <div class="col-md-12">
                            <div class="col-md-6">
                             <div class="form-group">
                              <label for="">Type d'opération</label>
                               <select class="form-control" name="typeMouvement">
                                 @foreach($types as $type)
                                  <option>{{$type["typeOperation"]}}</option>
                                 @endforeach
                               </select>
                              </div>
                             </div>
                            <div class="col-md-6" style="text-align:right;">
                           <h3><span name="totalOperation" id="globalTotalAll"></span> <input type="hidden" name="totalMouvement" id="globalFinalJours"><i class="glyphicon glyphicon-euro"></i></h3>
                          </div>
                       </div> 

                       <div class="col-md-12">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Date</label>
                              <input type="date" class="form-control" name="dateMouvement" value="@php echo date('Y-m-d') @endphp" readonly>
                             </div>
                            </div>
                           <div class="col-md-12">
                           <div class="form-group">
                             <label for="commentMouvement">Note</label>
                             <textarea class="form-control" name="commentMouvement"></textarea>
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
                              <span id="afficherBillet"></span> <input type="hidden" name="billetMouvement" id="tmpSousTotalBillet"><i class="glyphicon glyphicon-euro"></i>
                            </div>
                            </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button type="button" class="btn btn-default" id="btnBillet" style="padding: 5px;padding-right:21px; padding-left: 21px;background-color: #8bc349; color: #fff;"><i class="glyphicon glyphicon-plus"></i> Ajouter</button>
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
                              <span id="afficherPiece"></span> <input type="hidden" name="pieceMouvement" id="tmpSousTotalPiece"><i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button type="button" class="btn btn-default" id="btnPiece" style="padding: 5px;padding-right:21px; padding-left: 21px;background-color: #8bc349; color: #fff;"><i class="glyphicon glyphicon-plus"></i> Ajouter</button>
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
                            <span id="afficherCentime"></span> <input type="hidden" name="centimeMouvement" id="tmpSousTotalCentime"> <i class="glyphicon glyphicon-euro"></i>
                           </div>
                           </h3> 
                          </div>
                          </div>
                          <div class="col-md-12">
                            <button type="button" class="btn btn-default" id="btnCentime" style="padding: 5px;padding-right:21px; padding-left: 21px;background-color: #8bc349; color: #fff;"><i class="glyphicon glyphicon-plus"></i> Ajouter</button>
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
                      <button type="submit" class="btn btn-default " style="background-color: #424242; color: #fff;padding: 13px; padding-left: 25px;padding-right: 25px;"><i class="glyphicon glyphicon-check"></i> Enregistrer</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>

  <!-- Little style global for mouvment -->
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
        document.getElementById('globalTotalAll').innerHTML=0;
        document.getElementById('tmpSousTotalBillet').value=0;
        document.getElementById('tmpSousTotalPiece').value=0;
        document.getElementById('tmpSousTotalCentime').value=0;
        document.getElementById('globalFinalJours').value=0;
        document.getElementById('tableB').hidden=true;
        document.getElementById('tableP').hidden=true;
        document.getElementById('tableC').hidden=true;
        });

       //append billet
       $('#btnBillet').on('click',function(){
         var gettmpSousTotalB = parseFloat(document.getElementById('tmpSousTotalBillet').value);
         var nominalBillet = document.getElementById('nominalBillet').value;
         var qtBillet = document.getElementById('qtBillet').value; 
         if(qtBillet=="" || isNaN(qtBillet)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableB').hidden=false;
         var resB = (nominalBillet * qtBillet);

         //update global Billet
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var cumuleGlobalB = globalTotal + resB;
         var finaly = document.getElementById('globalTotalAll').innerHTML=cumuleGlobalB;
             document.getElementById('globalFinalJours').value=finaly;

         //sous total
         if(gettmpSousTotalB==null || gettmpSousTotalB==0){
          document.getElementById('tmpSousTotalBillet').value=resB;
         }
         
         //temp
         var tmp = parseFloat($('#afficherBillet').text()); 
         if(tmp == 0 || tmp ==null){
          var resBT = document.getElementById('afficherBillet').innerHTML=resB;
         }else{
          var resBT = document.getElementById('afficherBillet').innerHTML=tmp;
         }
         var div = $('#tableB').append('<tr><td>'+nominalBillet+'</td><td>'+qtBillet+'</td><td id="tdVal">'+resB+'</td><td><button class="btn btn-danger btn-xs suprimerB">Supprimer</button></td></tr>');

          //Tmp
          var tmpSousTotalB = resB + gettmpSousTotalB;
          var sousTotalFInal = document.getElementById('tmpSousTotalBillet').value=tmpSousTotalB;
          document.getElementById('afficherBillet').innerHTML=sousTotalFInal;
       });

       //remove append billet
      $(document).on('click', 'button.suprimerB', function () {
        //update global billet
         var delB = parseFloat($(this).parents('tr').find('td:nth-child(3)').text());
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var deleteGlobalB = globalTotal - delB;
         var finaly= document.getElementById('globalTotalAll').innerHTML=deleteGlobalB;
             document.getElementById('globalFinalJours').value=finaly;
          var gettmpSousTotalB = parseFloat(document.getElementById('tmpSousTotalBillet').value);
          var tmpSousTotalB = gettmpSousTotalB-delB;
          var sousTotalFInal = document.getElementById('tmpSousTotalBillet').value=tmpSousTotalB;
          document.getElementById('afficherBillet').innerHTML=sousTotalFInal;

        //remove td
        $(this).closest('tr').remove();
        return false;
       });

      //append pièces
       $('#btnPiece').on('click',function(){
         var gettmpSousTotalP = parseFloat(document.getElementById('tmpSousTotalPiece').value);
         var nominalPiece = document.getElementById('nominalPiece').value;
         var qtPiece = document.getElementById('qtPiece').value; 
         if(qtPiece=="" || isNaN(qtPiece)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableP').hidden=false;
         var resP = (nominalPiece * qtPiece);

         //sous total
         if(gettmpSousTotalP==null || gettmpSousTotalP==0){
          document.getElementById('tmpSousTotalPiece').value=resP;
         }

         //update global Pièce
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var cumuleGlobalP = globalTotal + resP;
         var finaly= document.getElementById('globalTotalAll').innerHTML=cumuleGlobalP;
              document.getElementById('globalFinalJours').value=finaly;

         //tmp
         var tmp = parseFloat($('#afficherPiece').text()); 
         if(tmp == 0 || tmp ==null){
          var resPT = document.getElementById('afficherPiece').innerHTML=resP;
         }else{
          var resPT = document.getElementById('afficherPiece').innerHTML=tmp;
         }
         var div = $('#tableP').append('<tr><td>'+nominalPiece+'</td><td>'+qtPiece+'</td><td>'+resP+'</td><td><button class="btn btn-danger btn-xs suprimerP">Supprimer</button></td></tr>');

         //Tmp
          var tmpSousTotalP = resP + gettmpSousTotalP;
          var sousTotalFInal = document.getElementById('tmpSousTotalPiece').value=tmpSousTotalP;
          document.getElementById('afficherPiece').innerHTML=sousTotalFInal;
          console.log(sousTotalFInal);
       });

       //remove append pièces
      $(document).on('click', 'button.suprimerP', function () {

        //update global billet
         var delP = parseFloat($(this).parents('tr').find('td:nth-child(3)').text());
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var deleteGlobalP = globalTotal - delP;
         var finaly=  document.getElementById('globalTotalAll').innerHTML=deleteGlobalP;
                      document.getElementById('globalFinalJours').value=finaly;
          var gettmpSousTotalP = parseFloat(document.getElementById('tmpSousTotalPiece').value);
          var tmpSousTotalP = gettmpSousTotalP-delP;
          var sousTotalFInal = document.getElementById('tmpSousTotalPiece').value=tmpSousTotalP;
          document.getElementById('afficherPiece').innerHTML=sousTotalFInal;

        //remove td
        $(this).closest('tr').remove();
        return false;
       });

      //append Centimes
       $('#btnCentime').on('click',function(){
         var gettmpSousTotalC = parseFloat(document.getElementById('tmpSousTotalCentime').value);
         var nominalCentime = document.getElementById('nominalCentime').value;
         var qtCentime = document.getElementById('qtCentime').value; 
         if(qtCentime=="" || isNaN(qtCentime)) { alert("Veuillez saisir une valeur correcte"); return 0}
         document.getElementById('tableC').hidden=false;
         var resC = (nominalCentime * qtCentime) / 100;

         //update global Pièce
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var cumuleGlobalC = globalTotal + resC;
          var finaly = document.getElementById('globalTotalAll').innerHTML=cumuleGlobalC;
              document.getElementById('globalFinalJours').value=finaly;

          //sous total
         if(gettmpSousTotalC==null || gettmpSousTotalC==0){
          document.getElementById('tmpSousTotalCentime').value=resC;
         } 

         //tmp
         var tmp = parseFloat($('#afficherCentime').text()); 
         if(tmp == 0 || tmp ==null){
          var resCT = document.getElementById('afficherCentime').innerHTML=resC;
         }else{
          var resCT = document.getElementById('afficherCentime').innerHTML=tmp;
         }
         var div = $('#tableC').append('<tr name="ok"><td>'+nominalCentime+'</td><td>'+qtCentime+'</td><td>'+resC+'</td><td><button class="btn btn-danger btn-xs suprimerC">Supprimer</button></td></tr>');

          //Tmp
          var tmpSousTotalC = resC + gettmpSousTotalC;
          var sousTotalFInal = document.getElementById('tmpSousTotalCentime').value=tmpSousTotalC;
          document.getElementById('afficherCentime').innerHTML=sousTotalFInal; 
       });

       //remove append Centimes
      $(document).on('click', 'button.suprimerC', function () {
        //update global Centime
         var delC = parseFloat($(this).parents('tr').find('td:nth-child(3)').text());
         var globalTotal = parseFloat($('#globalTotalAll').text());
         var deleteGlobalC = globalTotal - delC;
         var finaly = document.getElementById('globalTotalAll').innerHTML=deleteGlobalC;
              document.getElementById('globalFinalJours').value=finaly;

          var gettmpSousTotalC = parseFloat(document.getElementById('tmpSousTotalCentime').value);
          var tmpSousTotalC = gettmpSousTotalC-delC;
          var sousTotalFInal = document.getElementById('tmpSousTotalCentime').value=tmpSousTotalC;
          document.getElementById('afficherCentime').innerHTML=sousTotalFInal;
             
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



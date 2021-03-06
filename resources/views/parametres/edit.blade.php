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
                     <h3 id="tables-hover-rows"><u>Modifier type d'opération</u></h3>
                    <div class="bs-example">
                       <br>
                      <a href="{{route('params.index')}}" class="btn btn-default" style="background-color: #8bc349;"><i class="glyphicon glyphicon-arrow-left"></i> retour</a>
                      <br>
                      <br>
                     <div class="content-row">
                      <div class="panel panel-default">
                       <div class="panel-options">
                        <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
                        <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
                        <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>
                  @include('flash-message')
                  </div>
                </div>
               </div>
              </div>

              <div class="content-row">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <form action="{{route('params.update', $type->id)}}" method="post" onsubmit="return confirmAction();">
                        @csrf
                        <div class="row row-type">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Type d'opération * </label>
                                <input type="text" class="form-control" name="typeOperation"  value="{{$type->typeOperation}}" maxlength="25" required>
                             </div>
                           </div>
                        </div>

                        <div class="row row-description">
                           <div class="col-md-4">
                             <div class="form-group">
                             <label for="">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Ex: ajoute à la caisse" maxlength="25" value="{{$type->description}}">
                          </div>
                           </div>
                        </div>

                        <button type="submit" class="btn btn-default" style="background-color:#424242 ;"><i class="glyphicon glyphicon-check"></i> Enregistrer</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       <style>
         .row-description{
          margin-top: -20px;
         }
         .row-type{
          margin-top: -20px;
         }
         .btn{
          margin-top: -20px;
          padding: 5px;
          background-color: #8bc349;
          color: #fff;
         }
         .btn
       </style>
@endsection



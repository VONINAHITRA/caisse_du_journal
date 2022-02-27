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
                        <div class="bs-example">
                        @include('flash-message')
                       <div class="col-md-4">
                       <h4 style="font-weight: initial;">Total caisse</h4>
                       <hr/>
                       <h3 style="font-style: normal;text-align: center;font-weight: initial;">220.5 <i class="glyphicon glyphicon-euro" style="font-weight: initial;"></i></h3>
                      </div>
                     </div>
                    <div class="col-md-8">
                      <h4 style="font-weight: initial;">Opération du jour</h4>
                      <hr/>
                       <table class="table table-hover">
                        <thead>
                          <tr style="text-align:center">
                            <th width="12%">Date</th>
                            <th>&nbsp;&nbsp;Type</th>
                            <th>Montant</th>
                            <th>Retraits</th>
                            <th>Ajouts</th>
                            <th>Total</th>
                            <th>Actions</th>
                          </tr>
                         </thead>
                        <tbody>
                          <tr>
                            <td>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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
        </style>
@endsection



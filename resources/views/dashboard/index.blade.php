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
                       <h3 style="font-style: normal;text-align: center;font-weight: initial;">
                        <?php echo strrev(wordwrap(strrev($resultats), 5, ' ', true)); ?>
                        <i class="glyphicon glyphicon-euro" style="font-weight: initial;font-size: 22px;"></i></h3>
                       </div>
                     </div>
                    <div class="col-md-8">
                      <h4 style="font-weight: initial;">Opération du jour</h4>
                       <hr/>
                       <table class="table table-hover">
                        <thead>
                          <tr style="text-align:center">
                            <th>Date</th>
                            <th>Retraits</th>
                            <th>Ajouts</th>
                            <th>Total</th>
                            <th style="text-align:left;">Actions</th>
                          </tr>
                         </thead>
                        <tbody>
                          @foreach($mouvements as $mvt)
                          <tr>
                            <td>{{$mvt->dateMouvement}}</td>
                            <td>{{$mvt->depot}}</td>
                            <td>{{($mvt->retrait) + ($mvt->remise)}}</td>
                            <td>{{$mvt->depot -($mvt->retrait + $mvt->remise)}}</td>
                            <td>
                             <div class="row">
                                <div class="col-md-6">
                                  <form action="#" method="get" >
                                   @csrf
                                   @method('GET')
                                   <button class="btn btn-warning btn-xs" style="padding: 5px;padding-right:21px; padding-left: 21px;"><i class="glyphicon glyphicon-edit"></i> Edition</button>
                                  </form>
                                </div>
                                <div class="col-md-6">
                                 <form action ="{{route('dashboard.destroy')}}" method="post" onsubmit="return confirmAction();">
                                   <input type="hidden" value="{{$mvt->dateMouvement}}" name="dateMouvement">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-danger btn-xs" style="padding: 5px;padding-right:18px; padding-left: 18px;" type="submit"><i class="glyphicon glyphicon-trash"></i> Suppression</button>
                                 </form> 
                                </div>
                               </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
 <!-- style for dashboard -->
 <style>
  hr{
    height: 4px;
    background-color: #e0d396;
    border: none;
  }
</style>
@endsection



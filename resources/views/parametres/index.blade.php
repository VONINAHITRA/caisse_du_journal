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
                     <h3 id="tables-hover-rows"><u>Types d'opérations</u></h3>

                    <div class="bs-example">
                       <br>
                      @include('flash-message')
                      <a href="{{route('params.create')}}" class="btn btn-default btn-xs" style="padding: 3px; padding-left: 10px;padding-right: 10px;background-color: #8bc349;color:#fff"><i class="glyphicon glyphicon-plus"></i> Ajouter</a>
                      <br>
                      <hr/>
                      <table class="table table-hover">
                        <thead>
                          <tr style="text-align:center">
                            <th>&nbsp;&nbsp;Type</th>
                            <th>Description</th>
                            <th width="12%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($types as $type)
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$type->typeoperation}}</td>
                            <td>{{$type->description}}</td>
                            <td>
                              <div class="row">
                                 <div class="col-md-6">
                                 <form action="{{route('params.edit', [$type])}}" method="get" >
                                  @csrf
                                  @method('GET')
                                 <button class="btn btn-warning btn-xs" ><i class="glyphicon glyphicon-edit" style="padding-left: 20px;padding-right: 20px;"></i></button>
                                 </form>
                                </div>
                                <div class="col-md-6">
                                 <form action ="{{route('params.destroy', $type->id)}}" method="get" onsubmit="return confirmAction();">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-xs" type="submit" style="padding-left: 20px;padding-right: 20px;"><i class="glyphicon glyphicon-trash "></i></button>
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
       <style>
          hr{
            height: 4px;
            background-color: #e0d396;
            border: none;
          }
        </style>
@endsection



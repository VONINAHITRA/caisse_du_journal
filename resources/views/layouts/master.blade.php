<?php 
  session_start();
  if(Session::get('identifiant')==null){
   redirect()->to(route('authentification'))->send();
   }
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Caisse</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
  </head>
<body>
<!--nav-->
 @include('layouts.partials.__nav')
 <br> <br>
<div class="container-fluid">
 <div class="row row-offcanvas row-offcanvas-left">
 	<!--side-->
  @include('layouts.partials.__side')
 	<!--Body-->
  @yield('contenu')
  </div>
 </div>
</body>
   <!-- js -->
   <script type="text/javascript" src="{{asset('assets/js/js.min.js')}}"></script>
    <!-- jquery -->
   <script type="text/javascript" src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
</html>
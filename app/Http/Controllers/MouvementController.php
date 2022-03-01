<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Mouvement;
use DB;
class MouvementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::get("typeOperation");
        return view("mouvements/index", compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
       $typeMouvement = $request->get('typeMouvement');
       $commentMouvement = $request->get('commentMouvement');
       $dateMouvement = $request->get('dateMouvement');
       $billetMouvement = $request->get('billetMouvement');
       $pieceMouvement = $request->get('pieceMouvement');
       $centimeMouvement = $request->get('centimeMouvement');

       $verification = Mouvement::select(
                              DB::raw("(sum(totalMouvementDepot)) as  depot"), 
                              DB::raw("dateMouvement"))
                              ->groupBy(DB::raw("dateMouvement"))->first();       

        if($typeMouvement=="dépôt de caisse"){
           $totalMouvementDepot = $request->get('totalMouvement');
           $addMouvementDepot = new Mouvement([
          'typeMouvement' =>$typeMouvement ,        
          'commentMouvement' =>$commentMouvement ,        
          'dateMouvement' =>$dateMouvement ,        
          'billetMouvement' =>$billetMouvement ,        
          'pieceMouvement' =>$pieceMouvement ,        
          'centimeMouvement' =>$centimeMouvement ,        
          'totalMouvementDepot' =>$totalMouvementDepot,                       
       ]);    
        $addMouvementDepot->save();
        return back()->with('success', 'L\'opération a été bien enregistré!');
        }else if($typeMouvement=="remise en banque"){
         $totalMouvementRemise = $request->get('totalMouvement');
              if($verification->depot < $totalMouvementRemise){
               return back()->with('warning', 'Fond de caisse insufisant');
              }
        $addMouvementRemise = new Mouvement([
          'typeMouvement' =>$typeMouvement ,        
          'commentMouvement' =>$commentMouvement ,        
          'dateMouvement' =>$dateMouvement ,        
          'billetMouvement' =>$billetMouvement ,        
          'pieceMouvement' =>$pieceMouvement ,        
          'centimeMouvement' =>$centimeMouvement ,        
          'totalMouvementRemise' =>$totalMouvementRemise ,                       
       ]);    
        $addMouvementRemise->save();
        return back()->with('success', 'L\'opération a été bien enregistré!');

        }else if($typeMouvement=="retrait"){
           $totalMouvementRetrait = $request->get('totalMouvement');
           if($verification->depot < $totalMouvementRetrait){
               return back()->with('warning', 'Fond de caisse insufisant');
              }
           $addMouvementRetrait = new Mouvement([
          'typeMouvement' =>$typeMouvement ,        
          'commentMouvement' =>$commentMouvement ,        
          'dateMouvement' =>$dateMouvement ,        
          'billetMouvement' =>$billetMouvement ,        
          'pieceMouvement' =>$pieceMouvement ,        
          'centimeMouvement' =>$centimeMouvement ,        
          'totalMouvementRetrait' =>$totalMouvementRetrait ,                       
       ]);    
           
        $addMouvementRetrait->save();
        return back()->with('success', 'L\'opération a été bien enregistré!');
        }else{
        return back()->with('warning', 'Type d\'opération inconnu !');
        }
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}

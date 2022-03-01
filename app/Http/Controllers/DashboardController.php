<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Mouvement;
use DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get global
        $totalDepot = Mouvement::select( DB::raw("SUM(totalMouvementDepot) as depot"))->where('typeMouvement','dépôt de caisse')->first();
        $totalRemise = Mouvement::select( DB::raw("SUM(totalMouvementRemise) as remise"))->where('typeMouvement','remise en banque')->first();
        $totalRetrait = Mouvement::select( DB::raw("SUM(totalMouvementRetrait) as retrait"))->where('typeMouvement','retrait')->first();
        $resultats = $totalDepot->depot - ($totalRemise->remise + $totalRetrait->retrait);

        $mouvements = Mouvement::select(
                              DB::raw("(sum(totalMouvementDepot)) as  depot"),
                              DB::raw("(sum(totalMouvementRetrait)) as retrait"), 
                              DB::raw("(sum(totalMouvementRemise)) as remise"), 
                              DB::raw("dateMouvement"))
                              ->groupBy(DB::raw("dateMouvement"))->get();
     //dd($totaltest);
        //$mouvements = DB::table('mouvements')->select('dateMouvement')->groupBy('dateMouvement')->get();

        return view('dashboard/index', compact("resultats","mouvements"));
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
        //
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
    public function destroy(Request $request)
    {
        $date = $request->dateMouvement;
        Mouvement::where("dateMouvement",$date)->delete();
        return back()->with('success','L\opération de caisse a été bien supprimé ');
    }
}

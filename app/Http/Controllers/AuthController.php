<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connexion(Request $request)
    {
        $identifiant = $request->identifiant;
        $motDePasse = $request->motDePasse;
        $connexion = User::where('identifiant',$identifiant)->where('motDePasse', $motDePasse)->first();

        if($connexion !=null){
         //session_start();
            Session::put('id',$connexion->id);
            Session::put('identifiant',$connexion->identifiant);
            Session::put('motDePasse',$connexion->pseudo);
            return redirect(route('index'));
            
        }else{
         return back()->with('error','Erreur de connexion');
        }
    }

    public function deconnexion(){
        Session::forget([
            'id',
            'identifiant',
            'motDePasse'
             ]);
        return redirect(route('authentification'));
    }
}

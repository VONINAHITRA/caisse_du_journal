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

        $identifiant = $request->identifiantUser;
        $motDePasse = $request->motDePasseUser;
        $connexion = User::where('identifiantUser',$identifiant)->where('motDePasseUser', $motDePasse)->first();

        if($connexion !=null){
         //session_start();
            Session::put('id',$connexion->idUser);
            Session::put('identifiantUser',$connexion->identifiantUser);
            Session::put('motDePasseUser',$connexion->motDePasseUser);
            return redirect(route('index'));
            
        }else{
         return back()->with('error','Erreur de connexion');
        }
    }

    public function deconnexion(){
        Session::forget([
            'idUser',
            'identifiantUser',
            'motDePasseUser'
             ]);
        return redirect(route('authentification'));
    }
}

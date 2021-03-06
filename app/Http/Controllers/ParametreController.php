<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('parametres/index', compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('parametres/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $typeOperation = $request->get('typeOperation');
       $description = $request->get('description');
       //Vérification if type existe yet.
       $verification = Type::where("typeOperation",$typeOperation)->first();
       if($verification ==NULL){
        $addType = new Type([
          'typeOperation' =>$typeOperation ,        
          'description' => $description,                
       ]);       
       $addType->save();
       
       return back()->with('success', 'Type d\'operation a été bien enregistré!');
       }else{
       return back()->with('warning', 'Cet type d\'operation existe dejà dans la base, veuillez saisir un autre.');
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('parametres/edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $idType)
    {
        $typeOperation = $request->get('typeOperation');
        $description = $request->get('description');
        $updateType = array(
          'typeOperation' =>$typeOperation,        
          'description' => $description,
            );
        $update = Type::where('id',$idType)->update($updateType);
        if($update){
          return redirect(route('params.index'))->with('success','Type d\'operation a été bien modifié');
        }else{
          return back()->with('error','Erreur de modification');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($idType)
    {
        $type = Type::find($idType);
        if($type->delete()){
            return back()->with('success', 'Type d\'operation a été bien supprimé !');
        }else{
            return back()->with('error', 'Erreur de suppression !');
        }
    }
}

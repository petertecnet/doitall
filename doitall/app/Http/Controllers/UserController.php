<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $view = 'user';
    protected $route = 'users';
    public function index()
    {
        //
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
        
        $cad = User::find($id);
        
        //Verifica se existe o perfil
        if($cad){
        //Autoriza Role 9 - Administrador, a ver qualquer perfil
        If(Auth::user()->role == 9)
        { return view($this->view.'.show', compact('cad'));}

        //Autoriza Role 8 - Gerente da empresa, a ver o perfil se o user for da sua empresa.
        If((Auth::user()->role == 8) && Auth::user()->company_id == $cad->company_id)
            { return view($this->view.'.show', compact('cad'));}
        }  
        //Força a pagina do perfil do usuario logado caso não tenha autorização pra ver outro perfil.    
        $id = Auth::user()->id;
        $cad = User::find($id);        
        return view($this->view.'.show', compact('cad'));   
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

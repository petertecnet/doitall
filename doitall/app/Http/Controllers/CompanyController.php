<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    protected $view = 'company';
    protected $route = 'companies';

    public function index()
    {
       
        $role = Auth::user()->role;
        $id = Auth::user()->company_id;
        if($role==9)
        {
            $cads = Company::all();
            return view($this->view.'.index', compact('cads'));
        }
       else
        {
            $cads = Company::findOrFail($id);
            return view($this->view.'.show', compact('cads'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view($this->view.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad = Company::create($request->all());
        $user_id = $request->user_id;
        $user = User::findOrFail($user_id);
        $user->company_id = $cad->id;
        $user->role = 8;
        $user->save();
        $id = $cad->id;
        return view($this->view.'.update', compact('cad'))->with('success', "Cadastrado efetivado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $cad = Company::find($id);
        if($cad){
            
        return view($this->view.'.show', compact('cad'));  
        }   
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cad = Company::find($id);
        if(!$cad):
            return redirect()->back();
        endif;
        //Verifica se é gerente e se a empresa é deste gerente
        if($cad->id == Auth::user()->company_id && Auth::user()->role == 8)
        { return view($this->view.'.update', compact('cad')); }  
        //Verifica se é administrador
        if(Auth::user()->role == 9)
        { return view($this->view.'.update', compact('cad')); }   
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cad = Company::find($id);
        if(!$cad):
            return redirect()->back();
        endif;

        $cad->update($request->all());
        $id= $cad->id;
        return view($this->view.'.update', compact('cad'))->with('success', "Cadastrado efetivado com sucesso!");
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }


}
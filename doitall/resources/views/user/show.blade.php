@extends('layouts.single')
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dados</div>

                <div class="card-body">
               Nome: {{$cad->name}} <br>
               Empresa: {{$cad->_Company()}}<br>
               Email: {{$cad->email}}<br>
               Perfil: {{$cad->_role()}}<br>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
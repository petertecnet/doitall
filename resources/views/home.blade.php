@extends('layouts.single')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                  Olá {{ Auth::user()->name }}. Seja bem vindo ao seu painel administrativo
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Compras</div>

                <div class="card-body">
                Você ainda não possuiu nenhuma compra
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cupons</div>

                <div class="card-body">
                Você ainda não recebeu nenhum cupom.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

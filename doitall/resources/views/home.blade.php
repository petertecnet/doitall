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
@endsection

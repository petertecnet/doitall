@extends('layouts.layout')
@section('pageTitle', 'Banco de sangue - '.$bloodBank->name)
@section('body')
<div class="card">
    <div class="card-header">
      {{$bloodBank->id}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <p class="card-text">Tipo:</p>
            </div>
            <div class="col">                
                <h5 class="card-title">{{$bloodBank->type}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <p class="card-text">Compatibilidade:</p>
            </div>
            <div class="col">                
                <h5 class="card-title">{{ $bloodBank->compatibility }}</h5>
            </div>
        </div> 
      <br>
      <a href="{{route('banco-de-sangue.index')}}" class="btn btn-secondary">Voltar</a>
    </div>
  </div>
@endsection
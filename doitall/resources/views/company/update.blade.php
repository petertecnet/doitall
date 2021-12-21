@extends('layouts.layout')
@section('pageTitle', 'Banco de sangue')
@section('body')

<form method="POST" action="{{ route('banco-de-sangue.update', $bloodBank->id )}}">
    @csrf
    @method('PUT')
    @include('bloodbank.form')
    <button type="submit" class="btn btn-primary">Atualizar Banco de sangue</button>
</form>

<br>
<a href="{{route('banco-de-sangue.index')}}" class="btn btn-secondary">Voltar</a>
@endsection
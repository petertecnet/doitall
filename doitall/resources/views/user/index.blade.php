@extends('layouts.single')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
 
        <td>{{ $cad->id }} </td>
              <td>{{ $cad->name }}</td>
              <td>{{ $cad->_company }} </td>
        </div>
    </div>
</div>
@endsection
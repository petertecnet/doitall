@extends('layouts.single')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
  <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">User_id</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $cads->id }} </td>
              <td>{{ $cads->name }}</td>
              <td>{{ $cads->user_id }} </td>
            </tr>
          </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
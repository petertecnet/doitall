@extends('layouts.single')
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Empresas</div>

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
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
              @foreach($cads as $company)
            <tr>
              <td>{{ $company->id }} </td>
              <td>{{ $company->name }}</td>
              <td>{{ $company->user_id }} </td>
            </tr>
              @endforeach
          </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center">
        {{!! $cads->links() !!}}
        </div>
        </div>
    </div>
</div>
@endsection
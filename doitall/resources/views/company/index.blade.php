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
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
              @foreach($companies as $company)
            <tr>
              <td>{{ $company->id }} </td>
              <td>{{ $company->type }}</td>
              <td>{{ $company->compatibility }} </td>
              <td>
                <a href="{{route("banco-de-sangue.show", $company->id ) }}"><button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                <a href="{{route('banco-de-sangue.edit', $company->id ) }}"><button type="button" class="btn btn-primary"><i class="far fa-edit"></i></button></a>
                <form action="{{ route('banco-de-sangue.destroy', $company->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                 </form>
              </td>
            </tr>
              @endforeach
          </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center">
          {{ $companies->links() }}
        </div>
        </div>
    </div>
</div>
@endsection
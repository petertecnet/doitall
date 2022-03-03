
@extends('layouts.single')
@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dados</div>

                <div class="card-body">
                     <form action="{{ route('companies.store') }}" method="post">
        @method('POST')
                @include('company.form')
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.single')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dados</div>
                    @include('layouts.alerts')
                    <div class="card-body">
                        <form action="{{ route('companies.update', $cad->id)}}" method="post">
                            @method('PUT')
                            @include('company.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

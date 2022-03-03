@extends('layouts.adminlte')
@php
    $showTag = isset($showTag) ? $showTag : true;
@endphp


@section('content')

    <div class="col-sm-12 text-center">

        <div class="container text-left" style="max-width: {{ isset($maxwidth) ? $maxwidth: '980' }}px">

            <form id=frmcad name=frmcad class="form-horizontal input-form " method="post" enctype="multipart/form-data"
                  @if (isset($routeSave))
                    action="{{route($routeSave)}}">
                  @else
                    action="{{route($route.'.store')}}">
                  @endif
                {{ csrf_field() }}
                <input type="hidden" id="id" name="id" value="{{$cad->id}}">

                @if (isset($redirect))
                    <input type="hidden" name="redirect" value="{{$redirect}}"/>
                @endif


                    <div class="card-body">
                        @yield('form')
                    </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary ">Salvar <i class="icon-floppy-disk position-right"></i></button>
                </div>
            </form>

        </div>
    </div>
@endsection

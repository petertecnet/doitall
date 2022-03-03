@extends('layouts.app')
@section('nav_title')
    @if (isset($route))
        <form class="form-horizontal mr-5" role="form" action="{{$route ? route($route.'.search') : ''}}" method="post">
            {{ csrf_field() }}
            @if (isset($status))
                <input type="hidden" name="status" id="status" value="{{$status}}">
            @endif
            <div class="form-group m-0">
                <div class="input-group">
                    @if (isset($filter))
                    <select class="custom-select" style="width: auto;" name="filter" id="filter">
                        @foreach($filter as $key => $value)
                            <option value="{{$key}}" @if (isset($filtersel))  @if ($filtersel==$key) selected @endif  @endif>{{$value}}</option>
                        @endforeach
                    </select>
                    @endif
                    <input type="text" class="form-control" id="busca" name="busca"
                           placeholder="@if (!isset($filter)) Localizar... @endif"
                           @if (isset($busca)) value="{{$busca}}" @endif >
                    <span class="input-group-btn"><button type="submit" class="btn btn-info"><i class="fa fa-search"></i> </button></span>
                </div>
            </div>
        </form>

        <div class="button-group">
            @yield('actions')

            @if (isset($route_print))
                <a href="{{$route_print}}" class="btn btn-info heading-btn"><i class="mdi mdi-printer"></i> Imprimir</a>
            @endif
            @if (isset($btnNew))
                <a href="{{route($route.'.create')}}" class="btn btn-success heading-btn">
                    @if ($btnNew) {!! $btnNew !!} @else <i class="fa fa-plus"></i> Novo  @endif
                </a>
            @endif
        </div>
    @endif
@endsection


@section('content')

    @yield('header')

    @if($errors->any())
        <center>
            <div class="container text-left"  style="max-width:500px">
                <div class="alert alert-warning text-left">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Atenção</h3>
                    <ul >
                        @foreach( $errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </center>
    @endif

    {{ csrf_field() }}

    @if(isset($list))
        @if ($list->count()>0)
            <center>

                <div class="card text-left" style="@if(isset($maxW)) max-width:{{$maxW}}px @endif">
                    <div class="card-header text-left" id="listHeader">
                        Lista de <span id="rec_qtd">@if (isset($list)) {{$list->count()}} @endif</span> registros
                        @if (isset($busca))
                            <span class="text-primary"> - Pesquisando por: {{$busca}}</span>
                        @endif
                        @yield('card-header')
                    </div>
                    @yield('table_title')
                    <div class="card-body p-l-10 p-r-10 p-t-0 p-b-0">
                        <div class="table-responsive">
                            {{--https://datatables.net/manual/options--}}
                            <table id="tableList" class="display table table-hover" cellspacing="0" data-order='[[ {{ isset($order) ? $order : '0, "desc"' }} ]]'>
                                <thead>
                                <tr>
                                    @yield('th')
                                </tr>
                                </thead>

                                <tbody>
                                    @yield('tbody')
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer no-padding" id="listPaginate">
                        @if (isset($list))
                            @if($list instanceof \Illuminate\Pagination\LengthAwarePaginator )
                                <div class="pull-right m-t-10 m-r-15">
                                    {!! $list->render() !!}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

            </center>

        @else
            <div class="alert alert-info" style="max-width: 500px">
                Nenhum cadastro encontrado @if (isset($busca)) com <i>{{$busca}}</i> @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
        @endif
    @endif


    @yield('home')



    {{-- VIEW MODAL --}}
    <div id="modalShow" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Visualizar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left" id="cadShow">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script_footer')
    @yield('script2')
    <!-- This is data table -->
    <script src="{{asset('my/js/table_list.js?d='.cacheFiles())}}" type="text/javascript"></script>

    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>
    <script src="{{asset('my/js/table_db.js?d='.cacheFiles())}}" type="text/javascript"></script>
@endsection




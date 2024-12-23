@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h4>Lista de beneficiarios</h4>
@stop

@section('content')
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success" role="success">
            {{session('success')}}
        </div>
        @endif
        @if (session('message'))
        <div class="alert alert-danger" role="message">
            {{session('message')}}
        </div>
        @endif
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <div class="col-md-2">
                    <a href="{{route('add.benef')}}" type="button" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Nuevo</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>sexo</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Representante</th>
                            <th>Coordinador</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($collection))
                            @foreach ($collection as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->ap_paterno }}</td>
                                    <td>{{ $value->ap_materno }}</td>
                                    <td>{{ $value->sexo }}</td>
                                    <td>{{ $value->telefono}}</td>
                                    <td>{{ $value->direccion }}</td>
                                    <td>{{ $value->representante->name }} {{ $value->representante->ap_paterno }} {{ $value->representante->ap_materno }}</td>
                                    <td>{{ $value->coordinador->name }} {{ $value->coordinador->ap_paterno }} {{ $value->coordinador->ap_materno }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a  href="{{route('ver.benef', $value->id)}}"  class="btn-sm btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></a>
                                            <a  href="{{route('edit.benef', $value->id)}}"  class="btn-sm btn-rounded btn-warning mb-3" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('destroy.benef', $value->id) }}" class="btn-sm btn-rounded btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No se encontrarón registros</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
            <div class="d-flex justify-content-end">
                {{-- {!! $collection->links() !!} --}}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');
    $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);

});
    </script>
@stop




@extends('adminlte::page')

@section('title', 'Coordinador')
@section('content_header')
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-size: 25px">{{ __('Datos del Coordinador') }}</div>

                    <div class="card-body">
                        <form method="POST" id="admin" name="admin" action="">
                            @csrf

                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">{{ __('Nombre') }}</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $coordi->name }}" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ap_paterno">{{ __('Apellido Paterno') }}</label>
                                    <input id="ap_paterno" type="text" class="form-control" name="ap_paterno"
                                        value="{{ $coordi->ap_paterno }}" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ap_matermo">{{ __('Apellido Materno') }}</label>
                                    <input id="ap_materno" type="text" class="form-control" name="ap_materno"
                                        value="{{ $coordi->ap_materno }}" disabled>
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefono">{{ __('Teléfono') }}</label>
                                    <input id="telefono" type="text" class="form-control" name="telefono"
                                        value="{{ $coordi->telefono }}" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">{{ __('Correo') }}</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ $coordi->correo }}" disabled>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                            <a href="{{ route('lista.coordi') }}" class="btn btn-danger">
                                {{ __('OK') }}
                            </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="card" style="padding: 3px">
            <h3 class="row justify-content-center">Listado de Representantes de {{ $coordi->name }} {{ $coordi->ap_paterno }}</h3>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Coordinador</th>
                            <th>Correo</th>
                            {{-- <th>Opciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($collection))
                            @foreach ($collection as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->ap_paterno }}</td>
                                    <td>{{ $value->ap_materno }}</td>
                                    <td>{{ $value->telefono}}</td>
                                    <td>{{ $value->direccion }}</td>
                                    <td>{{ $value->coordinador->name }} {{ $value->coordinador->ap_paterno }} {{ $value->coordinador->ap_materno }}</td>
                                    <td>{{ $value->correo }}</td>
                                    {{-- <td>
                                        <div class="btn-group">
                                            <a  href="{{route('ver.repre', $value->id)}}"  class="btn-sm btn-rounded btn-primary mb-3" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fas fa-eye"></i></a>
                                            <a  href="{{route('edit.repre', $value->id)}}"  class="btn-sm btn-rounded btn-warning mb-3" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('destroy.repre', $value->id) }}" class="btn-sm btn-rounded btn-danger mb-3" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></a>

                                        </div>
                                    </td> --}}
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

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

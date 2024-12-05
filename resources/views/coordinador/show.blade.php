@extends('adminlte::page')

@section('title', 'Coordinador')
@section('content_header')
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Datos del Coordinador') }}</div>

                    <div class="card-body">
                        <form method="POST" id="admin" name="admin" action="">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $coordi->name }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ap_paterno"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                                <div class="col-md-6">
                                    <input id="ap_paterno" type="text" class="form-control" name="ap_paterno"
                                        value="{{ $coordi->ap_paterno }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ap_matermo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                                <div class="col-md-6">
                                    <input id="ap_materno" type="text" class="form-control" name="ap_materno"
                                        value="{{ $coordi->ap_materno }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono"
                                        value="{{ $coordi->telefono }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ $coordi->correo }}" disabled>
                                </div>
                            </div>

                            <a href="{{ route('lista.coordi') }}" class="btn btn-danger">
                                {{ __('OK') }}
                            </a>
                    </div>
                </div>
                </form>
            </div>
        </div>
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

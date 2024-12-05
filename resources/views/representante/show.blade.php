@extends('adminlte::page')

@section('title', 'ver')
@section('content_header')
    <h1>Informacion de la Representante</h1>
    @if (session('message'))
        <div class="alert alert-danger" role="message">
            {{ session('message') }}
        </div>
    @endif
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informacion') }}</div>

                    <div class="card-body">
                        <form method="POST" id="admin" name="admin" action="">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{ __('Nombre') }}</label>
                                    <input id="name" type="text" class="form-control "
                                        name="name"value="{{ $repre->name }}" disabled>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="ap_paterno">{{ __('Apellido Paterno') }}</label>
                                    <input id="ap_paterno" type="text" class="form-control" name="ap_paterno"
                                        value="{{ $repre->ap_paterno }}" disabled>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="ap_matermo">{{ __('Apellido Materno') }}</label>
                                    <input id="ap_materno" type="text"
                                        class="form-control @error('ap_materno') is-invalid @enderror" name="ap_materno"
                                        value="{{ $repre->ap_paterno }}" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sexo">{{ __('Sexo') }}</label>
                                    <input id="sexo" type="text" class="form-control" name="sexo"
                                        value="{{ $repre->sexo }}" disabled>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="telefono">{{ __('Teléfono') }}</label>
                                    <input id="telefono" type="text" class="form-control" name="telefono"
                                        value="{{ $repre->telefono }}" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="direccion">{{ __('Dirección') }}</label>
                                    <input id="direccion" type="text" class="form-control " name="direccion"
                                        value="{{ $repre->direccion }}" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="coordi">{{ __('Coordinador') }}</label>
                                    <input id="coordi" type="text" class="form-control " name="coordi"
                                        value="{{ $repre->coordinador->name }} {{ $repre->coordinador->ap_paterno }} {{ $repre->coordinador->ap_materno }}"
                                        disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('Correo') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $repre->correo }}" disabled>
                                </div>
                            </div>



                            <div class="form-group col-md-12" style="display: flex; justify-content: center; align-items: center;">
                                <a href="{{ route('lista.repre') }}" class="btn btn-danger">
                                    {{ __('Ok') }}
                                </a>
                            </div>

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
    <script></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

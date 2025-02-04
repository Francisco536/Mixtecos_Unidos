@extends('adminlte::page')

@section('title', 'Detalle')
@section('content_header')
    <h1>Informacion del Beneficiario</h1>
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
                    <div class="card-header">{{ __('Detalle') }}</div>

                    <div class="card-body">
                        <form method="POST" id="benef" name="benef" >
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="name">{{ __('Nombre') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $benef->name }}" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ap_paterno">{{ __('Apellido Paterno') }}</label>
                                    <input id="ap_paterno" type="text"
                                        class="form-control @error('ap_paterno') is-invalid @enderror" name="ap_paterno"
                                        value="{{ $benef->ap_paterno }}" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="ap_matermo">{{ __('Apellido Materno') }}</label>
                                    <input id="ap_materno" type="text"
                                        class="form-control @error('ap_materno') is-invalid @enderror" name="ap_materno"
                                        value="{{ $benef->ap_materno }}" disabled>
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                <label for="sexo">{{ __('Sexo') }}</label>
                                <input id="sexo" type="text" class="form-control" name="sexo"
                                value="{{ $benef->sexo }}" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="fech_nac">{{ __('Fecha de Nacimiento') }}</label>
                                    <input id="fech_nac" type="date" class="form-control" name="fech_nac"
                                        value="{{ $benef->fech_nac }}" disabled>

                            </div>

                            <div class="form-group col-md-3">
                                <label for="est_civil">{{ __('Estado Civil') }}</label>
                                    <input id="est_civil" name="est_civil"
                                    value="{{ $benef->est_civil}}" class="form-control" style="width: 100%;"
                                    disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="escolaridad">{{ __('Escolaridad') }}</label>
                                <input id="escolaridad" name="escolaridad"
                                value="{{ $benef->escolaridad }}"class="form-control" style="width: 100%;"
                                disabled>
                            </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="ine">{{ __('Seccion Electoral') }}</label>
                                        <input id="ine" type="text" class="form-control" name="ine"
                                            value="{{ $benef->ine }}" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ing_mensual">{{ __('Ingreso Mensual') }}</label>
                                    <input id="ing_mensual" name="ing_mensual"
                                    value="{{ $benef->ing_mensual }}"class="form-control" style="width: 100%;"
                                    disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="espa">{{ __('Habla Español') }}</label>
                                    <input id="espa" name="espa"
                                        value="{{ $benef->espa }}"class="form-control" style="width: 100%;"
                                        disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="lengua">{{ __('Lengua') }}</label>
                                    <input id="lengua" name="lengua"
                                        value="{{ $benef->lengua }}"class="form-control" style="width: 100%;"
                                        disabled>
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="at_medica">{{ __('Atención Medica') }}</label>
                                        <input id="at_medica" name="lengua"
                                            value="{{ $benef->at_medica }}"class="form-control" style="width: 100%;"
                                            disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="discapacidad">{{ __('Capacidades Diferentes') }}</label>
                                        <input id="discapacidad" name="lengua"
                                            value="{{ $benef->discapacidad }}"class="form-control" style="width: 100%;"
                                            disabled>
                                </div>
                                <div class="form-group col-md-4">
                                        <label for="dep_economicos">{{ __('Num. Dependientes Económicos') }}</label>
                                            <input id="dep_economicos" type="text" class="form-control" name="dep_economicos"
                                                value="{{ $benef->dep_economicos }}" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="prog_social">{{ __('Cuenta con un Programa Social')}}</label>
                                    <input id="prog_social" name="lengua"
                                            value="{{ $benef->prog_social }}"class="form-control" style="width: 100%;"
                                            disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ocupacion">{{ __('Ocupación') }}</label>
                                        <input id="ocupacion" type="text"
                                            class="form-control" name="ocupacion"
                                            value="{{ $benef->ocupacion }}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="localidad">{{ __('Localidad') }}</label>
                                        <input id="localidad" type="text"
                                            class="form-control" name="localidad"
                                            value="{{ $benef->localidad }}" disabled>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="telefono">{{ __('Teléfono') }}</label>
                                        <input id="telefono" type="text" class="form-control" name="telefono"
                                            value="{{ $benef->telefono }}" disabled>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="repre">{{ __('Representante') }}</label>
                                        <input id="repre" name="repre"
                                            value="{{ $benef->representante->name }} {{ $benef->representante->ap_paterno }} {{ $benef->representante->ap_materno }}"class="form-control" style="width: 100%;"
                                            disabled>
                                </div>

                                <div class="form-group col-md-4">
                                <label for="coordi">{{ __('Coordinador') }}</label>
                                    <input id="coordi" name="coordi"
                                        value="{{ $benef->coordinador->name }} {{ $benef->coordinador->ap_paterno }} {{ $benef->coordinador->ap_materno }}"class="form-control" style="width: 100%;"
                                        disabled>
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="email">{{ __('Correo') }}</label>
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        value="{{ $benef->correo }}" disabled>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="direccion">{{ __('Dirección') }}</label>
                                    <input id="direccion" type="text"
                                        class="form-control" name="direccion"
                                        value="{{ $benef->direccion }}" disabled>
                            </div>
                        </div>


                            <div class="row mb-0" style="text-align: center">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('lista.benef') }}" class="btn btn-danger">
                                        {{ __('Cancelar') }}
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

    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

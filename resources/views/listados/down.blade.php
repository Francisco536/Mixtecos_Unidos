@extends('adminlte::page')

@section('title', 'Generar Excel')
@section('content_header')
    <h1>Generar listado en excel</h1>
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
                    <div class="card-header">{{ __('Generar') }}</div>

                    <div class="card-body">

                            <div class="form-group col-md-4">
                                <div class="row mb-12">
                                    <label for="coordi"
                                        class="col-md-8 col-form-label text-md-end">{{ __('Coordinador') }}</label>

                                    <div class="col-md-12">
                                        <select id="coordi" name="coordi"
                                            value="{{ old('coordi') }}"class="form-control select2" style="width: 100%;"
                                            required>
                                            @foreach ($coordinador as $coordinador)
                                                <option value="{{ $coordinador->id }}">{{ $coordinador->name }} {{ $coordinador->ap_paterno }} {{ $coordinador->ap_materno }}</option>
                                            @endforeach
                                        </select>
                                        @error('coordi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="repre"
                                        class="col-md-12 col-form-label text-md-end">{{ __('Representante') }}</label>
                                    <select id="repre" class="form-control select2">
                                        <option value="">Seleccione un Representante</option>
                                    </select>
                                </div>

                            </div>


                            <button id="descargarExcel" class="btn btn-success">Exportar Beneficiarios</button>

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
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").fadeOut(1500);
            }, 3000);

        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#coordi').on('change', function () {
                var coordi = $(this).val();

                // Limpiar el select de representantes
                $('#repre').html('<option value="">Seleccione un Representante</option>');

                if (coordi) {
                    $.ajax({
                        url: '/get-representantes/' + coordi,
                        type: 'GET',
                        success: function (data) {
                            $.each(data, function (key, representante) {
                                $('#repre').append('<option value="' + representante.id + '">' + representante.name + ' ' + representante.ap_paterno + ' ' + representante.ap_paterno + '</option>');
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('Error en AJAX:', error);
                        }
                    });
                }
            });

            // Descargar Excel al hacer clic en el botón
            $('#descargarExcel').on('click', function (e) {
                e.preventDefault(); // Evita recargar la página

                var repre = $('#repre').val();

                if (repre) {
                    window.location.href = '/exportar-beneficiarios?repre=' + repre;
                } else {
                    alert('Seleccione un representante.');
                }
            });
    });
    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

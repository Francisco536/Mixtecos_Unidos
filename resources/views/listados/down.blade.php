@extends('adminlte::page')

@section('title', 'Generar Excel')
@section('content_header')
    <h1>General listado en excel</h1>
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
                    <div class="card-header">{{ __('Registrar') }}</div>

                    <div class="card-body">
                        <form action="{{  url('/exportar-beneficiarios') }}" method="GET">
                            <div class="form-group col-md-4">
                                <label for="repre">{{ __('Representante') }}</label>
                                    <select id="repre" name="repre"
                                        value="{{ old('repre') }}"class="form-control select2" style="width: 100%;"
                                        required>
                                        @foreach ($representantes as $representante)
                                            <option value="{{ $representante->id }}">{{ $representante->name }} {{ $representante->ap_paterno }} {{ $representante->ap_materno }}</option>
                                        @endforeach
                                    </select>
                                    @error('repre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Exportar Beneficiarios</button>
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
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").fadeOut(1500);
            }, 3000);

        });
    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

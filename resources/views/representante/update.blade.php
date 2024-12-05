@extends('adminlte::page')

@section('title', 'Editar')
@section('content_header')
    <h1>Agregar Representante</h1>
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
                        <form method="POST" id="admin" name="admin" action="{{ route('update.repre', $repre->id) }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $repre->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ap_paterno"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                                <div class="col-md-6">
                                    <input id="ap_paterno" type="text"
                                        class="form-control @error('ap_paterno') is-invalid @enderror" name="ap_paterno"
                                        value="{{ $repre->ap_paterno }}" required autocomplete="ap_paterno" autofocus>

                                    @error('ap_paterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ap_matermo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                                <div class="col-md-6">
                                    <input id="ap_materno" type="text"
                                        class="form-control @error('ap_materno') is-invalid @enderror" name="ap_materno"
                                        value="{{ $repre->ap_paterno }}" required autocomplete="ap_materno" autofocus>

                                    @error('ap_materno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sexo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>

                                <div class="col-md-6">
                                    <select name="sexo" id="sexo" class="form-control select2" style="width: 100%;"
                                    required>
                                        <option value="Mujer" @selected(old('sexo', $repre->sexo) == 'Mujer')>Mujer</option>
                                        <option value="Hombre" @selected(old('sexo', $repre->sexo) == 'Hombre')>Hombre</option>
                                    </select>
                                    @error('sexo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono"
                                        value="{{ $repre->telefono }}" required autocomplete="telefono">
                                    <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                        Ingresa solo números</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="direccion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ $repre->direccion }}" required autocomplete="direccion" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="coordi"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Coordinador') }}</label>

                                <div class="col-md-6">
                                    <select id="coordi" name="coordi"
                                        value=" "class="form-control select2"
                                        style="width: 100%;" required>
                                        @foreach ($coordi as $coordinador)
                                            <option value="{{ $coordinador->id }}" @selected(old('id_coordinador', $repre->id_coordinador) == $coordinador->id)>{{ $coordinador->name }}
                                                {{ $coordinador->ap_paterno }} {{ $coordinador->ap_materno }}</option>
                                        @endforeach
                                    </select>
                                    @error('coordi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $repre->correo }}" required autocomplete="email">
                                    <div id="alert4" class="alert alert-danger" style="display:none" role="alert">
                                        Ingresa un correo valido</div>
                                </div>
                            </div>


                            <div class="row mb-0" style="text-align: center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Actualizar') }}
                                    </button>

                                    <a href="{{ route('lista.repre') }}" class="btn btn-danger">
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
        console.log('Hi!');
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").fadeOut(1500);
            }, 3000);

        });


        //primeras letras mayusculas
        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }
        const input = document.getElementById('name');
        input.addEventListener('keypress', e => {
            setTimeout(() => {
                input.value = input.value.split(' ').map(x => capitalize(x)).join(' ')
            }, 1)
        });
        const input2 = document.getElementById('ap_paterno');
        input2.addEventListener('keypress', e => {
            setTimeout(() => {
                input2.value = capitalize(input2.value)
            }, 1)
        });
        const input3 = document.getElementById('ap_materno');
        input3.addEventListener('keypress', e => {
            setTimeout(() => {
                input3.value = capitalize(input3.value)
            }, 1)
        });


        adminLog.addEventListener("submit", (e) => {
            var exp = /[a-zA-Z0-9._-]+\@(gmail|outlook|hotmail)\.(com|es)$/;
            var correo = document.getElementById("email").value;
            var valido = exp.test(correo);
            if (valido === false) {
                e.preventDefault();
                let x = document.getElementById("alert4");
                x.style.display = "block";
                setTimeout(function() {
                    $("#alert4").fadeOut(1000);
                }, 1000);
            }

        });

        //numero de telefono
        telefono = document.getElementById("telefono");
        telefono.addEventListener('keypress', function(e) {
            if (!soloNumeros(event)) {
                e.preventDefault();
                let x = document.getElementById("alert0");
                x.style.display = "block";
                setTimeout(function() {
                    $("#alert0").fadeOut(1000);
                }, 1000);
            }
        });

        function soloNumeros(e) {
            var key = e.charCode;
            console.log(key);
            return key >= 48 && key <= 57;
        }
    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop

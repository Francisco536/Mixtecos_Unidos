@extends('adminlte::page')

@section('title', 'Nuevo')
@section('content_header')
    <h1>Agregar Beneficiario</h1>
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
                        <form method="POST" id="admin" name="admin" action="{{ route('store.benef') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="name">{{ __('Nombre') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="form-group col-md-4">
                                <label for="ap_paterno">{{ __('Apellido Paterno') }}</label>
                                    <input id="ap_paterno" type="text"
                                        class="form-control @error('ap_paterno') is-invalid @enderror" name="ap_paterno"
                                        value="{{ old('ap_paterno') }}" required autocomplete="ap_paterno" autofocus>

                                    @error('ap_paterno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="form-group col-md-4">
                                <label for="ap_matermo">{{ __('Apellido Materno') }}</label>

                                    <input id="ap_materno" type="text"
                                        class="form-control @error('ap_materno') is-invalid @enderror" name="ap_materno"
                                        value="{{ old('ap_materno') }}" required autocomplete="ap_materno" autofocus>

                                    @error('ap_materno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                <label for="sexo">{{ __('Sexo') }}</label>
                                    <select id="sexo" name="sexo"
                                        value="{{ old('sexo') }}"class="form-control select2" style="width: 100%;"
                                        required>
                                        <option selected="selected" value="Mujer">Mujer</option>
                                        <option value="Hombre">Hombre</option>
                                    </select>
                                    @error('sexo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="form-group col-md-3">
                                <label for="fech_nac">{{ __('Fecha de Nacimiento') }}</label>
                                    <input id="fech_nac" type="date" class="form-control" name="fech_nac"
                                        value="{{ old('fech_nac') }}" required autocomplete="fech_nac">
                                    <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                        Ingresa solo números</div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="est_civil">{{ __('Estado Civil') }}</label>
                                    <select id="est_civil" name="est_civil"
                                    value="{{ old('est_civil') }}"class="form-control select2" style="width: 100%;"
                                    required>
                                    <option selected="selected" value="Soltero(a)">Soltero(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Viudo(a)">Viudo(a)</option>
                                    <option value= "Union Libre">Union Libre</option>
                                </select>

                                    @error('est_civil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label for="escolaridad">{{ __('Escolaridad') }}</label>
                                <select id="escolaridad" name="escolaridad"
                                value="{{ old('escolaridad') }}"class="form-control select2" style="width: 100%;"
                                required>
                                <option selected="selected" value="Primaria Terminada">Primaria Terminada</option>
                                <option selected="selected" value="Primaria Incompleta">Primaria Incompleta</option>
                                <option value="Secundaria Terminada">Secundaria Terminada</option>
                                <option value="Secundaria Incompleta">Secundaria Incompleta</option>
                                <option value="Bachillerato">Bachillerato</option>
                                <option value= "Licenciatura">Licenciatura</option>
                            </select>

                                    @error('escolaridad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="ine">{{ __('Seccion Electoral') }}</label>
                                        <input id="ine" type="text" class="form-control" name="ine"
                                            value="{{ old('ine') }}" required autocomplete="ine">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ing_mensual">{{ __('Ingreso Mensual') }}</label>
                                    <select id="ing_mensual" name="ing_mensual"
                                    value="{{ old('ing_mensual') }}"class="form-control select2" style="width: 100%;"
                                    required>
                                    <option selected="selected" value="1 Salario Min">1 Salario Min</option>
                                    <option value="2 Salarios Min">2 Salarios Min</option>
                                    <option value="3 Salarios Min">3 Salarios Min</option>
                                    <option value= "Mas">Mas...</option>
                                </select>
                                    @error('ing_mensual')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="espa">{{ __('Habla Español') }}</label>
                                    <select id="espa" name="espa"
                                        value="{{ old('espa') }}"class="form-control select2" style="width: 100%;"
                                        required>
                                        <option selected="selected" value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                    @error('espa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="lengua">{{ __('Lengua') }}</label>
                                    <select id="lengua" name="lengua"
                                        value="{{ old('lengua') }}"class="form-control select2" style="width: 100%;"
                                        required>
                                        <option selected="selected" value="Mixteco">Mixteco</option>
                                        <option value="Triqui">Triqui</option>
                                        <option value="Zapoteco">Zapoteco</option>
                                        <option value="Ninguna">Ninguna</option>
                                    </select>
                                    @error('lengua')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="at_medica">{{ __('Atención Medica') }}</label>
                                        <select id="at_medica" name="at_medica"
                                            value="{{ old('at_medica') }}"class="form-control select2" style="width: 100%;"
                                            required>
                                            <option selected="selected" value="IMMS">IMMS</option>
                                            <option value="ISSSTE">ISSSTE</option>
                                            <option value="Particular">Particular</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        @error('at_medica')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="discapacidad">{{ __('Capacidades Diferentes') }}</label>
                                        <select id="discapacidad" name="discapacidad"
                                            value="{{ old('discapacidad') }}"class="form-control select2" style="width: 100%;"
                                            required>
                                            <option selected="selected" value="Auditiva">Auditiva</option>
                                            <option value="Visual">Visual</option>
                                            <option value="Motriz">Motriz</option>
                                            <option value="Lenguaje">Lenguaje</option>
                                            <option value="Ninguna">Ninguna</option>
                                        </select>
                                        @error('discapacidad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                        <label for="dep_economicos">{{ __('Num. Dependientes Económicos') }}</label>
                                            <input id="dep_economicos" type="text" class="form-control" name="dep_economicos"
                                                value="{{ old('dep_economicos') }}" required autocomplete="dep_economicos">
                                            {{-- <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                                Ingresa solo números</div> --}}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="prog_social">{{ __('Cuenta con un Programa Social')}}</label>
                                    <select id="prog_social" name="prog_social"
                                            value="{{ old('prog_social') }}"class="form-control select2" style="width: 100%;"
                                            required>
                                            <option selected="selected" value="Madres Solteras">Madres Solteras</option>
                                            <option value="65 y +">65 y +</option>
                                            <option value="Discapacidad">Discapacidad</option>
                                            <option value="Beca Benito Juarez">Beca Benito Juarez</option>
                                            <option value="Sembrando Vida">Sembrando Vida</option>
                                            <option value="Margarita Maza">Margarita Maza</option>
                                            <option value="Jovenes Construyendo el Futuro">Jovenes Construyendo el Futuro</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        @error('prog_social')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ocupacion">{{ __('Ocupación') }}</label>
                                        <input id="ocupacion" type="text"
                                            class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion"
                                            value="{{ old('ocupacion') }}" required autocomplete="ocupacion" autofocus>

                                        @error('ocupacion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="localidad">{{ __('Localidad') }}</label>
                                        <input id="localidad" type="text"
                                            class="form-control @error('localidad') is-invalid @enderror" name="localidad"
                                            value="{{ old('localidad') }}" required autocomplete="localidad" autofocus>

                                        @error('localidad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="telefono">{{ __('Teléfono') }}</label>
                                        <input id="telefono" type="text" class="form-control" name="telefono"
                                            value="{{ old('telefono') }}" required autocomplete="telefono">
                                        <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                            Ingresa solo números</div>
                                </div>

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

                                <div class="form-group col-md-4">
                                <label for="coordi">{{ __('Coordinador') }}</label>
                                    <select id="coordi" name="coordi"
                                        value="{{ old('coordi') }}"class="form-control select2" style="width: 100%;"
                                        required>
                                        @foreach ($coordinadores as $coordinador)
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

                            <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="email">{{ __('Correo') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    <div id="alert4" class="alert alert-danger" style="display:none" role="alert">
                                        Ingresa un correo valido</div>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="direccion">{{ __('Dirección') }}</label>
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>


                            <div class="row mb-0" style="text-align: center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Registrar') }}
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

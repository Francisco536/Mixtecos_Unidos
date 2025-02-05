@extends('adminlte::page')

@section('title', 'Editar')
@section('content_header')
    <h1>Editar información del Beneficiario</h1>
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
                    <div class="card-header">{{ __('Actualizar') }}</div>

                    <div class="card-body">
                        <form method="POST" id="admin" name="admin" action="{{ route('update.benef', $benef->id) }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="name">{{ __('Nombre') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $benef->name }}" required autocomplete="name" autofocus>

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
                                        value="{{ $benef->ap_paterno }}" required autocomplete="ap_paterno" autofocus>

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
                                        value="{{ $benef->ap_materno }}" required autocomplete="ap_materno" autofocus>

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
                                        class="form-control select2" style="width: 100%;"
                                        required>
                                        <<option value="Mujer" @selected(old('sexo', $benef->sexo) == 'Mujer')>Mujer</option>
                                        <option value="Hombre" @selected(old('sexo', $benef->sexo) == 'Hombre')>Hombre</option>
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
                                        value="{{ $benef->fech_nac }}" required autocomplete="fech_nac">
                                    <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                        Ingresa solo números</div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="est_civil">{{ __('Estado Civil') }}</label>
                                    <select id="est_civil" name="est_civil"
                                    class="form-control select2" style="width: 100%;"
                                    required>
                                    <option  value="Soltero(a)" @selected(old('est_civil', $benef->est_civil) == 'Soltero(a)')>Soltero(a)</option>
                                    <option value="Casado(a)" @selected(old('est_civil', $benef->est_civil) == 'Casado(a)')>Casado(a)</option>
                                    <option value="Viudo(a)" @selected(old('est_civil', $benef->est_civil) == 'Viudo(a)')>Viudo(a)</option>
                                    <option value= "Union Libre" @selected(old('est_civil', $benef->est_civil) == 'Union Libre')>Union Libre</option>
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
                               class="form-control select2" style="width: 100%;"
                                required>
                                <option value="Primaria Terminada" @selected(old('escolaridad', $benef->escolaridad) == 'Primaria Terminada' )>Primaria Terminada</option>
                                <option value="Primaria Incompleta" @selected(old('escolaridad', $benef->escolaridad) == 'Primaria Incompleta')>Primaria Incompleta</option>
                                <option value="Secundaria Terminada" @selected(old('escolaridad', $benef->escolaridad) == 'Secundaria Terminada')>Secundaria Terminada</option>
                                <option value="Secundaria Incompleta" @selected(old('escolaridad', $benef->escolaridad) == 'Secundaria Incompleta')>Secundaria Incompleta</option>
                                <option value="Bachillerato" @selected(old('escolaridad', $benef->escolaridad) == 'Bachillerato')>Bachillerato</option>
                                <option value= "Licenciatura" @selected(old('escolaridad', $benef->escolaridad) == 'Licenciatura')>Licenciatura</option>
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
                                            value="{{ $benef->ine }}" required autocomplete="ine">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ing_mensual">{{ __('Ingreso Mensual') }}</label>
                                    <select id="ing_mensual" name="ing_mensual"
                                    class="form-control select2" style="width: 100%;"
                                    required>
                                    <option value="1 Salario Min" @selected(old('ing_mensual', $benef->ing_mensual) == '1 Salario Min')>1 Salario Min</option>
                                    <option value="2 Salarios Min" @selected(old('ing_mensual', $benef->ing_mensual) == '2 Salarios Min')>2 Salarios Min</option>
                                    <option value="3 Salarios Min" @selected(old('ing_mensual', $benef->ing_mensual) == '3 Salarios Min')>3 Salarios Min</option>
                                    <option value= "Mas" @selected(old('ing_mensual', $benef->ing_mensual) == 'Mas')>Mas...</option>
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
                                        class="form-control select2" style="width: 100%;"
                                        required>
                                        <option value="Si" @selected(old('espa', $benef->espa) == 'Si')>Si</option>
                                        <option value="No" @selected(old('espa', $benef->espa) == 'No')>No</option>
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
                                        class="form-control select2" style="width: 100%;"
                                        required>
                                        <option value="Mixteco" @selected(old('lengua', $benef->lengua) == 'Mixteco')>Mixteco</option>
                                        <option value="Triqui" @selected(old('lengua', $benef->lengua) == 'Triqui')>Triqui</option>
                                        <option value="Zapoteco" @selected(old('lengua', $benef->lengua) == 'Zapoteco')>Zapoteco</option>
                                        <option value="Ninguna" @selected(old('lengua', $benef->lengua) == 'Ninguna')>Ninguna</option>
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
                                            class="form-control select2" style="width: 100%;"
                                            required>
                                            <option value="IMMS" @selected(old('at_medica', $benef->at_medica) == 'IMMS')>IMMS</option>
                                            <option value="ISSSTE" @selected(old('at-medica', $benef->at_medica) == 'ISSSTE')>ISSSTE</option>
                                            <option value="Particular" @selected(old('at-medica', $benef->at_medica) == 'Particular')>Particular</option>
                                            <option value="Otro" @selected(old('at-medica', $benef->at_medica) == 'Otro')>Otro</option>
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
                                            class="form-control select2" style="width: 100%;"
                                            required>
                                            <option value="Auditiva" @selected(old('discapacidad', $benef->discapacidad) == 'Auditiva')>Auditiva</option>
                                            <option value="Visual" @selected(old('discapacidad', $benef->discapacidad) == 'Visual')>Visual</option>
                                            <option value="Motriz" @selected(old('discapacidad', $benef->discapacidad) == 'Motriz')>Motriz</option>
                                            <option value="Lenguaje" @selected(old('discapacidad', $benef->discapacidad) == 'Lenguaje')>Lenguaje</option>
                                            <option value="Ninguna" @selected(old('discapacidad', $benef->discapacidad) == 'Ninguna')>Ninguna</option>
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
                                                value="{{ $benef->dep_economicos }}" required autocomplete="dep_economicos">
                                            {{-- <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                                Ingresa solo números</div> --}}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="prog_social">{{ __('Cuenta con un Programa Social')}}</label>
                                    <select id="prog_social" name="prog_social"
                                            class="form-control select2" style="width: 100%;"
                                            required>
                                            <option value="Madres Solteras" @selected(old('prog_social', $benef->prog_social) == 'Madres Solteras')>Madres Solteras</option>
                                            <option value="65 y +" @selected(old('prog_social', $benef->prog_social) == '65 y +')>65 y +</option>
                                            <option value="Discapacidad" @selected(old('prog_social', $benef->prog_social) == 'Discapacidad')>Discapacidad</option>
                                            <option value="Beca Benito Juarez" @selected(old('prog_social', $benef->prog_social) == 'Beca Benito Juarez')>Beca Benito Juarez</option>
                                            <option value="Sembrando Vida" @selected(old('prog_social', $benef->prog_social) == 'Sembrando Vida')>Sembrando Vida</option>
                                            <option value="Margarita Maza" @selected(old('prog_social', $benef->prog_social) == 'Margarita Maza')>Margarita Maza</option>
                                            <option value="Jovenes Construyendo el Futuro" @selected(old('prog_social', $benef->prog_social) == 'Jovenes Construyendo el Futuro')>Jovenes Construyendo el Futuro</option>
                                            <option value="Otro" @selected(old('prog_social', $benef->prog_social) == 'Otro')>Otro</option>
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
                                            value="{{ $benef->ocupacion }}" required autocomplete="ocupacion" autofocus>

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
                                            value="{{ $benef->localidad }}" required autocomplete="localidad" autofocus>

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
                                            value="{{ $benef->telefono }}" required autocomplete="telefono">
                                        <div id="alert0" class="alert alert-danger" style="display:none" role="alert">
                                            Ingresa solo números</div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="repre">{{ __('Representante') }}</label>
                                        <select id="repre" name="repre"
                                            class="form-control select2" style="width: 100%;"
                                            required>
                                            @foreach ($representantes as $representante)
                                                <option value="{{ $representante->id }}" @selected(old('id_representante', $benef->id_representante) == $representante->id)>{{ $representante->name }} {{ $representante->ap_paterno }} {{ $representante->ap_materno }}</option>
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
                                        class="form-control select2" style="width: 100%;"
                                        required>
                                        @foreach ($coordinadores as $coordinador)
                                            <option value="{{ $coordinador->id }}" @selected(old('id_coordinador', $benef->id_coordinador) == $coordinador->id)>{{ $coordinador->name }} {{ $coordinador->ap_paterno }} {{ $coordinador->ap_materno }}</option>
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
                                        value="{{ $benef->correo }}" required autocomplete="email">
                                    <div id="alert4" class="alert alert-danger" style="display:none" role="alert">
                                        Ingresa un correo valido</div>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="direccion">{{ __('Dirección') }}</label>
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ $benef->direccion }}" required autocomplete="direccion" autofocus>

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
                                        {{ __('Actualizar') }}
                                    </button>

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

@extends('adminlte::page')

@section('title', 'Create')
@section('content_header')
    <h1>Agregar Coordinador</h1>
    @if (session('message'))
    <div class="alert alert-danger" role="message">
        {{session('message')}}
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
                    <form method="POST" id="admin"  name="admin" action="{{ route('store.coordi') }}" >
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_paterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_paterno" type="text" class="form-control @error('ap_paterno') is-invalid @enderror" name="ap_paterno" value="{{ old('ap_paterno') }}" required autocomplete="ap_paterno" autofocus>

                                @error('ap_paterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ap_matermo" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="ap_materno" type="text" class="form-control @error('ap_materno') is-invalid @enderror" name="ap_materno" value="{{ old('ap_materno') }}" required autocomplete="ap_materno" autofocus>

                                @error('ap_materno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control"  name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" >
                                <div id="alert0" class="alert alert-danger" style="display:none" role="alert">Ingresa solo números</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div id="alert4" class="alert alert-danger" style="display:none" role="alert">Ingresa un correo valido</div>
                            </div>
                        </div>


                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>

                                <a href="{{route('lista.coordi')}}" class="btn btn-danger">
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
    <script> console.log('Hi!');
    $(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);

});


//primeras letras mayusculas
function capitalize(str){
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }
        const input = document.getElementById('name');
        input.addEventListener('keypress', e => {
        setTimeout(() => {input.value = input.value.split(' ').map(x => capitalize(x)).join(' ')}, 1)
        });
        const input2 = document.getElementById('ap_paterno');
        input2.addEventListener('keypress', e => {
        setTimeout(() => {input2.value = capitalize(input2.value)}, 1)
        });
        const input3 = document.getElementById('ap_materno');
        input3.addEventListener('keypress', e => {
        setTimeout(() => {input3.value = capitalize(input3.value)}, 1)
        });


    adminLog.addEventListener("submit", (e) => {
        var exp = /[a-zA-Z0-9._-]+\@(gmail|outlook|hotmail)\.(com|es)$/;
        var correo = document.getElementById("email").value;
        var valido = exp.test(correo);
        if (valido === false){
            e.preventDefault();
         let x = document.getElementById("alert4");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert4").fadeOut(1000);
                    }, 1000);
        }

    });

    //numero de telefono
telefono = document.getElementById("telefono");
telefono.addEventListener('keypress', function (e){
	    if (!soloNumeros(event)){
  	            e.preventDefault();
                  let x = document.getElementById("alert0");
                    x.style.display = "block";
                    setTimeout(function () {
                    $("#alert0").fadeOut(1000);
                    }, 1000);
         }
    });
    function soloNumeros(e){
        var key = e.charCode;
        console.log(key);
        return key >= 48 && key <= 57;
    }

    </script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
@stop


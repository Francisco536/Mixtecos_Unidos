@extends('adminlte::page')

@section('title', 'Nuevo')
@section('content_header')
    <h1>Agregar Representante</h1>
    @if (session('message'))
    <div class="alert alert-danger" role="message">
        {{session('message')}}
    </div>
    @endif
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" id="admin"  name="admin" action="{{ route('store.repre') }}" >
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputname">Nombre completo</label>
                              <input type="text" class="form-control" id="inputname" placeholder="Nombre">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputPassword4">Password</label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                          </div>
                          <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">City</label>
                              <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputState">State</label>
                              <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="inputZip">Zip</label>
                              <input type="text" class="form-control" id="inputZip">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck">
                              <label class="form-check-label" for="gridCheck">
                                Check me out
                              </label>
                            </div>
                          </div>

                        <div class="row mb-0" style="text-align: center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>

                                <a href="{{route('lista.repre')}}" class="btn btn-danger">
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


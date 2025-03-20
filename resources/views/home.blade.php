@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido al sistema de administracion de beneficiarios de Mixtecos Unidos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Card para Representantes -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title">Total de Representantes</h5>
                                </div>
                                <div class="card-body text-center">
                                    <h2>{{$representantesCount}}</h2>
                                    <p class="lead">Representantes activos en el sistema</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card para Beneficiarios -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title">Total de Beneficiarios</h5>
                                </div>
                                <div class="card-body text-center">
                                    <h2>{{$beneficiariosCount}}</h2>
                                    <p class="lead">Beneficiarios registrados en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

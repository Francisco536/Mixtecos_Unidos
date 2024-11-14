@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Administracion de beneficiarios de Mixtecos Unidos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido al sistema de administracion de beneficiarios de Mixtecos Unidos') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

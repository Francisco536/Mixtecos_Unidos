{{-- @extends('adminlte::auth.login') --}}
<link rel="stylesheet"href="assets/style/Log.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 ">
                    <br><br><br><br>
                    <br>
                    <br>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="assets/img/mixtecos.jpg" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="text-center">
                        <img height="110px" width="150px" src="assets/img/mu.png">
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div>
                    </div>
                    <div class="row mb-4 px-3 text-center">
                        <h6 class="mb-0 mr-4 mt-2">INICIAR SESIÓN</h6>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-outline mb-4">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                autofocus>
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label for="password">Contraseña:</label>
                            <input type="password" id="password" name="password" required>
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div style="display: flex;justify-content: center; align-items: center;">
                            <button type="submit" class="ml-4 styled-button"
                                style="background-color: #ff0d00d7;
                                color: white;  font-size: 20px; border: none; border-radius: 8px;">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-warning py-4">
            <div class="row px-3 text-center">
                <small class="ml-4 ml-sm-5 mb-2 ">
                    <img height="40px" width="70px" src="assets/img/logo.png">
                    Mixtecos Unidos A.C. &copy; 2024. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                </div>
            </div>
        </div>
    </div>
</div>

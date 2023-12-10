@extends('layouts.master')

@section('content')
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row">
            <div class="col-md-6 bg-success text-center text-white p-5">
                <h1>Bienvenido a la Aplicación</h1>
                <p>Explora nuestra increíble plataforma.</p>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Tienes cuenta?</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <p>Inicia sesion <a href="{{ route('login') }}">Iniciar Sesión</a></p>
                        </form>
                        <div class="mt-3">
                            <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

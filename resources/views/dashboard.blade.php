@extends('layouts.app')

@section('title', 'Dashboard | Cartagena Guía Segura')

@section('content')
<div class="dashboard-body">
    <div class="container-dashboard container-fluid">
        <div class="card card-dashboard">
            <h2 class="text-cartagena-terracota">Perfil de Usuario</h2>
            <p>Bienvenido al dashboard. Aquí puedes ver información de tu cuenta y personalizar tus preferencias.</p>
        </div>

        <div class="card card-dashboard">
            <h2 class="text-cartagena-terracota">Funciones de la App</h2>
            <ul>
                <li>Acceso a cuenta (Login/Logout)</li>
                <li>Ajustes de la App</li>
                <li>Centro de ayuda y FAQ</li>
                <li>Menú de atención al cliente</li>
                <li>Términos y condiciones</li>
            </ul>
        </div>

        <div class="card card-dashboard">
            <h2 class="text-cartagena-terracota">Estado de la Aplicación</h2>
            <p class="bg-cartagena-success text-white p-2 rounded inline-block">Verificado</p>
            <p class="bg-cartagena-warning p-2 rounded inline-block mt-2">En proceso</p>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app', ['title' => $lugar['titulo']])

@section('content')
    <div class="container">
        <p><a href="{{ route('lugares.index') }}">Volver al catalogo</a></p>

        <section class="detail">
            <article>
                <p class="eyebrow">{{ $lugar['categoria'] }} / {{ $lugar['departamento'] }}</p>
                <h1>{{ $lugar['titulo'] }}</h1>
                <p>{{ $lugar['descripcion'] }}</p>

                <div class="detail-media">
                    <img src="{{ $lugar['imagen'] }}" alt="{{ $lugar['titulo'] }}">
                </div>

                <div class="panel">
                    <h2>Datos del destino</h2>
                    <p class="meta">
                        <span><strong>Precio:</strong> Desde ${{ number_format($lugar['precio_desde'], 2) }} {{ $lugar['moneda'] }}</span>
                        <span><strong>Horario:</strong> {{ $lugar['horario'] }}</span>
                        <span><strong>Duracion:</strong> {{ $lugar['duracion_recomendada'] }}</span>
                        <span><strong>Mejor epoca:</strong> {{ $lugar['mejor_epoca'] }}</span>
                    </p>

                    <ul class="list">
                        @foreach ($lugar['servicios'] as $servicio)
                            <li>{{ $servicio }}</li>
                        @endforeach
                    </ul>
                </div>
            </article>

            <aside class="panel">
                <h2>Solicitar informacion</h2>

                @if (session('status'))
                    <div class="alert success">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert error">Revisa los campos del formulario.</div>
                @endif

                <form class="form" method="POST" action="{{ route('lugares.contact', $lugar['slug']) }}">
                    @csrf

                    <label>
                        Nombre
                        <input name="nombre" value="{{ old('nombre') }}" required maxlength="80">
                        @error('nombre') <small>{{ $message }}</small> @enderror
                    </label>

                    <label>
                        Correo electronico
                        <input type="email" name="email" value="{{ old('email') }}" required maxlength="120">
                        @error('email') <small>{{ $message }}</small> @enderror
                    </label>

                    <label>
                        Mensaje
                        <textarea name="mensaje" required minlength="10" maxlength="500">{{ old('mensaje') }}</textarea>
                        @error('mensaje') <small>{{ $message }}</small> @enderror
                    </label>

                    <button class="button" type="submit">Enviar solicitud</button>
                </form>
            </aside>
        </section>
    </div>
@endsection

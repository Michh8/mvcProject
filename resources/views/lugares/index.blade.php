@extends('layouts.app', ['title' => 'Catalogo turistico de El Salvador'])

@section('content')
    <div class="container">
        <section class="hero">
            <p class="eyebrow">Catalogo turistico MVC</p>
            <h1>Lugares turisticos de El Salvador para explorar desde Laravel.</h1>
            <p>
                La informacion se lee desde un archivo JSON, pasa por un modelo,
                se coordina en un controlador y se presenta en vistas Blade.
            </p>

            <div class="filters" aria-label="Categorias disponibles">
                @foreach ($categorias as $categoria)
                    <span class="chip">{{ $categoria }}</span>
                @endforeach
            </div>
        </section>

        <section class="grid" aria-label="Listado de lugares turisticos">
            @foreach ($lugares as $lugar)
                <article class="card">
                    <img src="{{ $lugar['imagen'] }}" alt="{{ $lugar['titulo'] }}" loading="lazy">
                    <div class="card-body">
                        <div>
                            <p class="eyebrow">{{ $lugar['categoria'] }}</p>
                            <h2>{{ $lugar['titulo'] }}</h2>
                        </div>
                        <p class="meta">
                            <span>{{ $lugar['departamento'] }}</span>
                            <span class="price">Desde ${{ number_format($lugar['precio_desde'], 2) }}</span>
                        </p>
                        <p>{{ $lugar['descripcion'] }}</p>
                        <a class="button" href="{{ route('lugares.show', $lugar['slug']) }}">Ver detalle</a>
                    </div>
                </article>
            @endforeach
        </section>
    </div>
@endsection

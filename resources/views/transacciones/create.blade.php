{{-- transacciones/create.blade.php --}}
@extends('layouts.app')
@section('titulo', 'Nueva transacción')

@section('contenido')
    <p><a href="{{ route('comercios.show', $comercio) }}">&larr; Volver al comercio</a></p>

    <h1>Nueva transacción</h1>
    <p class="meta">Comercio: {{ $comercio->nombre_comercio }}</p>

    <form action="{{ route('transacciones.store') }}" method="POST">
        @csrf
        {{-- El comercio va oculto, por eso el POST no lo lleva en la URL --}}
        <input type="hidden" name="comercio_id" value="{{ $comercio->id }}">

        <label for="cliente">Cliente</label>
        <input id="cliente" name="cliente_nombre" type="text"><br>

        <label for="monto">Monto</label>
        <input id="monto" name="monto" type="number" step="0.01"><br>

        <button type="submit">Registrar</button>
    </form>
@endsection

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Descripción General Servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.descriptions.create') }}" class="btn btn-sm btn-success">
                Nueva Descripción
            </a>
        </div>
        <card class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Dirección General Servicios</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($descriptions as $description)
                        <tr>
                            <td>{{ $description->id }}</td>
                            <td>{!! $description->overview !!}</td>
                            <td>
                                <a href="{{ route('admin.descriptions.edit', $description) }}"
                                    class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.descriptions.destroy', $description) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"
                                        type="submit">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </card>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
    <script>
        @if (session('delete'))
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('delete') }}",
                icon: "success"
            });
        @endif
        @if (session('create'))
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('create') }}",
                icon: "success"
            });
        @endif
        @if (session('update'))
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('update') }}",
                icon: "success"
            });
        @endif
    </script>
@stop

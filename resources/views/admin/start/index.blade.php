@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pantalla Inicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header"><a href="{{ route('admin.starts.create') }}" class="btn btn-sm btn-success">Nueva
                Portada</a></div>
        <card class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Subtítulo</th>
                        <th scope="col">Color</th>
                        <th scope="col">Portada</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($starts as $start)
                        <tr>
                            <div class="d-flex justify-content-between">
                                <td>{{ $start->id }}</td>
                                <td>{{ $start->start_title }}</td>
                                <td>{{ $start->start_subtitle }}</td>
                                <td>
                                    @if ($start->start_color)
                                        <span
                                            style="border-radius: 3px; border-style: solid; border-color: black; background-color: {{ $start->start_color }};">
                                            Color de Fondo
                                        </span>
                                    @else
                                        <span>Ningún color de fondo asignado.</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($start->image)
                                        <a href="{{ Storage::url($start->image->url) }}"
                                            data-lightbox="{{ $start->id }}">
                                            <img class="rounded" src="{{ Storage::url($start->image->url) }}" width="75px"
                                                height="75px" alt="">
                                        </a>
                                    @else
                                        <span>No hay imagen xd</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $start->start_state }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.starts.edit', $start) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.starts.destroy', $start) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar"
                                            type="submit">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                            </div>
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

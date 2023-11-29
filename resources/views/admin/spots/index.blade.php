@extends('adminlte::page')

@section('title', 'Spot')

@section('content_header')
    <h1>Spots Publicitarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.spots.create') }}" class="btn btn-sm btn-success">
                Nuevo Spot
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título Spot</th>
                        <th>Descripción Spot</th>
                        <th>Video Spot</th>
                        <th>Color</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spots as $spot)
                        <tr>
                            <div class="d-flex justify-content-between">
                                <td>{{ $spot->id }}</td>
                                <td>{{ $spot->spot_title }}</td>
                                <td>{{ $spot->spot_description }}</td>
                                <td>
                                    @if ($spot->spot_video)
                                        <video width="200" height="200" controls>
                                            <source src="{{ Storage::url($spot->spot_video) }}" type="video/mp4">
                                        </video>
                                    @else
                                        <p>No hay video aún</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($spot->spot_color)
                                        <span
                                            style="border-radius: 3px; border-style: solid; border-color: black; background-color: {{ $spot->spot_color }};">
                                            Color de Fondo
                                        </span>
                                    @else
                                        <span>Ningún color de fondo asignado.</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.spots.edit', $spot) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.spots.destroy', $spot) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
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
        </div>
        <div class="card-footer">
            {{ $spots->links() }}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
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

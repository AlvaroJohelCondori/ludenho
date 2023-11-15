@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Materiales</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.materials.create') }}" class="btn btn-sm btn-success">
                Nuevo Material
            </a>
        </div>
        <card class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Material</th>
                        <th scope="col">Descripción Material</th>
                        <th scope="col">Color Material</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                        <tr>
                            <div class="d-flex justify-content-between">
                                <td>{{ $material->id }}</td>
                                <td>{{ $material->material_name }}</td>
                                <td>{{ $material->material_description }}</td>
                                <td>{{ $material->material_color }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.materials.edit', $material) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.materials.destroy', $material) }}" method="POST"
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
        </card>
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

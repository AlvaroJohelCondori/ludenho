@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Dirección</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.address.create') }}" class="btn btn-sm btn-success">
                Nueva Dirección
            </a>
        </div>
        <card class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Dirección Oficina</th>
                        <th scope="col">Foto QR</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addresses as $address)
                        <tr>
                            <div class="d-flex justify-content-between">
                                <td>{{ $address->id }}</td>
                                <td>{!! $address->address_office !!}</td>
                                <td>
                                    @if ($address->address_foto)
                                        <a href="{{ Storage::url($address->address_foto) }}"
                                            data-lightbox="{{ $address->id }}">
                                            <img class="rounded" src="{{ Storage::url($address->address_foto) }}"
                                                width="75px" height="75px" alt="">
                                        </a>
                                    @else
                                        <span>No hay imagen xd</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.address.edit', $address) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.address.destroy', $address) }}" method="POST"
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

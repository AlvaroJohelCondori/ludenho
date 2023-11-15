@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Material</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.materials.update', $material) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <x-adminlte-input name="material_name" id="material_name" label="Nombre Material"
                            placeholder="Nombre del material" label-class="text-lightblue"
                            value="{{ $material->material_name }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-input name="material_slug" id="material_slug" label="Nombre Amigable"
                            placeholder="Nombre amigable..." label-class="text-lightblue" readonly
                            value="{{ $material->material_slug }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-select name="material_color" label="Color Material" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            <option value="primary" {{ $material->material_color == 'primary' ? 'selected' : '' }}>Azul
                            </option>
                            <option value="success" {{ $material->material_color == 'success' ? 'selected' : '' }}>Verde
                            </option>
                            <option value="danger" {{ $material->material_color == 'danger' ? 'selected' : '' }}>Rojo
                            </option>
                            <option value="warning" {{ $material->material_color == 'warning' ? 'selected' : '' }}>Amarillo
                            </option>
                            <option value="info" {{ $material->material_color == 'info' ? 'selected' : '' }}>Celeste
                            </option>
                        </x-adminlte-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-textarea name="material_description" label="Descripción Material" rows=5
                            label-class="text-warning" placeholder="Inserte descripción...">
                            {{ $material->material_description }}
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="{{ route('admin.materials.index') }}"
                            class="btn btn-sm btn-danger">Cancelar</a></div>
                    <div class="col">
                        <button type="submit" class="btn btn-sm btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#material_name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#material_slug',
                space: '-'
            });
        });
    </script>
@stop

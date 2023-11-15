@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Material</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.materials.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <x-adminlte-input name="material_name" id="material_name" label="Nombre Material"
                            placeholder="Nombre del material" label-class="text-lightblue"
                            value="{{ old('material_name') }}">
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
                            value="{{ old('material_slug') }}">
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
                            <option value="primary">Azul</option>
                            <option value="success">Verde</option>
                            <option value="danger">Rojo</option>
                            <option value="warning">Amarillo</option>
                            <option value="info">Celeste</option>
                        </x-adminlte-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-textarea name="material_description" label="Descripción Material" rows=5
                            label-class="text-warning" placeholder="Inserte descripción..."
                            value="{{ old('material_description') }}">
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

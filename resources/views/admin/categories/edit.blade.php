@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col">
                <x-adminlte-input name="category_name" id="category_name" label="Nombre Categoría"
                    placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{ $category->category_name }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col">
                <x-adminlte-input name="category_slug" id="category_slug" label="Nombre Amigable"
                    placeholder="Nombre amigable..." label-class="text-lightblue" readonly
                    value="{{ $category->category_slug }}">
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
                <x-adminlte-textarea name="category_description" label="Descripción Categoría" rows=5
                    label-class="text-warning" placeholder="Inserte descripción...">
                    {{ $category->category_description }}
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-warning"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
            </div>
        </div>
        <div class="row">
            <div class="col"><a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-sm btn-success">Guardar</button>
            </div>
        </div>
    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#category_name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#category_slug',
                space: '-'
            });
        });
    </script>
@stop

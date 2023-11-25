@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Portada</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.starts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <x-adminlte-input name="start_title" label="Título Portada" placeholder="Títlo Portada"
                            label-class="text-lightblue" value="{{ old('start_title') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-input name="start_subtitle" label="Subtítulo Portada" placeholder="Subtítulo Portada..."
                            label-class="text-lightblue" value="{{ old('start_subtitle') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        @php
                            $config = [
                                'extensions' => [
                                    [
                                        'name' => 'swatches',
                                        'options' => [
                                            'colors' => [
                                                'black' => '#000000',
                                                'gray' => '#888888',
                                                'white' => '#ffffff',
                                                'red' => '#ff0000',
                                            ],
                                            'namesAsValues' => true,
                                        ],
                                    ],
                                ],
                            ];
                        @endphp
                        <x-adminlte-input-color name="start_color" placeholder="Elija un color..." label="Seleccione Color"
                            label-class="text-lightblue" :config="$config" value="#ffffff">
                            <x-slot name="appendSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-lg fa-brush"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-color>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <label class="text-info">Estado Portada</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="start_state"
                                    value="1" checked>
                                <label for="customRadio1" class="custom-control-label text-secondary">Borrador</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="start_state"
                                    value="2">
                                <label for="customRadio2" class="custom-control-label text-secondary">Publicado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @php
                            $config = [
                                'allowedFileTypes' => ['image'],
                                'browseOnZoneClick' => true,
                                'theme' => 'explorer-fa5',
                            ];
                        @endphp
                        <x-adminlte-input-file-krajee name="start_image" label="Seleccionar Foto"
                            data-msg-placeholder="Seleccione una imagen realacionado a la portada..."
                            label-class="text-primary" :config="$config" disable-feedback />
                        @error('start_image')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="{{ route('admin.starts.index') }}"
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

@section('plugins.Summernote', true)
@section('plugins.KrajeeFileinput', true)
@section('plugins.BootstrapColorpicker', true)

@section('js')
@stop

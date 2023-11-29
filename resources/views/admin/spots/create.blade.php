@extends('adminlte::page')

@section('title', 'Spot')

@section('content_header')
    <h1>Crear Spot</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.spots.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <x-adminlte-input name="spot_title" label="Título Spot" placeholder="Título del spot.."
                            label-class="text-lightblue" value="{{ old('spot_title') }}">
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
                        <x-adminlte-input-color name="spot_color" placeholder="Elija un color..." label="Seleccione Color"
                            label-class="text-lightblue" :config="$config" value="#ffffff">
                            <x-slot name="appendSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-lg fa-brush"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-color>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-textarea name="spot_description" label="Descripción Spot" rows=5
                            label-class="text-warning" placeholder="Inserte descripción..."
                            value="{{ old('spot_description') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-lg fa-file-alt text-warning"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @php
                            $config = [
                                'allowedFileTypes' => ['video'],
                                'browseOnZoneClick' => true,
                                'theme' => 'explorer-fa5',
                            ];
                        @endphp
                        <x-adminlte-input-file-krajee name="spot_video" label="Seleccionar Video"
                            data-msg-placeholder="Seleccione un video a subir..." label-class="text-primary"
                            :config="$config" disable-feedback />
                        @error('spot_video')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="{{ route('admin.spots.index') }}"
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

@section('plugins.KrajeeFileinput', true)
@section('plugins.BootstrapColorpicker', true)

@section('js')
@stop

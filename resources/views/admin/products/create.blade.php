@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <x-adminlte-input name="product_name" id="product_name" label="Nombre Producto"
                            placeholder="Nombre del producto" label-class="text-lightblue"
                            value="{{ old('product_name') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-input name="product_slug" id="product_slug" label="Nombre Amigable"
                            placeholder="Nombre amigable..." label-class="text-lightblue" readonly
                            value="{{ old('product_slug') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-select name="category_id" label="Selecionar Categoría" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <label class="text-info">Estado Producto</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="product_status"
                                    value="1" checked>
                                <label for="customRadio1" class="custom-control-label text-secondary">Borrador</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="product_status"
                                    value="2">
                                <label for="customRadio2" class="custom-control-label text-secondary">Publicado</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <p class="font-weight-bold">Materiales</p>
                        @foreach ($materials as $material)
                            <div class="form-check d-inline mr-3">
                                <input class="form-check-input" type="checkbox" id="material-{{ $material->id }}"
                                    name="materials[]" value="{{ $material->id }}">
                                <label class="form-check-label" for="material-{{ $material->id }}">
                                    {{ $material->material_name }}
                                </label>
                            </div>
                        @endforeach
                        @error('materials')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @php
                            $config = [
                                'height' => '100',
                                'toolbar' => [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough', 'superscript', 'subscript']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]],
                            ];
                        @endphp
                        <x-adminlte-text-editor name="product_extract" label="Extracto Producto" label-class="text-info"
                            placeholder="Escriba el extracto..." :config="$config" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @php
                            $config = [
                                'height' => '100',
                                'toolbar' => [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough', 'superscript', 'subscript']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]],
                            ];
                        @endphp
                        <x-adminlte-text-editor name="product_body" label="Cuerpo Producto" label-class="text-info"
                            placeholder="Escriba el cuerpo..." :config="$config" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-input-file-krajee id="product_images" name="product_images[]"
                            data-msg-placeholder="Choose multiple files..." data-show-cancel="false" data-show-close="false"
                            multiple />
                        @error('product_images')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="{{ route('admin.products.index') }}"
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

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#product_name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#product_slug',
                space: '-'
            });
        });
    </script>
@stop

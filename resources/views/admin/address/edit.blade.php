@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Dirección</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.address.update', $address) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        @php
                            $config = [
                                'height' => '100',
                                'toolbar' => [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough', 'superscript', 'subscript']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['table', ['table']], ['insert', ['link', 'picture', 'video']], ['view', ['fullscreen', 'codeview', 'help']]],
                            ];
                        @endphp
                        <x-adminlte-text-editor name="address_office" label="Dirección Oficina" label-class="text-info"
                            placeholder="Escriba la dirección..." :config="$config" />
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
                        <x-adminlte-input-file-krajee name="address_foto" label="Seleccionar Foto"
                            data-msg-placeholder="Seleccione una imagen realacionado a la portada..."
                            label-class="text-primary" :config="$config" disable-feedback />
                        @error('address_foto')
                            <small class="text-danger"><strong>{{ $message }}</strong></small>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="mt-2">
                            <label class="text-primary">Imagen actual:</label>
                            <img src="{{ Storage::url($address->address_foto) }}" alt="Vista previa de la imagen"
                                style="max-width: 100px; max-height: 100px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="{{ route('admin.address.index') }}"
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
    <script>
        $(document).ready(function() {
            // Establecer el contenido del editor
            $('textarea[name="address_office"]').summernote('code', {!! json_encode($address->address_office) !!});
        });
    </script>
@stop

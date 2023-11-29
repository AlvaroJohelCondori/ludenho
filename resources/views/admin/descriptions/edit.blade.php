@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Descripción</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.descriptions.update', $description) }}" method="POST" enctype="multipart/form-data">
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
                        <x-adminlte-text-editor name="overview" label="Descripción General" label-class="text-info"
                            placeholder="Escriba la descripción..." :config="$config" />
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="{{ route('admin.descriptions.index') }}"
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
            $('textarea[name="overview"]').summernote('code', {!! json_encode($description->overview) !!});
        });
    </script>
@stop

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LUDEÑO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Incluye lightbox2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div>
            <nav class="navbar navbar-expand-lg fs-4 fixed-top bg-primary">
                <div class="container">
                    <a class="navbar-brand fw-bold fs-2 text-white" href="/">
                        <img src="{{ asset('img/logo2.png') }}" alt="" height="60">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item ms-5">
                                <a class="nav-link fw-bold text-white" href="#section1">INICIO</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a class="nav-link fw-bold text-white" href="#section2">SERVICIOS</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a class="nav-link fw-bold text-white" href="#section3">CONTACTOS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section class="pt-5" id="section1">
            <div>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12"
                        style="background-color: {{ $start->start_color }};">
                        <div class="text-center h-100 d-flex flex-column justify-content-center">
                            <h1 class="text-warning fw-bold">{{ $start->start_title }}</h1>
                            <h2 class="fw-bold" style="font-size: 3.5rem;">
                                <p>{{ $start->start_subtitle }}</p>
                            </h2>
                            <a class="btn btn-outline-info" href="#section2">
                                <i class="fas fa-chevron-down"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                        <img class="img-fluid h-100"
                            src="{{ $start->image ? Storage::url($start->image->url) : asset('img/not-image.jpeg') }}"
                            alt="Imagen de fondo">
                        <div class="animate__animated animate__backInLeft"
                            style="position: absolute; bottom: 0; right: 60px;">
                            <img src="{{ asset('img/insignia3.png') }}" alt="Imagen Redonda"
                                class="img-fluid rounded-circle" width="170" height="170">
                        </div>
                        <div class="animate__animated animate__backInLeft"
                            style="position: absolute; bottom: 0; center: 0;">
                            <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="img-fluid" width="500">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="" id="section2" class="bg-light" style="height: 100vh; padding-top: 90px;">
            <div class="container-fluid" style="padding-right: 60px; padding-left: 60px;">
                <div class="row">
                    <div class="d-block">
                        <h1 class="d-inline text-secondary fw-bold" style="font-size: 3rem;">PROYECTOS REALIZADOS</h1>
                        <p class="card-text text-secondary fs-4 d-inline">
                            Para ver más detalles haz click en cualquiera de las imágenes...
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row g-5">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products as $product)
                                    <div class="carousel-item{{ intval($loop->index) == 0 ? ' active' : '' }}">
                                        <div class="row g-3">
                                            @foreach ($product->images as $image)
                                                <div class="col">
                                                    <a href="{{ Storage::url($image->url) }}"
                                                        data-lightbox="{{ $product->id }}"
                                                        data-title="{{ $product->product_name }}">
                                                        <img src="{{ Storage::url($image->url) }}"
                                                            class="d-block w-100 img-fluid img-thumbnail"
                                                            style="height: 600px; object-fit: cover;"
                                                            alt="Imagen Producto {{ $product->id }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="carousel-caption d-none d-md-block text-center">
                                            <div class="card mx-auto" style="width: 18rem;">
                                                <div class="card-body">
                                                    {!! $product->product_extract !!}
                                                    <button type="button" class="btn btn-sm btn-info openModal"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $product->id }}">
                                                        Vista Previa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel-{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="exampleModalLabel-{{ $product->id }}">
                                                        {{ $product->product_name }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row h-100">
                                                        <div class="col-lg-4 position-relative">
                                                            <div>
                                                                @php
                                                                    $positions = ['start', 'end', 'center'];
                                                                    $imageCount = count($product->images);
                                                                    $imageSize = $imageCount == 1 ? 500 : ($imageCount == 2 ? 400 : 265);
                                                                @endphp
                                                                @foreach ($product->images as $index => $image)
                                                                    @php
                                                                        $randomPosition = $positions[array_rand($positions)];
                                                                    @endphp
                                                                    @if ($imageCount == 1)
                                                                        <img class="img-fluid img-thumbnail object-fit-cover position-absolute top-50 start-50 translate-middle"
                                                                            src="{{ Storage::url($image->url) }}"
                                                                            alt=""
                                                                            style="width: 500px; height: 500px;">
                                                                    @elseif($imageCount == 2)
                                                                        @if ($index == 0)
                                                                            <img class="img-fluid img-thumbnail object-fit-cover position-absolute top-0 end-0"
                                                                                src="{{ Storage::url($image->url) }}"
                                                                                alt=""
                                                                                style="width: 400px; height: 400px;">
                                                                        @else
                                                                            <img class="img-fluid img-thumbnail object-fit-cover position-absolute bottom-0 start-0"
                                                                                src="{{ Storage::url($image->url) }}"
                                                                                alt=""
                                                                                style="width: 400px; height: 400px;">
                                                                        @endif
                                                                    @else
                                                                        @if ($index == 0)
                                                                            <img class="img-fluid img-thumbnail object-fit-cover position-absolute top-0 end-0"
                                                                                src="{{ Storage::url($image->url) }}"
                                                                                alt=""
                                                                                style="width: 260px; height: 385px;">
                                                                        @elseif($index == 1)
                                                                            <img class="img-fluid img-thumbnail object-fit-cover position-absolute top-50 start-0 translate-middle-y"
                                                                                src="{{ Storage::url($image->url) }}"
                                                                                alt=""
                                                                                style="width: 260px; height: 500px;">
                                                                        @else
                                                                            <img class="img-fluid img-thumbnail object-fit-cover position-absolute bottom-0 end-0"
                                                                                src="{{ Storage::url($image->url) }}"
                                                                                alt=""
                                                                                style="width: 260px; height: 385px;">
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            {!! $product->product_body !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    {{-- <a href="{{ route('products.show', $product) }}"
                                                        class="btn btn-sm btn-success">
                                                        Ver Detalles
                                                    </a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div id="carouselExample1" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products as $product)
                                    <div class="carousel-item{{ intval($loop->index) == 0 ? ' active' : '' }}">
                                        <div class="row g-3">
                                            @foreach ($product->images as $image)
                                                <div class="col">
                                                    <a href="{{ Storage::url($image->url) }}"
                                                        data-lightbox="1-{{ $product->id }}"
                                                        data-title="1-{{ $product->product_name }}">
                                                        <img src="{{ Storage::url($image->url) }}"
                                                            class="d-block w-100 img-fluid img-thumbnail"
                                                            style="height: 600px; object-fit: cover;"
                                                            alt="Imagen Producto {{ $product->id }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="carousel-caption d-none d-md-block">
                                            <div class="card">
                                                <div class="card-body">
                                                    {!! $product->product_extract !!}
                                                    <button type="button" class="btn btn-sm btn-info openModal"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal1-{{ $product->id }}">
                                                        Vista Previa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1-{{ $product->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel1-{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="exampleModalLabel1-{{ $product->id }}">
                                                        {{ $product->product_name }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $product->product_body !!}
                                                    <div class="row">
                                                        @foreach ($product->images as $image)
                                                            <div class="col">
                                                                <a href="{{ Storage::url($image->url) }}"
                                                                    data-lightbox="m2-{{ $product->id }}"
                                                                    data-title="{{ $product->product_name }}">
                                                                    <img src="{{ Storage::url($image->url) }}"
                                                                        class="d-block w-100 img-fluid img-thumbnail"
                                                                        alt="Imagen Producto {{ $product->id }}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <a href="{{ route('products.show', $product) }}"
                                                        class="btn btn-sm btn-success">
                                                        Ver Detalles
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-1">
                        <a class="btn btn-outline-info float-start" href="#section1">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                    </div>
                    <div class="col-lg-10">
                        {!! $description->overview !!}
                    </div>
                    <div class="col-lg-1">
                        <a class="btn btn-outline-info float-end" href="#section3">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="" id="section3" class="bg-light" style="height: 100vh; padding-top: 90px;">
            <div class="container-fluid text-center" style="padding-left: 60px; padding-right: 60px;">
                <div class="row">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <img src="{{ asset('vendor/adminlte/dist/img/logo-ludeno.png') }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-warning mb-4 fs-1">CONTÁCTANOS</h5>
                                    <hr>
                                    <h5 class="card-title text-info mb-4" style="font-size: 4rem;">COTIZACIONES
                                        GRATUITAS</h5>
                                    <p class="card-text text-secondary fs-4">
                                        Envía un mensaje a cualquiera de la redes de tu preferencia...
                                    </p>
                                    <h5 class="card-title text-secondary mb-4 fs-2">REDES SOCIALES</h5>
                                    <div class="row">
                                        <div class="col">
                                            <figure class="figure">
                                                <img src="{{ asset('img/whatsapp.png') }}" width="150"
                                                    height="150" class="figure-img img-fluid rounded"
                                                    alt="...">
                                                <figcaption class="figure-caption text-center">
                                                    <a href="https://wa.me/+59170546730" target="_blank"
                                                        class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3">
                                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <figure class="figure">
                                                <img src="{{ asset('img/facebook.png') }}" width="150"
                                                    height="150" class="figure-img img-fluid rounded"
                                                    alt="...">
                                                <figcaption class="figure-caption text-center">
                                                    <a href="#"
                                                        class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3">
                                                        <i class="fab fa-facebook"></i> Facebook
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <figure class="figure">
                                                <img src="{{ asset('img/tiktok.png') }}" width="150"
                                                    height="150" class="figure-img img-fluid rounded"
                                                    alt="...">
                                                <figcaption class="figure-caption text-center">
                                                    <a href="#"
                                                        class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3">
                                                        <i class="fab fa-tiktok"></i> TikTok
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <figure class="figure">
                                                <img src="{{ asset('img/instagram.png') }}" width="150"
                                                    height="150" class="figure-img img-fluid rounded"
                                                    alt="...">
                                                <figcaption class="figure-caption text-center">
                                                    <a href="#"
                                                        class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3">
                                                        <i class="fab fa-instagram"></i> Instagram
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <figure class="figure">
                                                <img src="{{ asset('img/website.png') }}" width="150"
                                                    height="150" class="figure-img img-fluid rounded"
                                                    alt="...">
                                                <figcaption class="figure-caption text-center">
                                                    <a href="https://wa.me/+59170546730" target="_blank"
                                                        class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3">
                                                        <i class="fas fa-pager"></i> ludeño.com
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <figure class="figure">
                                                <img src="{{ asset('img/youtube.png') }}" width="150"
                                                    height="150" class="figure-img img-fluid rounded"
                                                    alt="...">
                                                <figcaption class="figure-caption text-center">
                                                    <a href="https://www.youtube.com/channel/UC-YKCj0ZD7I_x34bifkxBIg"
                                                        target="_blank"
                                                        class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-3">
                                                        <i class="fab fa-youtube"></i> YouTube
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($address->address_foto) }}" class="img-fluid rounded"
                                        alt="Imagen {{ $address->id }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        {!! $address->address_office !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div>
                            <!-- Reemplaza 'VIDEO_ID' con el ID único de tu video de YouTube -->
                            <iframe width="560" height="300" src="https://www.youtube.com/embed/i1kTBcr6y0c"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
        $(document).ready(function() {
            // Al pasar el mouse por el botón, abrir el modal
            $('.openModal').hover(function() {
                var modalId = $(this).data('bs-target');
                $(modalId).modal('show');
            });

            // Al salir del botón, cerrar el modal
            $('.btn-primary').mouseleave(function() {
                var modalId = $(this).data('bs-target');
                $(modalId).modal('hide');
            });
        });

        /*$(document).ready(function() {
            // Detecta el evento de scroll
            $(window).on('wheel', function(e) {
                // Comprueba la dirección del scroll
                if (e.originalEvent.deltaY > 0) {
                    // Scroll hacia abajo
                    scrollToSection('next');
                } else {
                    // Scroll hacia arriba
                    scrollToSection('prev');
                }
            });

            // Función para hacer scroll a la siguiente o anterior sección
            function scrollToSection(direction) {
                var currentSection = $('section.active');
                var targetSection;

                if (direction === 'next') {
                    targetSection = currentSection.next('section');
                } else {
                    targetSection = currentSection.prev('section');
                }

                if (targetSection.length) {
                    $('html, body').animate({
                        scrollTop: targetSection.offset().top
                    }, 1000); // Ajusta la duración de la animación según tus preferencias
                    currentSection.removeClass('active');
                    targetSection.addClass('active');
                }
            }
        });*/
    </script>
</body>

</html>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg fixed-top fs-5">
                <div class="container-fluid">
                    <a class="navbar-brand text-white fw-bold" href="/">LUDEÑO</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="#section1">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="#section2">CATÁLOGOS</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white fw-bold dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    NUESTROS SERVICIOS
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('products.category', $category) }}">
                                                {{ $category->category_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="#section3">CONTÁCTANOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="#section4">ACERCA DE NOSOTROS</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="{{ route('login') }}">INICIAR SESIÓN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="{{ route('register') }}">REGISTRARSE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section id="section1" style="background-image: url('{{ Storage::url($start->image->url) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="card animate__animated animate__backInLeft card-principal">
                            <div class="card-body">
                                <h1 class="text-warning fw-bold">{{ $start->start_title }}</h1>
                                <h2 class="text-white fw-bold" style="font-size: 3.5rem;">
                                    <p>{{ $start->start_subtitle }}</p>
                                </h2>
                                <a class="btn btn-info btn-lg" href="#section2">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ asset('img/logo.png') }}" width="100%"
                            class="img-fluid img-thumbnail animate__animated animate__backInLeft card-principal"
                            alt="...">
                    </div>
                </div>
                <div class="animate__animated animate__backInLeft" style="position: absolute; bottom: 0; right: 0;">
                    <img src="{{ asset('img/insignia.png') }}" alt="Imagen Redonda" class="img-fluid rounded-circle"
                        width="300" height="300">
                </div>
            </div>
        </section>
        <section id="section2" class="bg-light" style="height: 100vh; padding-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Nuestros Trabajos</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam dolore minima rerum, voluptatem
                            assumenda, deserunt explicabo debitis doloremque beatae maiores iste ullam atque eaque
                            similique eligendi molestias enim non? Aliquam!
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products as $product)
                                    <div class="carousel-item{{ intval($loop->index) == 0 ? ' active' : '' }}">
                                        <div class="row">
                                            @foreach ($product->images as $image)
                                                <div class="col">
                                                    <a href="{{ Storage::url($image->url) }}"
                                                        data-lightbox="{{ $product->id }}"
                                                        data-title="{{ $product->product_name }}">
                                                        <img src="{{ Storage::url($image->url) }}"
                                                            class="d-block w-100 img-fluid img-thumbnail"
                                                            style="width: 400px; height: 400px; object-fit: cover"
                                                            alt="Imagen Producto {{ $product->id }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="carousel-caption d-none d-md-block my-shadown">
                                            <h5 class="fw-bold">{{ $product->product_name }}</h5>
                                            <a href="{{ route('products.show', $product) }}"
                                                class="btn btn-sm btn-info">
                                                Ver Producto
                                            </a>
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
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div id="carouselProducts2" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselProducts2" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselProducts2" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselProducts2" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ asset('img/portada-principal-3.jpg') }}"
                                                data-lightbox="gallery" data-title="...">
                                                <img src="{{ asset('img/portada-principal-3.jpg') }}"
                                                    style="width: 400px; height: 400px; object-fit: cover;"
                                                    class="d-block w-100 img-fluid img-thumbnail" alt="...">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="{{ asset('img/portada-principal-4.jpg') }}"
                                                data-lightbox="gallery" data-title="...">
                                                <img src="{{ asset('img/portada-principal-4.jpg') }}"
                                                    style="width: 400px; height: 400px; object-fit: cover;"
                                                    class="d-block w-100 img-fluid img-thumbnail" alt="...">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block my-shadown">
                                        <h5 class="fw-bold">First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                        <button class="btn btn-sm btn-info">Ver Producto</button>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <a href="{{ asset('img/portada-principal-8.jpg') }}" data-lightbox="gallery"
                                        data-title="...">
                                        <img src="{{ asset('img/portada-principal-8.jpg') }}"
                                            style="width: 400px; height: 400px; object-fit: cover;"
                                            class="d-block w-100 img-fluid img-thumbnail" alt="...">
                                    </a>
                                    <div class="carousel-caption d-none d-md-block my-shadown">
                                        <h5 class="fw-bold">Second slide label</h5>
                                        <p>Some representative placeholder content for the second slide.</p>
                                        <button class="btn btn-sm btn-info">Ver Producto</button>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ asset('img/portada-principal-5.jpg') }}"
                                                data-lightbox="gallery" data-title="...">
                                                <img src="{{ asset('img/portada-principal-5.jpg') }}"
                                                    style="width: 400px; height: 400px; object-fit: cover;"
                                                    class="d-block w-100 img-fluid img-thumbnail" alt="...">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="{{ asset('img/portada-principal-6.jpg') }}"
                                                data-lightbox="gallery" data-title="...">
                                                <img src="{{ asset('img/portada-principal-6.jpg') }}"
                                                    style="width: 400px; height: 400px; object-fit: cover;"
                                                    class="d-block w-100 img-fluid img-thumbnail" alt="...">
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="{{ asset('img/portada-principal-10.jpg') }}"
                                                data-lightbox="gallery" data-title="...">
                                                <img src="{{ asset('img/portada-principal-10.jpg') }}"
                                                    style="width: 400px; height: 400px; object-fit: cover;"
                                                    class="d-block w-100 img-fluid img-thumbnail" alt="...">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block my-shadown">
                                        <h5 class="fw-bold">Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
                                        <button class="btn btn-sm btn-info">Ver Producto</button>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProducts2"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProducts2"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h2>Productos</h2>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel expedita aut deleniti tenetur
                            delectus magnam impedit iusto corrupti. Ut voluptate quas repellendus error qui, nesciunt
                            ipsam ab sunt corrupti fuga.
                        </p>
                        <p>
                            Como parte del servicio al cliente contamos con profesionales Arquitectos quienes se
                            encargan de realizar:
                        <ul>
                            <li>Presupuesto.</li>
                            <li>Medición de la Obra.</li>
                            <li>Asesoramiento técnico.</li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="#section1" class="btn btn-info btn-sm">Subir</a></div>
                    <div class="col"><a href="#section3" class="btn btn-info btn-sm">Bajar</a></div>
                </div>
            </div>
        </section>
        <section id="section3" class="bg-light" style="height: 100vh; padding-top: 128px;">
            <div class="container text-center text-md-left">
                <div class="row">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('vendor/adminlte/dist/img/logo-ludeno.png') }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-warning mb-4">FACHADAS FLOTANTES</h5>
                                    <p class="card-text text-secondary">
                                        Somos una empresa altamente competitiva comprometidos al 100% con la
                                        satisfacción de nuestros clientes.
                                    </p>
                                    <p class="card-text text-secondary">
                                        14 años aportando al creciemiento y desarrollo del país.
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center text-md-left">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mt-3">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('img/ubication.png') }}" class="img-fluid rounded-start"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-info mb-3">Oficina Central</h5>
                                        <p class="card-text text-secondary">El Alto, Zona Villa Dolores</p>
                                        <p class="card-text text-secondary">Av. Antofagasta Esq. Calle 10.</p>
                                        <p class="card-text">
                                            <small class="text-body-secondary">Escanear el código para abrir la
                                                ubucación.</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-info">Nuestras Redes Sociales</h5>
                        <hr class="mb-4">
                        <p>
                            <a href="#"
                                class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                        </p>
                        <p>
                            <a href="#"
                                class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                <i class="fab fa-youtube"></i> YouTube
                            </a>
                        </p>
                        <p>
                            <a href="#"
                                class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                <i class="fab fa-tiktok"></i> TikTok
                            </a>
                        </p>
                        <p>
                            <a href="https://wa.me/+59170546730" target="_blank"
                                class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </p>
                        <a href="#section2" class="btn btn-info btn-sm">Subir</a>
                        <a href="#section4" class="btn btn-info btn-sm">Bajar</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="section4" class="bg-light" style="height: 100vh; padding-top: 128px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="mb-4">ACERCA DE NOSOTROS</h2>
                        <h4>CONSTRUCCIÓN EN ARTE MODERNO</h4>
                        <h6>LUDEÑO PLASMANDO TUS SUEÑOS</h6>
                        <p class="lead">Que el trabajo hable por nosotros.</p>
                        <p>100 % CALIDAD</p>
                        <p>14 AÑOS DE EXPERIENCIA</p>
                        <p>599 OBRAS FINALIZADAS</p>
                        <a href="#section3" class="btn btn-info btn-sm">Subir</a>
                        <a href="#section5" class="btn btn-info btn-sm">Bajar</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('img/portada-principal-5.jpg') }}" class="img-fluid"
                            alt="Acerca de Nosotros">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section id="section5" class="bg-light text-dark">
            <div class="container text-center text-md-left">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="{{ asset('img/portada-principal-4.jpg') }}" data-lightbox="gallery"
                                        data-title="...">
                                        <img src="{{ asset('img/portada-principal-4.jpg') }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Fachada Flotantes</h5>
                                        <p class="card-text">Descripción de la fachada flotantes.</p>
                                        <p class="card-text"><small class="text-body-secondary">Duración 25 días obra
                                                bruta.</small></p>
                                        <p class="card-text"><small class="text-body-secondary">Duración 35 días media
                                                obra.</small></p>
                                        <p class="card-text"><small class="text-body-secondary">Duración 15 días
                                                finalización obra.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
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
    </script>
</body>

</html>

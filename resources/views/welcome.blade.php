<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Incluye lightbox2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header id="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg fixed-top">
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
        <section id="section1" style="position: relative;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card animate__animated animate__backInLeft card-principal">
                            <div class="card-body">
                                <h1 class="text-warning fw-bold">REALIZAMOS</h1>
                                <H2 class="text-white fw-bold">FACHADAS FLOTANTES</H2>
                                <a class="btn btn-info" href="#section2">Ver más</a>
                                <!-- Nuevo div con imagen redonda solo en esta sección -->

                            </div>
                        </div>
                    </div>
                </div>
                <div style="position: absolute; bottom: 0; right: 0;">
                    <img src="{{ asset('img/insignia.png') }}" alt="Imagen Redonda" class="img-fluid rounded-circle"
                        width="300" height="300">
                </div>
            </div>
        </section>
        <section id="section2" class="bg-light text-dark">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <a href="{{ asset('img/portada-principal-2.jpg') }}" data-lightbox="gallery"
                                data-title="Imagen 1">
                                <img class="card-img-top" src="{{ asset('img/portada-principal-2.jpg') }}"
                                    alt="Imagen 1">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <a href="{{ asset('img/portada-principal-3.jpg') }}" data-lightbox="gallery"
                                data-title="Imagen 1">
                                <img class="card-img-top" src="{{ asset('img/portada-principal-3.jpg') }}"
                                    alt="Imagen 1">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <a href="{{ asset('img/portada-principal-4.jpg') }}" data-lightbox="gallery"
                                data-title="Imagen 1">
                                <img class="card-img-top" src="{{ asset('img/portada-principal-4.jpg') }}"
                                    alt="Imagen 1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#section3" class="btn btn-primary btn-lg">Bajar</a>
                    <a href="#section1" class="btn btn-primary btn-lg">Subir</a>
                </div>
            </div>
        </section>
        <section id="section3" class="bg-success text-white">
            <h1>Contactos</h1>
            <a href="#section2" class="btn btn-primary btn-lg">Regresar</a>
            <a href="#section4" class="btn btn-primary btn-lg">Bajar</a>
        </section>
        <section id="section4" class="bg-success text-white">
            <h1>Acerca de nosotros</h1>
            <a href="#section3" class="btn btn-primary btn-lg">Regresar</a>
            <a href="#section5" class="btn btn-primary btn-lg">Bajar</a>
        </section>
    </main>
    <footer>
        <section id="section5" class="bg-light text-dark pt-5 pb-4">
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

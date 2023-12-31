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
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold" href="/">LUDEÑO</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="/">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#section2">CATÁLOGOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#section3">CONTÁCTANOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#section4">ACERCA DE NOSOTROS</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('login') }}">INICIAR SESIÓN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('register') }}">REGISTRARSE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section class="bg-light">
            <div class="container">
                <h1>{{ $product->product_name }}</h1>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">
                                    {!! $product->product_extract !!}
                                </p>
                                <p class="card-text">
                                    <small class="text-body-secondary">
                                        {!! $product->product_body !!}
                                    </small>
                                </p>
                                <figure class="figure">
                                    <div class="row">
                                        @foreach ($product->images as $image)
                                            <div class="col">
                                                <a href="{{ Storage::url($image->url) }}"
                                                    data-lightbox="{{ $product->id }}"
                                                    data-title="{{ $product->product_name }}">
                                                    <img src="{{ Storage::url($image->url) }}" class="card-img-top"
                                                        style="height: 250px; object-fit: cover;"
                                                        alt="Imagen Producto {{ $product->id }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <figcaption class="figure-caption text-end">Imágens de la obra.</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h4>Similares en {{ $product->category->category_name }}</h4>
                        @foreach ($similars as $similar)
                            <div class="card text-bg-dark mb-3">
                                <div class="row">
                                    @foreach ($similar->images as $image)
                                        <div class="col">
                                            <img src="{{ Storage::url($image->url) }}" class="card-img"
                                                alt="Product {{ $product->id }}"
                                                style="height: 250px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-img-overlay my-shadown">
                                    <a class="nav-link fw-bold"
                                        href="{{ route('products.show', $similar) }}">{{ $similar->product_name }}</a>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        @foreach ($similar->images as $image)
                                            <img src="{{ Storage::url($image->url) }}" class="img-fluid rounded-start"
                                                alt="...">
                                        @endforeach
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="card-body">
                                            <a class="nav-link card-title"
                                                href="{{ route('products.show', $similar) }}">
                                                {{ $similar->product_name }}
                                            </a>
                                            <p class="card-text">
                                                @foreach ($similar->materials as $material)
                                                    <div class="d-inline">
                                                        <a href="{{ route('products.material', $material) }}"
                                                            class="nav-link badge text-bg-{{ $material->material_color }}">
                                                            {{ $material->material_name }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
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

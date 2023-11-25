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
                                <a class="nav-link text-white fw-bold" href="/">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="#section2">CATÁLOGOS</a>
                            </li>
                            {{-- <li class="nav-item dropdown">
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
                            </li> --}}
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
        <section class="bg-light" style="padding-top: 100px;">
            <div class="container">
                <h1>Categoría: {{ $category->category_name }}</h1>
                @foreach ($products as $product)
                    <div class="card mb-3">
                        <figure style="width: 100%; height: 250px;">
                            @foreach ($product->images as $image)
                                <img src="{{ Storage::url($image->url) }}"
                                    style="width: 100%; height: 100%; object-fit: cover;" class="card-img-top"
                                    alt="...">
                            @endforeach
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="nav-link"
                                    href="{{ route('products.show', $product) }}">{{ $product->product_name }}</a>
                            </h5>
                            <p class="card-text">{!! $product->product_extract !!}</p>
                            <p class="card-text">
                                @foreach ($product->materials as $material)
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
                @endforeach
                <hr>
                <div class="row">
                    <div class="pagination justify-content-end">
                        {{ $products->links() }}
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

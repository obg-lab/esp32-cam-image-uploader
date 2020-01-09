<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <title>ESP32 Cam Uploader</title>
</head>

<body>
    <section class="hero is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    ESP-32 CAM Uploader
                </h1>
                <h2 class="subtitle">
                    Imagens enviadas pela camera.
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="title">
                Lista de imagens
                </h1>

                <div class="columns is-mobile is-multiline">
                    @foreach ($images as $image)
                    <div class="column is-4">
                        <a href="{{ $image->url }}" target="_blank">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-square is-cover">
                                        <img src="{{ $image->url }}" alt="{{ $image->name }}">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <span class="icon">
                                            <i class="fa fa-caret-right"></i>
                                        </span>
                                        {{ $image->name }}
                                        <br>
                                        <time datetime="{{date( "d/m/Y H:i:s", strtotime($image->created_at))}}">
                                            <span class="icon">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                            <span>{{date( "d/m/Y H:i:s", strtotime($image->created_at))}}</span>
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                Feito com
                <span class="icon">
                    <i class="fas fa-heart"></i>
                </span>
                por <a href="https://youtube.com/egermano">Bruno Germano</a>
                <span class="icon">
                    <i class="fas fa-map-pin"></i>
                </span>
                de São Paulo, Brasil.
                <br />
                O código tem licensa
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a> e você pode ver tudo no meu <a
                    href="https://github.com/egermano">github</a>.
                O conteúdo do site tem licensa <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA
                    4.0</a>.
            </p>
        </div>
    </footer>

    <style>
        .image.is-cover {
            position relative;
            overflow: hidden;
        }

        .image.is-cover img {
            display: block;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            transform: translate-x(-50%) translate-y(-50%);
        }
    </style>
</body>

</html>

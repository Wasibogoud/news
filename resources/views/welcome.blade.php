<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Newspaper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-top: 80px; }
        .card { margin-bottom: 1rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">📰 Newspaper, the paper in ethernet</a>
        <div class="ms-auto text-white">
            <span id="clock"></span>
        </div>
    </div>
</nav>

<div class="container">

    <!-- 🗞️ Sección de Noticias -->
    <section>
        <h2 class="my-4">🗞️ Noticias del New York Times</h2>
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-md-4">
                    <div class="card">
                        @if(isset($article['multimedia'][0]['url']))
                            <img src="{{ $article['multimedia'][0]['url'] }}" class="card-img-top" alt="Imagen">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] }}</h5>
                            <p class="card-text">{{ $article['abstract'] }}</p>
                            <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Leer más</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No se encontraron noticias.</p>
            @endforelse
        </div>
    </section>


    <section>
        <h2 class="my-4">🎲 Sorpréndeme</h2>
        <div class="d-flex gap-3 flex-wrap">
            <a href="{{ route('carta.aleatoria') }}" class="btn btn-warning mt-3">
                🃏 Carta Aleatoria de Yu-Gi-Oh!
            </a>
            <button class="btn btn-outline-warning">Rostro falso</button>
            <button class="btn btn-outline-info">Cualquier cosa</button>
        </div>
    </section>

    <!-- 💻 Compilador -->
    <section class="my-5">
        <h2>💻 Compilador (simulado)</h2>
        <textarea class="form-control mb-2" rows="5" placeholder="Escribe tu código aquí..."></textarea>
        <button class="btn btn-secondary">Ejecutar</button>
        <div class="alert alert-light mt-3" role="alert">[Aquí irá la salida]</div>
    </section>

</div>

<!-- 📄 Footer -->
<footer class="text-center py-4 bg-light">
    © 2025 News - Desarrollado por Joseph, chat-gpt, cloude y deepseek.
</footer>

<!-- JS para reloj -->
<script>
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById('clock').textContent = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

</body>
</html>

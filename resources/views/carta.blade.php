<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $carta['name'] ?? 'Carta Aleatoria' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="text-center mb-4">🃏 Carta Aleatoria de Yu-Gi-Oh!</h1>

    @if ($carta)
        <div class="card mx-auto" style="max-width: 540px;">
            <img src="{{ $carta['image_url'] }}" class="card-img-top" alt="{{ $carta['name'] }}">
            <div class="card-body">
                <h4 class="card-title">{{ $carta['name'] }}</h4>
                <p class="card-text"><strong>Tipo:</strong> {{ $carta['type'] }} | <strong>Raza:</strong> {{ $carta['race'] }}</p>
                <p class="card-text">{{ $carta['desc'] }}</p>
                <p><strong>ATK/DEF:</strong> {{ $carta['atk'] }} / {{ $carta['def'] }}</p>
                <p><strong>Nivel:</strong> {{ $carta['level'] }} | <strong>Atributo:</strong> {{ $carta['attribute'] }}</p>
                <a href="{{ $carta['url'] }}" target="_blank" class="btn btn-outline-secondary">Ver en YGOPRODECK</a>
            </div>
        </div>
    @else
        <p class="text-danger">❌ No se pudo cargar la carta.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('carta.aleatoria') }}" class="btn btn-primary">🔁 Mostrar otra carta</a>
    </div>

</body>
</html>

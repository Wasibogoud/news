<h2>🗃️ Noticias almacenadas localmente</h2>

@if($noticias->isEmpty())
    <p>No hay noticias almacenadas aún. Visita la página principal para cargar nuevas.</p>
@else
    <ul>
        @foreach ($noticias as $n)
            <li>
                <a href="{{ $n->url }}" target="_blank">{{ $n->title }}</a>
                <p><small>{{ $n->section }} | {{ $n->published_date }}</small></p>
            </li>
        @endforeach
    </ul>
@endif

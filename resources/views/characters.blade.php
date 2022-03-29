{{-- estendo il layout di default per questa pagina --}}
@extends('layouts.default')

{{-- al titolo da dare a questa pagina specifica assegno "Characters" --}}
@section('pageTitle', 'Characters')
    
{{-- aggiungo qui tutto il contenuto --}}
@section('content')

    <div class="main-content">

        {{-- includo il jumbotron dinamicamente --}}
        @include('partials.jumbotron') 

        {{-- utilizzo javascript per creare una funzione che indirizzi l'utente alla pagina corrispondente al fumetto cliccato --}}
        <script type="text/javascript">
            function myhref(web){
              window.location.href = web;}
        </script>

        <div class="container">

            {{-- ciclo i dati per popolare dinamicamente le cards presenti nella pagina --}}
            @foreach ($data as $key => $item)

                {{-- utilizzo onclick sul div in modo da richiamare la funzione dedicata al redirect della pagina --}}
                {{-- con route() definisco il link da passare tenendo 'fumetto' come base e aggiungo l'indice del fumetto selezionato nella pagina seguente --}}
                <div class="cards" onclick="myhref( '{{ route('fumetto', ['index_fumetto' => $key]) }}' );">

                    {{-- utilizzo la funzione asset() perchè le immagini sono nella cartella public --}}
                    <img src="{{ asset($item['thumb']) }}" alt="{{ $item['title'] }}">
                
                    <h4>{{ $item['title'] }}</h4>
                
                </div>
               

            @endforeach

        </div>

        <div class="load-more">
            <button>LOAD MORE</button>
        </div>

    </div>

    <div class="info">
        <div class="container">
            <ul>

                @foreach ($infos as $item) {{-- ciclo gli elementi dell'array info --}}
                    
                    <li>

                        
                        @if ($loop->last) {{-- se l'immagine ciclata è l'ultima --}}
                            <img class="smaller" src="{{ $item['img'] }}" alt="{{ $item['text'] }}"> {{-- aggiungo una classe "smaller" per renderla più piccola --}}
                            @else
                            <img src="{{ $item['img'] }}" alt="{{ $item['text'] }}"> {{-- altrimenti non aggiungo nessuna classe --}}
                        @endif

                        <a href="{{ $item['url'] }}">{{ $item['text'] }}</a>
                        
                    </li>

                @endforeach
                
            </ul>
        </div>
    </div>

@endsection


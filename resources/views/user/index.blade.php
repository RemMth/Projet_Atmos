@extends('layouts.app')

@section('content')
    @if(Auth::id()==$id)
    <div>
        <h1>
            Bienvenue sur votre espace utilisateur!
        </h1>

        <p class="font-italic">Votre temps de visionnage: {{$heures}}h et {{$minutes}}mins</p>
        <p class="font-italic">Vous avez vu(e) au total : {{$totalEpisodes}} épisodes</p>

        <div>
            <h3>Liste des différentes séries où vous avez vu <b>au moins</b> 1 épisode</h3>
            <div>
                |
            @foreach($seriesVues as $serie)
                <a href="{{route('serie.show', $serie['id'])}}"><span>{{$serie['nom']}}    </span></a>|
                @endforeach
            </div>
        </div>

        <div>
            <h3>La liste de tous vos commentaires validés:</h3>

            @foreach($commentaires as $commentaire)
                @if($commentaire['validated'] == 1)
                    <div class="comment_tocheck">
                        <p>
                            {{$commentaire['content']}}
                        </p>
                        <span>✔️ Note: {{$commentaire['note']}}/10</span>
                        <div>
                            <a class ="btn btn-outline-warning buttonMain"  href="{{route('editComment', $commentaire['id'])}}">Modifier</a>
                        </div>

                        <div>
                            <a class ="btn btn-outline-danger buttonMain"  href="{{route('deleteCommentaireUserSpace', $commentaire['id'])}}">Supprimer</a>
                        </div>
                    </div>
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
    @else
        <p>Vous ne pouvez pas accéder à l'espace client d'une autre personne.</p>
    @endif
@endsection

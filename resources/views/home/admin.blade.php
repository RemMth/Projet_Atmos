@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
</head>


@section('content')
    @if(Auth::check())
        @if(Auth::user()->administrateur==1)
            <div id="admin_comments">
            @foreach($infos as $info)
                <div class="admin_comment">
                    <h2>{{$info->nom}}</h2>
                    @foreach($commentaires as $commentaire)
                        @if($commentaire->serie_id == $info->id)
                            <div>
                                <p></p>
                                <p>{{$commentaire->content}}</p>
                                <p>Note : {{$commentaire->note}}/10</p>
                                <p>
                                    <a class ="btn btn-outline-success buttonMain"  href="{{route('validCommentaireAdmin', $commentaire['id'])}}">Valider ce commentaire.</a>
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            </div>
        @else
            <p>Seul un administrateur peut consulter cette page.</p>
        @endif
    @else
        <p>Seul un administrateur peut consulter cette page.</p>
    @endif
@stop


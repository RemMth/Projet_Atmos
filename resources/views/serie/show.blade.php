@extends('layouts.app')

@section('content')
    @if($serie->id == 26)
        <div class="player_wrapper">
            <iframe src="https://drive.google.com/file/d/1CC1j6sUAduX3d1FLWLEVUisNS3m6DTSm/preview" width="640" height="480"></iframe>
        </div>
    @endif


    @if($serie->id == 13)
        <div class="player_wrapper">
            <iframe src="https://drive.google.com/file/d/18vLI48O8TzPihuYkmfiquBEU-dMButm2/preview" width="640" height="480"></iframe>
        </div>
    @endif

    <div id="serie_info">
        <h2 id="serie_nom">{{$serie->nom}}</h2>

        <div id="serie_img">
            <img id="serie_img_inner" src="{{url($serie->urlImage)}}">
        </div>

        @auth
            @if(Auth::user()->seenSerie($serie['id']) == false)
                <div id="serie_vu">
                    <a class ="btn btn-outline-success buttonMain"  href="{{route('serieSeen', ['idSaison' => $serie['id']])}}">Marquer comme vu(e)</a>
                </div>
            @endif
        @endauth

        <p id="serie_infos">Note presse: {{$serie->note}} - Note utilisateurs: {{$note}} | <a href="#commentaires">{{$nbAvis}} commentaires</a>
            <br> {{$serie->langue}} - {{$serie->statut}}</p>

        <p id="serie_tags">

        @if(!empty($serie->genres))
                @foreach($serie->genres as $genre )
                    <a>{{$genre['nom']}}</a> -
                @endforeach
        @else
            Aucun Tag
        @endif
        </p>

        {!!$serie->resume!!}
    </div>

    <div id="serie_redac">
        @if($serie['avis'] != null)
            <h3>Avis de la rédaction: </h3>
            <p class="serie_redac_avis">{{$serie['avis']}}</p>


            @auth
                @if(Auth::user()->administrateur==1)
                    <div>
                        <a class ="btn btn-outline-warning buttonMain"  href="{{route('editAvis', $serie['id'])}}">Modifier</a>
                    </div>

                    <div>
                        <a class ="btn btn-outline-danger buttonMain"  href="{{route('deleteAvis', $serie['id'])}}">Supprimer</a>
                    </div>
                @endif
            @endauth
        @else
            @auth
                @if(Auth::user()->administrateur==1)
                    <h2>Ajouter l'avis de rédaction</h2>
                    <form action="{{route('ajouterAvis', $serie['id'])}}" method="post">
                        @csrf
                        <p>
                            Contenu :
                            <input type="text" name="avis" id="avis"
                                   value="">
                        </p>
                        <div>
                            <button class="btn btn-success" type="submit">Valider</button>
                        </div>
                    </form>
                @endif
            @endauth
    </div>

    @endif

    <div id="season_list">
        <form action="{{route('serie.show',$serie['id'])}}" method="get">
            <input type="hidden" name="tri" value="{{ $tri }}">
            <select  name="saison" >

                @foreach (range(1, $nbSaisons) as $number)
                    @if($number == $saison)
                        <option  selected="selected" value="{{$number}}" >Saison {{$number}}</option>
                    @else
                        <option value="{{$number}}"  >Saison {{$number}} </option>
                    @endif
                @endforeach

            </select>
            <input class ="btn btn-outline-warning buttonMain" type="submit" value="Valider">
        </form>

        <div>
            <h2>Saison {{$saison}}
                @auth
                    @if(Auth::user()->seenSaison($serie['id'], $saison) == false)
                        <div>
                            <a class ="btn btn-outline-success buttonMain"  href="{{route('saisonSeen', ['idSaison' => $serie['id'], 'num' => $saison])}}">Marquer comme vu(e)</a>
                        </div>
                    @endif
                @endauth

            </h2>
            <table style="margin-bottom: 100px">

                @foreach($serie->episodes as $episode)
                    <div class="season_list_item">
                    @if($saison == $episode['saison'])
                        <span class="season_list_infos">Episode {{$episode['numero']}} <strong>{{$episode['nom']}}</strong> ({{$episode['duree']}} minutes)</span>
                        <span class="season_list_date">{{$episode['premiere']}}</span>

                            @if($episode['urlImage'] != null)
                                <div class="season_list_img"><img class="season_list_img_inner" src="{{url($episode['urlImage'])}}"></div>
                                @endif
                            @auth
                                @if(!(Auth::user()->seen->contains($episode)))
                                    <div>
                                        <a class ="btn btn-outline-success buttonMain"  href="{{route('episodeSeen', $episode['id'])}}">Marquer comme vu(e)</a>
                                    </div>
                                @endif
                            @endauth
                            @if($episode['resume'] != null)
                                {!!$episode['resume']!!}
                            @endif
                    @endif
                    </div>
                @endforeach
            </table>
        </div>

    </div>

    <div id="comment_list">
        <h2 id="commentaires">Liste des commentaires:</h2>
        <form action="{{route('serie.show', $serie['id'])}}" method="get">
            <input type="hidden" name="saison" value="{{ $saison }}">
            <select name="tri">
                @if($tri=='noteDecroissante')
                    <option value="noteDecroissante" selected="selected" type="submit">Trier par meilleure note</option>
                    <option value="noteCroissante" type="submit">Trier par moins bonne note</option>
                @else
                    <option value="noteCroissante" selected="selected">Trier par moins bonne note</option>
                    <option value="noteDecroissante" >Trier par meilleure note</option>
                @endif
            </select>
            <input class ="btn btn-outline-warning buttonMain" type="submit" value="Valider">
        </form>

        @if(Auth::check())
            @if(Auth::user()->administrateur==1)
                @foreach($commentaires as $commentaire)


                        @if($commentaire['validated'] == 1)
                        <div class="comment_tocheck">
                            <p>
                                {{$commentaire['content']}}
                            </p>
                            <p>Rédigé le: {{$commentaire['created_at']}}</p>
                            <p>Dernière modification le: {{$commentaire['updated_at']}}</p>
                            <span>✔️ Note: {{$commentaire['note']}}/10</span>
                            <div>
                                <a class ="btn btn-outline-danger buttonMain"  href="{{route('unvalidCommentaire', $commentaire['id'])}}">Invalider ce commentaire.</a>
                            </div>
                            <div>
                                <a class ="btn btn-outline-warning buttonMain"  href="{{route('editComment', $commentaire['id'])}}">Modifier</a>
                            </div>
                        </div>
                        <hr>
                        @elseif($commentaire['validated'] == 0)
                        <div class="comment_tocheck">
                            <p>
                                {{$commentaire['content']}}
                            </p>
                            <p>Rédigé le: {{$commentaire['created_at']}}</p>
                            <p>Dernière modification le: {{$commentaire['updated_at']}}</p>
                            <span>❌ Note: {{$commentaire['note']}}/10</span>
                            <div>
                                <a class ="btn btn-outline-success buttonMain"  href="{{route('validCommentaire', $commentaire['id'])}}">Valider ce commentaire.</a>

                            </div>

                            <div>
                                <a class ="btn btn-outline-warning buttonMain"  href="{{route('editComment', $commentaire['id'])}}">Modifier</a>

                            </div>

                            <div>
                                <a class ="btn btn-outline-danger buttonMain"  href="{{route('deleteCommentaire', $commentaire['id'])}}">Supprimer</a>

                            </div>

                        </div>
                        <hr>
                        @endif


                @endforeach
            @elseif(Auth::user()->administrateur==0)
                @foreach($commentaires as $commentaire)


                        @if($commentaire['validated'] == 1)
                        <div class="comment_tocheck">
                            <p>
                                {{$commentaire['content']}}
                            </p>

                            <p>Rédigé le: {{$commentaire['created_at']}}</p>
                            <p>Dernière modification le: {{$commentaire['updated_at']}}</p>
                            <span>✔️ Note: {{$commentaire['note']}}/10</span>
                            @if($commentaire['user_id']==Auth::user()->id)
                                <div>
                                    <a class ="btn btn-outline-warning buttonMain"  href="{{route('editComment', $commentaire['id'])}}">Modifier</a>
                                </div>
                            @endif
                        </div>
                        <hr>
                        @endif
                @endforeach
            @endif





                <div class="add_comment">
                <h2>Ajouter un commentaire</h2>
                    <form action="{{route('creerCommentaire', $serie['id'])}}" method="post">
                        @csrf
                        <p>
                            Contenu :
                            <input type="text" name="content" id="content"
                                   value="">
                        </p>

                        <p>
                            Note/10 :
                            <input type="text" name="note" id="note"
                                   value="" maxlength="2">
                        </p>
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="serie_id" id="serie_id" value="{{$serie['id']}}">

                        <div>
                            <button class="btn btn-success" type="submit">Valider</button>
                        </div>
                    </form>
            </div>
        @else
            @foreach($commentaires as $commentaire)


                @if($commentaire['validated'] == 1)
                    <div class="comment_tocheck">
                        <p>
                            {{$commentaire['content']}}
                        </p>
                        <span>✔️ Note: {{$commentaire['note']}}/10</span>
                    </div>
                    <hr>
                @endif
            @endforeach
        @endif
    </div>
@endsection



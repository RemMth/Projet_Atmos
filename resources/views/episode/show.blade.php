@extends('layouts.app')

@section('content')
    <div id="episode_info">
        <h2 id="episode_nom">{{$episode->nom}}</h2>
        <div id="episode_img">
            <img id="episode_img_inner" src="{{url($episode->urlImage)}}">
        </div>
        <p id="episode_infos">Saison {{$episode->saison}} épisode {{$episode->numero}} </p>

        <p id="episode_time">Durée: {{$episode->duree}} minutes</p>

        <p id="episode_desc">Sortie: {!!$episode->premiere!!}</p>

        {!!$episode->resume!!}
    </div>

    <div id="episode_btn">
        <a class ="btn btn-outline-warning buttonMain" href="{{route('serie.show',$episode['serie_id'])}}">Retour à la série</a>
    </div>

@endsection

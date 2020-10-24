@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
</head>

@section('content')
    <form action="{{route('home.categorie')}}" method="get">
        <select name="genre">
            <option value="All" @if($cat == "All") selected @endif>Tous</option>
            @foreach($genres as $genre)
                <option value="{{$genre}}"  @if($cat == $genre) selected @endif name="genre" id="genre">{{$genre}}</option>
            @endforeach

        </select>
        <input class ="btn btn-outline-warning buttonMain" type="submit" value="Valider">
        <a class ="btn btn-outline-danger buttonMain"  href="{{route('home.categorie')}}">Réinitialiser</a>
    </form>

    <div class = "container-fluid">
        <?php
        $cpt = 1;
        ?>
        @foreach($series as $serie)
                <?php $cpt ++; ?>
        @if($cpt%2 == 0)
            <div class="nfserie">
                <div id="nfserie_img"><img src="{{url($serie['urlImage'])}}"></div>
                <h2 id="nfserie_title">{{$serie['nom']}}</h2>
                <span id="nfserie_tags">
                    @if(!empty($serie->genres))
                        @foreach($serie->genres as $genre )
                            <a>{{$genre['nom']}} </a>
                        @endforeach
                            </span>
                @else
                    <p>Aucun Tag</p>
                @endif
                <span id="nfserie_desc">{!! $serie['resume']  !!}</span>
                <p id="nfserie_esp"><a class="btn btn-outline-custom1" href="./serie/{{$serie->id}}">En savoir plus ></a></p>
            </div>
        @elseif($cpt%2 != 0)
            <div class="nfdserie">
                <div id="nfdserie_img"><img src="{{url($serie['urlImage'])}}"></div>
                <h2 id="nfdserie_title">{{$serie['nom']}}</h2>
                <span id="nfdserie_tags">
                    @if(!empty($serie->genres))
                        @foreach($serie->genres as $genre )
                            <a>{{$genre['nom']}} </a>
                        @endforeach
                            </span>
                @else
                    <p>Aucun Tag</p>
                @endif
                <span id="nfdserie_desc">{!! $serie['resume']  !!}</span>
                <p id="nfdserie_esp"><a  class="btn btn-outline-custom2" href="./serie/{{$serie->id}}">En savoir plus ></a></p>
            </div>
        @endif
        @endforeach
    </div>
@stop

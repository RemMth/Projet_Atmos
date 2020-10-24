@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
</head>

@section('content')
    <div class = "container-fluid">
        <?php
        $cpt = 1;
        ?>
        @foreach($infos as $info) <?php $cpt ++; ?>
            @if($cpt%2 == 0)
                <div class="nfserie">
                    <div id="nfserie_img"><img src="{{url($info['urlImage'])}}"></div>
                    <h2 id="nfserie_title">{{$info['nom']}}</h2>
                    <span id="nfserie_tags">
                    @if(!empty($info->genres))
                        @foreach($info->genres as $genre )
                            <a>{{$genre['nom']}} </a>
                            @endforeach
                            </span>
                            @else
                                <p>Aucun Tag</p>
                            @endif
                    <span id="nfserie_desc">{!! $info['resume']  !!}</span>
                    <p id="nfserie_esp"><a class="btn btn-outline-custom1" href="./serie/{{$info->id}}">En savoir plus ></a></p>
                </div>
            @elseif($cpt%2 != 0)
                <div class="nfdserie">
                    <div id="nfdserie_img"><img src="{{url($info['urlImage'])}}"></div>
                    <h2 id="nfdserie_title">{{$info['nom']}}</h2>
                    <span id="nfdserie_tags">
                    @if(!empty($info->genres))
                        @foreach($info->genres as $genre )
                            <a>{{$genre['nom']}} </a>
                            @endforeach
                            </span>
                            @else
                                <p>Aucun Tag</p>
                            @endif
                    <span id="nfdserie_desc">{!! $info['resume']  !!}</span>
                    <p id="nfdserie_esp"><a  class="btn btn-outline-custom2" href="./serie/{{$info->id}}">En savoir plus ></a></p>
                </div>
            @endif
        @endforeach
    </div>
@stop

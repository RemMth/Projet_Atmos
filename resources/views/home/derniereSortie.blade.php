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
        @foreach($recents as $recent) <?php $cpt ++; ?>
            @if($cpt%2 == 0)
                <div class="nfserie">
                    <div id="nfserie_img"><img src="{{url($recent['urlImage'])}}"></div>
                    <h2 id="nfserie_title">{{$recent['nom']}}</h2>
                    <span id="nfserie_tags">{{$recent->premiere}}</span>
                    <span id="nfserie_desc">{!! $recent['resume']  !!}</span>
                    <p id="nfserie_esp"><a class="btn btn-outline-custom1" href="./serie/{{$recent->id}}">En savoir plus ></a></p>
                </div>
            @elseif($cpt%2 != 0)
                <div class="nfdserie">
                    <div id="nfdserie_img"><img src="{{url($recent['urlImage'])}}"></div>
                    <h2 id="nfdserie_title">{{$recent['nom']}}</h2>
                    <span id="nfdserie_tags">{{$recent->premiere}}</span>
                    <span id="nfdserie_desc">{!! $recent['resume']  !!}</span>
                    <p id="nfdserie_esp"><a class="btn btn-outline-custom2" href="./serie/{{$recent->id}}">En savoir plus ></a></p>
                </div>
            @endif
        @endforeach
    </div>
@stop

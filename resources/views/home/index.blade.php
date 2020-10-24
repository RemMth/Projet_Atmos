@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
</head>

@section('content')
    <div class = "container-fluid">
        <?php
        $tab = array();
        $cpt = 1;
        ?>
        @for($i = 0; $i < 5; $i++)
            <?php
            $rand = random_int(1, 44);
            while(in_array($rand, $tab)):
                $rand = random_int(1, 44);
            endwhile;
            $tab[] = $rand;
            $cpt ++;
            ?>
            @foreach($series as $serie)
                @if($serie['id'] == $rand && $cpt%2 == 0)
                    <div class="nfserie">
                        <div id="nfserie_img"><img id="nfserie_img_item" src="{{url($serie['urlImage'])}}"></div>
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
                        </span>
                        <span id="nfserie_desc">{!! $serie['resume']  !!}</span>
                        <p id="nfserie_esp"><a class="btn btn-outline-custom1" href="{{route('serie.show', $rand)}}">En savoir plus ></a></p>
                    </div>
                    @elseif($serie['id'] == $rand && $cpt%2 != 0)
                        <div class="nfdserie">
                            <div id="nfdserie_img"><img id="nfdserie_img_item" src="{{url($serie['urlImage'])}}"></div>
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
                                </span>
                                <span id="nfdserie_desc">{!! $serie['resume']  !!}</span>
                                <p id="nfdserie_esp"><a class="btn btn-outline-custom2" href="{{route('serie.show', $rand)}}">En savoir plus ></a></p>
                        </div>
                @endif
            @endforeach
        @endfor
    </div>
@stop

@extends('layouts.app')

@section('content')
    <h1>Ancien Avis</h1>
    <p><b>Contenu</b> : {{$serie['avis']}}</p>

    <hr>


    <form action="{{route('majAvis', $serie['id'])}}" method="post">
        @csrf
        <p>
            Nouvel avis
            <input type="text" name="avis" id="avis"
                   value="" maxlength="150">
        </p>

        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
@endsection

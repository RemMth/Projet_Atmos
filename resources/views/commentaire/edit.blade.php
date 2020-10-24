@extends('layouts.app')

@section('content')
<h1>Ancien commentaire</h1>
<p><b>Contenu</b> : {{$commentaire['content']}}</p>
<p><b>Note</b> : {{$commentaire['note']}}</p>

<hr>


<form action="{{route('updateCommentaire', $commentaire->id)}}" method="post">
    @csrf
    <p>
        Nouveau Commentaire
        <input type="text" name="content" id="content"
               value="" maxlength="150">
    </p>

    <p>
        Note/10
        <input type="text" name="note" id="note"
               value="" maxlength="2">
    </p>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
@endsection

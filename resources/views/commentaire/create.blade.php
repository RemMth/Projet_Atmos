@extends('layout.master')
{{--
   messages d'erreurs dans la saisie du formulaire.
--}}

@section('content')
    <div class="content">
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--
             FORMULAIRE DE CREATION DE COMMENTAIRE
          --}}
        <a href="{{route('serie.show')}}"><button>Retour à la liste</button></a>
        <form action="{{route('commentaire.store')}}" method="POST">
            {!! csrf_field() !!}
            <div class="text-center" style="margin-top: 2rem">
                <h3>Ajout d'un commentaire</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div>
                {{-- le nom  --}}
                <label for="content"><strong>Votre commentaire : </strong></label>
                <input type="text" name="content" id="content">
            </div>

            <div>
                <button class="btn btn-success" type="submit">Valide</button>
            </div>

        </form>
    </div>

@endsection

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Episode;
use App\Serie;
use App\User;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        $tri = $request->query('tri', 'noteDecroissante');
        if($tri == 'noteDecroissante'){
            $commentaires = Comment::orderby('note', 'desc')->where('serie_id', '=', $id)->get();
        }else if($tri == 'noteCroissante'){
            $commentaires = Comment::orderby('note')->where('serie_id', '=', $id)->get();
        }
        $saison = $request->query('saison', '1');
        $episode = Episode::find($id);
        $serie = Serie::find($id);
        $nbSaisons = Episode::where('serie_id','=', $id)->max('saison');
        $note = Comment::where('serie_id', '=', $id)->Where('validated','=',1)->avg('note');
        $nbAvis = Comment::where('serie_id', '=', $id)->Where('validated','=',1)->count();



        return view('serie.show', ['serie' => $serie, 'nbSaisons' => $nbSaisons, 'episode' => $episode, 'note' => $note, 'commentaires' => $commentaires, 'saison'=>$saison, 'tri'=>$tri, 'nbAvis'=>$nbAvis]);
    }

    public function ajouterAvis(Request $request, $id){
        $serie = Serie::find($id);

        $serie->avis = $request->avis;

        $serie->save();

        return back();
    }

    public function editAvis(Request $request, $id){
        $serie = Serie::find($id);
        return view('avis.edit', ['serie' => $serie]);
    }

    public function majAvis(Request $request, $id){
        $serie = Serie::find($id);

        $serie['avis'] = $request['avis'];

        $serie->save();

        return redirect(route('serie.show', $serie['id']));
    }

    public function deleteAvis(Request $request, $id){
        $serie = Serie::find($id);

        $serie->avis = null;

        $serie->save();

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

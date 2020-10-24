<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Episode;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $commentaires = Comment::where('user_id', '=', $id)->get();

        $totalSeen = Episode::join('seen', 'episodes.id', '=', 'seen.episode_id')->where('seen.user_id', '=', $id)->sum('episodes.duree');

        $totalEpisode = DB::table('seen')->where('user_id', $id)->count();

        $seriesVues = Episode::join('seen', 'seen.episode_id', 'episodes.id')->join('series', 'series.id', 'episodes.serie_id' )->select('series.nom', 'series.id')->distinct()
        ->where('seen.user_id', $id)->get();

        $heures = intdiv($totalSeen,60);
        $minutes = $totalSeen%60;


        return view('user.index', ['commentaires' => $commentaires, 'id' => $id, 'heures' => $heures, 'minutes' => $minutes, 'totalEpisodes' => $totalEpisode, 'seriesVues' => $seriesVues]);
    }

    public function serieVue($idSerie){
        $ids = Serie::find($idSerie)->episodes()->pluck('id')->toArray();
        Auth::user()->seen()->attach($ids);

        return back();

    }

    public function saisonVue($idSaison, $num){
        $ids = Serie::find($idSaison)->episodes()->where('saison', $num)->pluck('id')->toArray();

        Auth::user()->seen()->attach($ids);

        return back();
    }



    public function episodeVu($idEpisode){
        Auth::user()->seen()->attach($idEpisode);

        return back();

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
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

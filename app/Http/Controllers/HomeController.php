<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Genre;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $series = Serie::all();
        return view('home.index',  ['series' => $series]);
    }

    public function recent(){
        $recents = Serie::orderby('premiere', 'desc')->limit(5)->get();
        return view('home.derniereSortie', ['recents' => $recents]);
    }

    public function top(){
        $tops = Comment::groupBy('serie_id')->select('serie_id', DB::raw('count(*) as nbCom'))->orderby('nbCom', 'desc')->limit(5)->get();
        $ids = [];
        foreach($tops as $t)
            $ids[] = $t->serie_id;
        $infos = Serie::whereRaw("id in (".implode(",",$ids).")")->get();
        return view('home.topTendances', ['tops' => $tops], ['infos' => $infos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin(){
        $commentaires = Comment::where('validated', 'like', 0)->get();
        $ids = [];
        foreach($commentaires as $c)
            $ids[] = $c->serie_id;
        $infos = Serie::whereRaw("id in (".implode(",",$ids).")")->get();
        return view('home.admin', ['commentaires' => $commentaires], ['infos' => $infos]);
    }

    public function cat(Request $request) {
        $cat = $request->query('genre', 'All');
        if ($cat != 'All') {
        $series = Genre::where("nom", $cat)->first()->series;
        } else {
            $series = Serie::all();
        }
        $genres = Genre::distinct('nom')->pluck('nom');
        return view('home.categorie', ['series' => $series, 'genres' => $genres,'cat'=>$cat]);
    }

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

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Serie;
use Illuminate\Http\Request;

class CommentaireController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'content' => 'required',
                'note' => 'required'
            ]
        );

        $commentaire = new Comment;

        $commentaire->content = $request['content'];
        $commentaire->note = $request['note'];
        $commentaire->validated = 0;
        $commentaire->user_id = $request['user_id'];
        $commentaire->serie_id = $request['serie_id'];

        $commentaire->save();

        return redirect(route('serie.show', $commentaire['serie_id']));
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
        $commentaire = Comment::find($id);
        return view('commentaire.edit', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $commentaire = Comment::find($id);
        $this->validate(
            $request,
            [
                'content' => 'required',
                'note' => 'required'
            ]
        );

        $commentaire->content = $request['content'];
        $commentaire->note = $request['note'];
        $commentaire->validated = 0;

        $commentaire->save();

        return redirect(route('serie.show', $commentaire['serie_id']));


    }

    public function unValid($id){
        $commentaire = Comment::find($id);

        $commentaire['validated'] = 0;

        $commentaire->save();

        return redirect(route('serie.show', $commentaire['serie_id']));
    }

    public function valid($id){
        $commentaire = Comment::find($id);

        $commentaire->validated = 1;

        $commentaire->save();

        return redirect(route('serie.show', $commentaire['serie_id']));
    }

    public function validAdmin($id){
        $commentaire = Comment::find($id);

        $commentaire->validated = 1;

        $commentaire->save();

        return redirect(route('home.admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentaire = Comment::find($id);
        $idSerie = $commentaire['serie_id'];
        $commentaire->delete();

        return redirect(route('serie.show', $idSerie));
    }

    public function destroyUserSpace($id)
    {
        $commentaire = Comment::find($id);
        $idUser = $commentaire['user_id'];
        $commentaire->delete();

        return redirect(route('accueilUser', $idUser));
    }
}

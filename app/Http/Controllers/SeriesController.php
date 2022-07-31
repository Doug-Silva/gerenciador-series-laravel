<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        /*
        | query ordenada por nomes
        | exemplo:
        | $series = Serie::query()->orderBy('nome')->get();
        */
        $series = Serie::all();

        /*
        | pode utilizar a função compact('series'));
        | exemplo:
        | return view('listar-series', compact('series'));
        */
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();
        return redirect('/series');
    }
}

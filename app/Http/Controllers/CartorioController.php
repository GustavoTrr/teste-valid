<?php

namespace App\Http\Controllers;

use App\Models\Cartorio;
use App\Models\Cartorio as ModelsCartorio;
use Illuminate\Http\Request;

class CartorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartorios = ModelsCartorio::all();
        return view('cartorios.index', ['page_title' => 'Cartórios', 'cartorios' => $cartorios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cartorios.form', ['page_title' => 'Cartórios', 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cartorio::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function show(Cartorio $cartorio)
    {
        return view('cartorios.form', ['page_title' => 'Cartórios', 'cartorio' => $cartorio, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Cartorio $cartorio)
    {
        return view('cartorios.form', ['page_title' => 'Cartórios', 'cartorio' => $cartorio, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cartorio $cartorio)
    {
        return $cartorio->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cartorio $cartorio)
    {
        //
    }

    /**
     * Altera o Cartório para o status ativo.
     *
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function ativar(Cartorio $cartorio)
    {
        return $cartorio->ativar();
    }

    /**
     * Altera o Cartório para o status desativado.
     *
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function desativar(Cartorio $cartorio)
    {
        return $cartorio->desativar();
    }
}

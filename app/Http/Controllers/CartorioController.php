<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartorioRequest;
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
    public function store(CartorioRequest $request)
    {
        try {
            if (!Cartorio::create($request->all())) {
                throw new \Exception("Houve um problema ao tentar salvar o Cartório!", 1);
                
            }
        } catch (\Throwable $th) {
            return redirect()->route('cartorios.index')->with('error', $th->getMessage());
        }

        return redirect()->route('cartorios.index')->with('success', 'Contact updated!');
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
    public function update(CartorioRequest $request, Cartorio $cartorio)
    {
        try {
            if (!$cartorio->update($request->all())) {
                throw new \Exception("Houve um problema ao tentar atualizar o Cartório!", 1);
                
            }
        } catch (\Throwable $th) {
            return redirect()->route('cartorios.index')->with('error', $th->getMessage());
        }

        return redirect()->route('cartorios.index')->with('success', 'Contact updated!');
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
        try {
            if (!$cartorio->ativar()) {
                throw new \Exception("Erro ao tentar ativar o cartório", 1);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }

        return response()->json([
            'status' => true,
            'msg' => 'Cartório ativado com sucesso!'
        ]);
    }

    /**
     * Altera o Cartório para o status desativado.
     *
     * @param  \App\Cartorio  $cartorio
     * @return \Illuminate\Http\Response
     */
    public function desativar(Cartorio $cartorio)
    {
        try {
            if (!$cartorio->desativar()) {
                throw new \Exception("Erro ao tentar desativar o cartório", 1);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }

        return response()->json([
            'status' => true,
            'msg' => 'Cartório desativado com sucesso!'
        ]);
    }
}

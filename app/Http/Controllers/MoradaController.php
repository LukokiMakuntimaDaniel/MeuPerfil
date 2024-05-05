<?php

namespace App\Http\Controllers;

use App\Models\Morada;
use Illuminate\Http\Request;

class MoradaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $usuario_id)
    {
        try {
            $dadosValidados = $request->validate(Morada::rules());
            $dadosValidados['usuario_id'] = $usuario_id;
            $morada = Morada::create($dadosValidados);
            return $morada;
        } catch (\Throwable $th) {
            throw $th;
        }
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
        try {
            $dadosValidados = $request->validate(Morada::rules());
            $morada = Morada::where("usuario_id", $id)->first();
            $morada->update($dadosValidados);
            return $morada;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

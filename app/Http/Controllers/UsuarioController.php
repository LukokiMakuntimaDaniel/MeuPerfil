<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meusDados = Usuario::with(['morada'])->first();
        return view("index", compact('meusDados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $dadosValidados = $request->validate(Usuario::rules());
            $usuario = Usuario::create($dadosValidados);
            $moradaController = new MoradaController();
            $moradaController->store($request, $usuario->id);

            $caminhoImagem = public_path('imagemUser');
            if ($request->hasFile('imagem')) {
                $imagem = $request->file('imagem');
                $nomeImagem = $this->actualizarOnomeDaImagemApoisOcadastro($usuario->id, $imagem->getClientOriginalExtension());
                $imagem->move($caminhoImagem, $nomeImagem);
            }

            $meusDados = Usuario::with(['morada'])->first();
            return Redirect::back()->with('success', 'Dados Actualizados com sucesso verifique a sessão dos dados.')->with('meusDados', $meusDados);
        } catch (\Throwable $th) {
            $meusDados = Usuario::with(['morada'])->first();
            return Redirect::back()->with('error', 'Ocorreu um erro ao actualizar o usuario verifique os dados.')->with('meusDados', $meusDados);
        }
    }

    /**
     * actualizar o nome da imagem juntando o id o nome imagem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function actualizarOnomeDaImagemApoisOcadastro($id, $estensao)
    {
        $usuario = Usuario::find($id);
        $usuario->nomeImagem = "imagem" . $id . "." . $estensao;
        $usuario->update();
        return "imagem" . $id . "." . $estensao;;
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
            $dadosValidados = $request->validate(Usuario::rules());
            $usuario = Usuario::find($id);
            $usuario->update($dadosValidados);
            $moradaController = new MoradaController();
            $moradaController->update($request, $usuario->id);
            $meusDados = Usuario::with(['morada'])->first();
            return Redirect::back()->with('success', 'Dados Actualizados com sucesso verifique a sessão dos dados.')->with('meusDados', $meusDados);
        } catch (\Throwable $th) {
            $meusDados = Usuario::with(['morada'])->first();
            return Redirect::back()->with('error', 'Ocorreu um erro ao actualizar o usuario verifique os dados.')->with('meusDados', $meusDados);
        }
    }
}

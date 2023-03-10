<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComentarioStoreRequest;
use App\Models\Comentario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ComentarioController extends Controller
{
    public function index()
    {
        Comentario::all();
        return view();
    }

    public function store(ComentarioStoreRequest $request, $id)
    {
        $comentarios = new Comentario;
        $usuario = auth()->user();

        $comentarios->user_id = $usuario->id;
        $comentarios->pergunta_id = $id;
        $comentarios->mensagem = $request->comment;

        $comentarios->save();
        return redirect('/perguntas/' . $id)->with('msg', 'Comentário Enviado com Sucesso');
    }
}
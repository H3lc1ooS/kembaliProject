<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerguntaStoreRequest;
use App\Models\{
    Pergunta,
    User
};

class PerguntaController extends Controller
{
    public function index()
    {
        $perguntas = Pergunta::orderBy('updated_at', 'desc')->get(); //Para organizar do mais recente ao mais antigo
        return view('pergunta.index', ['perguntas' => $perguntas]);
    }

    public function create()
    {
        return view('pergunta.create');
    }

    public function store(PerguntaStoreRequest $request)
    {
        $perguntas = new Pergunta;
        $usuario = auth()->user();

        if ($request->hasFile('image')) {

            $imagem = $request->file('image');
            $extensao = $imagem->extension();
            $nome_imagem = md5($imagem->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $imagem->move(public_path('img/perguntas'), $nome_imagem);

            $perguntas->imagem = $nome_imagem;
        }


        $perguntas->user_id = $usuario->id;
        $perguntas->pergunta = $request->pergunta;
        $perguntas->save();

        return redirect(route('index.pergunta'))->with('msg', 'Pergunta Enviada com Sucesso');
    }

    public function show($id)
    {
        $pergunta = Pergunta::findOrFail($id);
        return view('pergunta.show', ['pergunta' => $pergunta]);
    }

    public function dashboard()
    {
        $usuario = auth()->user();
        $perguntas = $usuario->perguntas;

        return view('pergunta.dashboard', ['perguntas' => $perguntas, 'usuario' => $usuario]);
    }

    public function perfil($id)
    {
        $usuario = user::findOrFail($id);
        $perguntas = $usuario->perguntas;

        if (auth()->user()->id == $id) {

            return redirect(route('dashboard'))->with('perguntas', $perguntas)->with('usuario', $usuario);
        }

        return view('pergunta.profile', ['perguntas' => $perguntas, 'usuario' => $usuario]);
    }
}
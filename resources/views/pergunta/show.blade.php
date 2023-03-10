<x-layouts.second title="Post">
    <x-layouts.headers.second-header title="Post" />

    <section class="post-area">
        <section id="postInfo" class="flex space-between align-center">
            <section class="left flex align-center">
                <a href="/perfil/{{ $pergunta->user->id }}/{{ $pergunta->user->name }}"
                    id="username">{{ $pergunta->user->name }}</a>
            </section>

            <p>{{ $pergunta->updated_at->format('j/ m/ Y') }}</p>
        </section>

        <section class="content">
            <p id="text">{{ $pergunta->pergunta }}</p>

            @if ($pergunta->imagem != null)
                <section class="post-image-area">
                    <img src="/img/perguntas/{{ $pergunta->imagem }}" width="500px" height="300px">
                </section>
            @endif
        </section>

        <p id="tagName">#<span>Português</span></p>
    </section>

    <section class="comments-area">
        @foreach ($pergunta->comentarios as $comentário)
            <section class="comment-card">
                <section class="comment-card-header flex space-between">
                    <a href="" id="username">{{ $comentário->user->name }}</a>
                    <p>{{ $comentário->updated_at->format('j/ m/ Y') }}</p>
                </section>

                <p class="comment">{{ $comentário->mensagem }}</p>
            </section>
        @endforeach
    </section>

    <form class="create-comment flex align-center" action="/comentarios/pergunta={{ $pergunta->id }}" method="post">
        @csrf
        <textarea name="comment" id="create-comment-textarea" maxlength="255" minlength="3"
            placeholder="Escreva aqui o seu comentário"></textarea>
        <button type="submit " class="flex align-center justify-center comment-button">
            <ion-icon name="caret-forward-outline" id="send-comment"></ion-icon>
        </button>
    </form>
</x-layouts.second>

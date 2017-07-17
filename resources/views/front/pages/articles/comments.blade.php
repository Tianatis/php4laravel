<article class="post" id="comments">
    <header class="entry-header">
        <h3 class="entry-title">Комментарии</h3>
    </header>
    <div class="entry-content">
        <div class="clear">
            @if($article->comment)
                @include('front.parts.blocks.show_comments', ['parent_id'=> null])
                @can('create', App\Models\Comment::class)
                    <h2 class="comment-title">Ваш комментарий</h2>
                    @include('front.parts.forms.comment')
                @endcan
            @else
                Пользователи ещё не оставили своих комментариев к этой статье.
                @can('create', App\Models\Comment::class)
                    <div class="show_comment_box">(<a>Будьте первым!</a>)</div>
                    <div class="comment_hidden_form">
                        @include('front.parts.forms.comment')
                    </div>

                @endcan
            @endif
        </div>
        @cannot('create', App\Models\Comment::class)
            <div>(<a href="{{ route('login') }}">Войдите, чтобы оставить комментарий</a>)</div>
        @endcannot
    </div>
    <footer class="entry-footer">
        <div class="clear">Пользователи оставили {{ comments_count(count($article->comment)) }} </div>
    </footer>
</article>
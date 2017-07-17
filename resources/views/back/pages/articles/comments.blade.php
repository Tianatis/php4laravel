<article class="post" id="comments">
    <header class="entry-header">
        <h3 class="entry-title">Комментарии</h3>
    </header>
    <div class="entry-content">
        <div class="clear">
            @if($article->comment)
                @include('back.parts.blocks.show_comments', ['parent_id'=> null])
                <div class="show_comment_box"><a>Комментировать</a></div>
                <div class="comment_hidden_form">
                    @include('back.parts.forms.comment')
                </div>
            @else
                Пользователи ещё не оставили своих комментариев к этой статье.
                <div class="show_comment_box"><a>Комментировать</a></div>
                <div class="comment_hidden_form">
                    @include('back.parts.forms.comment')
                </div>
            @endif
        </div>
    </div>
    <footer class="entry-footer">
        <div class="clear">Пользователи оставили {{ comments_count(count($article->comment)) }} </div>
    </footer>
</article>
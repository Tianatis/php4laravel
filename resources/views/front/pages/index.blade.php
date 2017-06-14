@extends('front.layouts.main')
@section('bottom_scripts')
    <script language="javascript" src="{{ URL::asset('js/mobilyslider.js') }}?{{ sha1(microtime(true)) }}" type="text/javascript" charset="utf-8"></script>
@endsection
@section('head_styles')
    <link href="{{ URL::asset('css/slider.css') }}?{{ sha1(microtime(true)) }}" rel="stylesheet" type="text/css">
@endsection
@section('page_content')
    <article class="post sticky">
        <header class="entry-header">
           <h1 style="text-align:center">Приветствуем!</h1>
        </header>
        <!-- .entry-header -->

        <div class="entry-content">
               @include('front.parts.blocks.slider')
        </div>
        <!-- .entry-content -->
        <footer class="entry-footer">
            <div class="clear">
                <div class="ingrid-social-share">
                    <div class="share-links">Статей на сайте: {{ count($articles) }} </div>
                </div>

                <div class="comment-link"></div>
            </div>
        </footer>
        <!-- .entry-footer -->

    </article><!-- #post-## -->

    @include('front.parts.all_articles')

@endsection


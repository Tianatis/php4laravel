@extends('front.layouts.page_content')
@section('page_content')
    @parent
    @section('header_class') default_error_header @endsection

    @section('block')
        <div class="entry-content">
            @include('front.parts.blocks.error')
        </div>
    @endsection

    @section('share')
        <div class="error_details">{{ $errorDetails or '' }}</div>
    @endsection
@endsection
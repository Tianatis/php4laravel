@extends('back.layouts.main')

@section('page_content')
    <div class="add_button_top"><a id="btn_sumb" href="/{{ config('app.admin_panel_keyword') }}/administrators/add">Добавить администратора</a></div>
    @include('back.parts.all_administrators')
@endsection


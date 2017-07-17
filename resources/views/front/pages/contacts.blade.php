@extends('front.layouts.page_content')

@section('page_content')
	@parent
	@section('block')
        <div class="entry-content">
			@can('sendMessage', \App\Models\User::class)
				@include('front.parts.forms.contact_form')
			@else
				<p>Форма обратной связи доступна только авторизованным пользователям.</p>
				<a href="{{ route('login') }}">Войти</a>
			@endcan

        </div>
	@endsection
@endsection




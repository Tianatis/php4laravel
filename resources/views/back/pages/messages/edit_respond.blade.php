@extends('back.layouts.page_content')
@section('page_content')
	<article  class="post">
		<header class="entry-header">
			<h1 class="entry-title">Редактирование ответа</h1>
		</header>
		<!-- .entry-header -->
		<div>Сообщение:</div>
		<div><strong>{{ $message->user->name }} </strong>  &nbsp;
			<span>{{ (date('d.m.Y h:i',strtotime($message->created_at))) }}</span></div>
		<div> {{ $message->message }}</div>

		<div class="entry-new">
			@include('back.parts.forms.edit_respond')
		</div>
		<!-- .entry-content -->

		<footer class="entry-footer">
			<div class="clear">
				<div class="ingrid-social-share">
					<div class="share-links">
						@if (Session::has('response') &&  Session::get('response.position')=== 'embed')
							@include('back.parts.response')
						@endif
					</div>
				</div>
			</div>
		</footer>
		<!-- .entry-footer -->
	</article>
@endsection


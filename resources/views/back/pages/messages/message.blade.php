@extends('back.layouts.page_content')
@section('page_content')
    @if ($message)
	<article  class="post">
		<header class="entry-header">
			<h1 class="entry-title">Просмотр сообщения</h1>
		</header>
		<!-- .entry-header -->
		<div class="entry-new">Сообщение:</div>
		<div>
			<strong>{{ $message->user->name }}</strong>  &nbsp;
			<span>({{ date('d.m.Y h:i',strtotime($message->created_at)) }})</span>:
		</div>
		<div> {{ $message->message }}</div>
		<div class="entry-new">
			<div>Ответы:</div>
		</div>
		@if(isset($message->respond))
			@foreach ($message->respond as $respond)
				<div class="clear">
					<div class="resp item"><div class="resp-img"></div>
						<strong>{{ $respond->admin->name }}</strong>  &nbsp;
						<span>({{ date('d.m.Y h:i',strtotime($respond->created_at)) }})</span>:
						<div>{{ $respond->respond }}</div>

					</div>
					<div class="option_mess"><a class="btn_sumb" href="{{ route('back.pages.messages.edit.respond', ['id' => $respond->id]) }}">Редактировать</a></div> &nbsp;
					<div class="option_mess"><a class="btn_sumb" href="{{ route('back.pages.messages.delete.respond', ['id' => $respond->id]) }}">Удалить</a></div>
			</div>
			@endforeach
   		@endif

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
    @endif
@endsection		


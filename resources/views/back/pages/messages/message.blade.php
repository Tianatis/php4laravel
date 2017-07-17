@extends('back.layouts.page_content')
@section('page_content')
    @if ($message)
	<article  class="post">
		<header class="entry-header">
			<h1 class="entry-title">Просмотр сообщения</h1>
		</header>
		<!-- .entry-header -->
		<div class="mess_content">

				<a class="delete-mess-img" title="Удалить" href="{{ route('back.pages.messages.delete', ['id' => $message->id]) }}"></a>
				<a class="respond-mess-img" href="{{ route('back.pages.messages.add.respond', ['id' => $message->id]) }}" title="Ответить"></a>

			<strong>{{ $message->user->name }}</strong>  &nbsp;
			<span>({{ date('d.m.Y h:i',strtotime($message->created_at)) }})</span>:
		</div>
		<div class="entry-content"> {{ $message->message }}</div>
		<div class="entry-new">
			<div>Ответы:</div>
		</div>
		@if(isset($message->respond))
			@foreach ($message->respond as $respond)
				<div class="clear">
					<div class="resp item">
						<div class="mess_opts">
							<a class="delete-mess-img" title="Удалить" href="{{ route('back.pages.messages.delete.respond', ['id' => $respond->id]) }}"></a>
							<a class="edit-resp-img edit_respond" href="{{ route('back.pages.messages.edit.respond', ['id' => $respond->id]) }}"></a>
						</div>
						<strong>{{ $respond->admin->name }}</strong>  &nbsp;
						<span>({{ date('d.m.Y h:i',strtotime($respond->created_at)) }})</span>:
						<div>{{ $respond->respond }}</div>

					</div>
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


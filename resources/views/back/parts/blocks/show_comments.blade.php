@if(isset($comments[$parent_id]) && count($comments[$parent_id])>0)
	<div class="item_box">
		@foreach($comments as $line_id => $line)
			@if($line_id == $parent_id)
				@foreach($line as $item)
					<div class="item">
						<strong>{{ $item->user->name }}</strong>  &nbsp;
						<span>({{ date('d.m.Y h:i',strtotime($item->created_at)) }})</span>:
						<div class="comment_content">{{ $item->text }}</div>
						<div class="comment_opts">
								<a class="delete-comment-img" title="Удалить" href="{{ route('back.pages.comments.deleteComment', ['id' => $item->id]) }}"></a>
								<a class="add-comment-img"></a>
						</div>
							<div class="comment_hidden_form">
								<h2 class="entry-title">Ваш комментарий</h2>
								@include('back.parts.forms.comment' , ['comment_id' => $item->id])
							</div>
					</div>
						@include('back.parts.blocks.show_comments', ['parent_id'=>$item->id])
					@endforeach
				@endif
		@endforeach
	</div>

@endif

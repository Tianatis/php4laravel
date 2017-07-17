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
							@can('delete', $item)
								<a class="delete-comment-img" title="Удалить" href="{{ route('front.pages.comments.deleteComment', ['id' => $item->id])  }}"></a>
							@endcan
							@can('create', App\Models\Comment::class)
								<a class="add-comment-img"></a>
							@endcan
						</div>
						@can('create', App\Models\Comment::class)
							<div class="comment_hidden_form">
								<h2 class="entry-title">Ваш комментарий</h2>
								@include('front.parts.forms.comment' , ['comment_id' => $item->id])
							</div>
						@endcan
					</div>
						@include('front.parts.blocks.show_comments', ['parent_id'=>$item->id])
					@endforeach
				@endif
		@endforeach
	</div>

@endif

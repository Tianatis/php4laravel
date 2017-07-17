@if(isset($search_result) && count($search_result)> 0)
	@foreach($search_result as $res)
	<li class="li_qwick_search_res @if($loop->last) last_result @endif">
		<div class="qwick_search_result_val">
			<a href="{{ route('article', ['slug' => $res->slug])  }}">{{ $res->title }}</a>
		</div>
	</li>
	@endforeach
@else
	<li></div>
		<div class="qwick_search_result_val">Ничего не найдено!</div>
	</li>
@endif


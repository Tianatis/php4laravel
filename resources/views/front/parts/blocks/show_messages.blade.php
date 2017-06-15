@foreach ($messages as $one)
	<div class="clear">
		<div class="item"><div class="item-img"></div>
			<strong>{{ $one['message']['name'] }}</strong>  &nbsp; 
			<span>({{ date('d.m.Y h:i',strtotime($one['message']['dt'])) }})</span>:
			@if($auth)
				<div id="delete_mess">(<a href="/messages/delete/{{ $one['message']['id_message'] }}">Удалить</a>)</div>
				<div id="respond_mess">(<a href="/responds/add/<{{ ['message']['id_message'] }}">Ответить</a>)</div>
			@endif
			
			<div>{{ $one['message']['message'] }}</div>
			
		</div>
		@if($one['responds'])
		@foreach ($one['responds'] as $resp)
			<div class="resp"><div class="resp-img"></div>
				<strong>{{ $resp['responder_name'] }}</strong>  &nbsp; 
				<span>({{ date('d.m.Y h:i',strtotime($resp['dta'])) }})</span>:
				@if($auth)
					<div id="delete_mess">(<a href="/responds/delete/{{ $resp['id_resp'] }}">Удалить</a>)</div>
				@endif
				
				<div>{{ $resp['respond_text'] }}</div>
				
			</div>
		@endforeach
		@endif
		
	</div>
@endforeach
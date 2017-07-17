<header id="search">

		<div id="qwick_search" title="Введите {{ $search_word or 'название статьи или фразу для поиска' }}">
			<img src="{{ URL::asset('images/search.png') }}" class="search-img">
			<input type="text" id="new_qwick_search" placeholder="Введите {{ $search_word or 'название статьи или фразу для поиска' }}" autocomplete="off" onkeyup="
					qwick_search(
					this.value,
					'{{ csrf_token() }}',
					'{{ $search_type or 'blog' }}'
					);"
				   autofocus class="qwick_search_input" name="search_{{ $search_type or 'blog' }}">
			<div id="qwick_search_result">
				<ul id="list_qwick_search_result"></ul>
			</div>
		</div>
</header>


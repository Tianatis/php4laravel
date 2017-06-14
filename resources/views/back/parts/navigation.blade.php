<header>
	<nav id="site-navigation" role="navigation">
		<div class="container">
			<ul class="menu nav-menu">
				@if (isset($menu) && count($menu) > 0)
					@foreach ($menu as $item)
                        <?php $item->link = str_replace('PANEL', config('app.admin_panel_keyword'),  $item->link); ?>
						@if(strpos(Request()->getPathInfo(), $item->link))
                            <?php $item->class = ' class="active" '; ?>
						@endif

						@if(!$item->need_auth && !($item->name == 'login' && $auth))
							<li><a href="{{ $item->link }}"{{ $item->class or '' }}>{{ $item->title }}</a></li>
						@else
							@if($auth && $item->name != 'registration' && $item->name != 'login')
								@if(!$item->admin_only)
									<li><a href="{{ $item->link }}"{{ $item->class or '' }}>{{ $item->title }}</a></li>
								@else
									@if($isAdmin)
										<li><a href="{{ $item->link }}"{{ $item->class or '' }}>{{ $item->title }}</a></li>
									@endif
								@endif
							@endif
						@endif
					@endforeach
				@endif
			</ul>
		</div>
	</nav>
</header>
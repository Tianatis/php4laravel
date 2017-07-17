<header>
	@if($isAdmin)
		<div id="admin_status">
			@if($isAuthAdmin)
				Вы зашли как администратор
				(<a href="{{ route('back.panel.logout') }}">Выйти</a>)
			@else
				Вы не авторизованы как администратор
				(<a href="{{ route('back.panel.login') }}">Войти</a>)
			@endif
		</div>
	@endif
	<nav class="site-navigation" role="navigation">
			<ul class="menu nav-menu">
				@if (isset($menu) && count($menu) > 0)
					@foreach ($menu as $item)
						<?php $item->link = str_replace('PANEL', config('app.admin_panel_keyword'),  $item->link); ?>
						@if(Request()->getPathInfo() == $item->link)
							<?php $item->class = 'active'; ?>
						@endif
						@if(!$item->need_auth && !(($item->name == 'login' || $item->name == 'registration') && $auth))
							<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
						@else
							@if($auth && ($item->name != 'registration' && $item->name != 'login'))
								@if(!$item->admin_only)
									@if($item->name == 'add')
										@if($isAuthor)
											<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
										@endif
									@else
										<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
									@endif
								@else
									@if($isAdmin)
										@if($item->name == 'panel')
											@if($isAuthAdmin)
												<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
											@endif
										@else
											<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
										@endif
									@endif

								@endif
							@endif
						@endif
					@endforeach
				@endif
			</ul>
	</nav>
</header>
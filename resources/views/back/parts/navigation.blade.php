@if($isAuthAdmin)
	<header>
		<nav class="site-navigation" role="navigation">
				<ul class="menu nav-menu">
					@if (isset($menu) && count($menu) > 0)
						@foreach ($menu as $item)
							@foreach ($item->role as $role)
								@if($role->id == $role_id)
									<?php $item->link = str_replace('PANEL', config('app.admin_panel_keyword'),  $item->link); ?>
										@if(Request()->getPathInfo() == $item->link)
											<?php $item->class = 'active'; ?>
										@endif

									@if($item->name == 'add_admin')
										@if($isAuthAdmin)
											<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
										@endif
									@else
										<li><a href="{{ $item->link }}" class="{{ $item->class or '' }}">{{ $item->title }}</a></li>
									@endif
								@endif
							@endforeach
						@endforeach
					@endif
				</ul>
		</nav>
	</header>
@endif
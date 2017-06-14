@if (Session::has('authError')) <p class="error">{{ Session::get('authError') }}</p> @endif
@if (Session::has('articleError')) <p class="error">{{ Session::get('articleError') }}</p> @endif
@if (Session::has('articleSucces'))<p class="succes">{{ Session::get('articleSucces') }}</p> @endif
@if (Session::has('authSucces'))<p class="succes">{{ Session::get('authSucces') }}</p> @endif



<div class="slider @if (isset($slides) && count($slides)> 0)slide-start" @endif >
	<div class="sliderContent">
		@if (isset($slides) && count($slides)> 0)
			@foreach ($slides as $slide)
			<div class="slide">
				<img src="{{ URL::asset('images/slider/'. $slide->src) }}" alt="{{ $slide->text }}"/>
				<p class="slide-text">
					{{ $slide->text }}
				</p>
			</div>
			@endforeach
		@else
			<div class="slide-plug">
				<img src="{{ URL::asset('images/herbe.jpg') }}" id="img-plug"/>
				<p class="slide-text">
					На нашем блоге!
				</p>
			</div>
		@endif
	</div>
</div>






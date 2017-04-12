<h1 class="page-header">
	<div style="display:flex; justify-content:space-between;">

		<span>
			<i class="fa fa-{{ $icon }}" ></i> {{ $action }} {{ str_singular($item) }}
		</span>

		<span>
			<a href="{{ route($item. '.index') }}">
				All {{ $item }}
			</a>
		</span>

	</div>
</h1>
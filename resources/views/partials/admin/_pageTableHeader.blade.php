<h1 class="page-header">
	<div style="display:flex; justify-content:space-between;">

		<span>
			<i class="fa fa-{{ $icon }}" ></i> All {{ $item }}
		</span>

		<span>
			<a href="{{ route($item. '.create') }}">
				Create {{ str_singular($item) }}
			</a>
		</span>

	</div>
</h1>
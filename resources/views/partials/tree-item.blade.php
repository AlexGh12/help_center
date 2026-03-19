@if(isset($item['children']))
	<div class="folder-item">
		<a class="nav-link folder-toggle" data-bs-toggle="collapse" href="#folder-{{ Str::slug($item['path']) }}" role="button">
			<i class="bi bi-chevron-right me-1"></i>
			<i class="bi bi-folder me-1"></i>
			{{ $item['name'] }}
		</a>
		<div class="collapse show folder-children" id="folder-{{ Str::slug($item['path']) }}">
			@each('HelpCenter::partials.tree-item', $item['children'], 'item')
		</div>
	</div>
@else
	<a class="nav-link {{ isset($selectedFile) && $selectedFile == $item['path'] ? 'active' : '' }}"
		href="{{ route('help_center') }}?file={{ $item['path'] }}">
		<i class="bi bi-file-text me-1"></i>
		{{ $item['name'] }}
	</a>
@endif

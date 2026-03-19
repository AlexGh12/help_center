@extends('ChangeLog::layout')

@section('title', 'Index')

@section('css')
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('breadcrumb_btns')
	<a class="btn btn-sm btn-success" href="{{ route('help_center') }}">
		<i class="bi bi-plus"></i>
		Agregar
	</a>
@endsection

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the
						content.</p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('javascript')
	<script>
		const deleteButton = function(formId, name) {
			Swal.fire({
				title: 'Eliminar',
				text: '¿Seguro que quieres eliminar "' + name + '"?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si eliminar',
			}).then((result) => {
				if (result.isConfirmed) {
					document.getElementById(formId).submit();
				}
			})
		}
	</script>
@endsection

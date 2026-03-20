<script>
	@if (session('alert'))
		let alert = @json(session('alert'));

		Swal.fire({
			title: alert.status.charAt(0).toUpperCase() + alert.status.slice(1),
			text: alert.mensaje,
			icon: alert.status,
			confirmButtonText: 'Ok'
		});
	@endif
</script>

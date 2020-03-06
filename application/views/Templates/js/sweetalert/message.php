<script>
	const flashdatadanger = $('.flashdatadanger').data('flashdatadanger');
	const flashdatasuccess = $('.flashdatasuccess').data('flashdatasuccess');


	if (flashdatadanger) {
		Swal.fire({
		icon: 'error',
		title: 'Oopps...',
		html: flashdatadanger
		});
	}

	if (flashdatasuccess) {
		Swal.fire({
		icon: 'success',
		title: 'Berhasil',
		html: flashdatasuccess
		});
	}
</script>
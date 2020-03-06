<script>

	$('.delete-pemesanan').click(function(e) {

		e.preventDefault();

		const pemesanan_id = $(this).data('id');

		Swal.fire({
		  title: 'Yakin Ingin Di Hapus?',
		  text: "Kamu Tidak Akan Melihat Data Ini lagi Setelah Dihapus!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus Data Ini!',
		  cancelButtonText: 'Kembali'
		}).then((result) => {
		  if (result.value) {
		    
		  	document.location.href='http://localhost/penjualan-buku/info/deletepemesanan/'+pemesanan_id;

		  }
		})

	});
	
	const flashdata = $('.flashdata').data('flashdata');

	if (flashdata) {
		Swal.fire({
		icon: 'success',
		title: 'Berhasil',
		html: flashdata
		});
	}

	$('.delete-buku').click(function(e) {

		e.preventDefault();

		const buku_id = $(this).data('id');

		Swal.fire({
		  title: 'Yakin Ingin Di Hapus?',
		  text: "Kamu Tidak Akan Melihat Data Ini lagi Setelah Dihapus!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus Data Ini!',
		  cancelButtonText: 'Kembali'
		}).then((result) => {
		  if (result.value) {
		    
		  	document.location.href='http://localhost/penjualan-buku/data/deletebuku/'+buku_id;

		  }
		})

	});

	$('.delete-user').click(function(e) {

		e.preventDefault();

		const user_id = $(this).data('id');

		Swal.fire({
		  title: 'Yakin Ingin Di Hapus?',
		  text: "Kamu Tidak Akan Melihat Data Ini lagi Setelah Dihapus!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya, Hapus Data Ini!',
		  cancelButtonText: 'Kembali'
		}).then((result) => {
		  if (result.value) {
		    
		  	document.location.href='http://localhost/penjualan-buku/data/deleteuser/'+user_id;

		  }
		})

	});
	

</script>
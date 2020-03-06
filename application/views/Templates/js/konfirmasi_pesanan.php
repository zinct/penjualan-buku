<script>
	
	$(document).ready(function() {
		
		$('.konfirmasi').click(function() {

			const pesanan_id = $(this).data('id');
			const pendapatan = $(this).data('pendapatan');
			const jumlah_buku = $(this).data('jumlah');
			const buku_id = $(this).data('buku');
			
			$('.input-id').val(pesanan_id);
			$('.input-pendapatan').val(pendapatan);
			$('.input-jumlah').val(jumlah_buku);
			$('.input-buku').val(buku_id);

		});

		$('.gagalkan').click(function() {

			const pesanan_id = $(this).data('id');

			$('.input-gagal-id').val(pesanan_id);

		});

	});

</script>
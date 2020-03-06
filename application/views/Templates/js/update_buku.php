<script>

	$(document).ready(function() {

		$('#btn-insert').click(function() {

			$('#submit-insert').attr('name', 'insert');
			$('#image').prop('required', 'true');

			$('#nama').val('');
			$('#image').val('');
			$('#stok').val('');
			$('#harga').val('');
			$('#input-image').val('');
			$('#input-extension').val('');

		});

		$('.update-buku').click(function() {
			const id = $(this).data('id');
			const image = $(this).data('image');

			$('#submit-insert').attr('name', 'update');
			$('#image').removeAttr('required');
			
			$.ajax({
				url: "<?= BASE_URL('Ajax/index'); ?>",
				type: 'post',
				dataType: 'json',
				data: {id : id, image: image},
				success: function(data) {

					console.log(data);

					const image = data.image;
					const images = image.split('.');

					$('#id-buku').val(data.id);
					$('#input-image').val(images[0]);
					$('#input-extension').val(images[1]);
					$('#nama').val(data.nama_buku);
					$('#harga').val(data.harga);
					$('#stok').val(data.stok);

				}
			});
			

		});

	});

</script>
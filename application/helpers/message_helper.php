<?php 

function message_helper()
{
	$ci =& get_instance();
	if ($ci->session->flashdata('success')) { ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Berhasil!</strong> <?= $ci->session->flashdata('success'); ?>.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>	
	<?php }
	 elseif ($ci->session->flashdata('warning')) { ?>
	 	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Warning!</strong> <?= $ci->session->flashdata('warning'); ?>.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	 <?php }
	 elseif ($ci->session->flashdata('danger')) { ?>
	 	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Kesalahan!</strong> <?= $ci->session->flashdata('danger'); ?>.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	 <?php }
}
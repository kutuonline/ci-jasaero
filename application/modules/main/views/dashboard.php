<?php
	defined ('BASEPATH') OR exit ('No direct script access allowed');

	if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!-- OVERVIEW -->
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Dashboard</h3>
		<p class="panel-subtitle">Today: <?php echo date('l, d F Y'); ?></p>
	</div>
	<div class="panel-body">
		<div class="row">
			<center><img src='<?php echo base_url('assets/img/logo-JAE.jpg');?>' class='img-responsive' style='width:75%'></center>
		</div>
		<div class="row"></div>
	</div>
</div>
<!-- END OVERVIEW -->

		

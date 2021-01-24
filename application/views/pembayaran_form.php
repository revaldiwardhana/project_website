<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">FORM</strong> TRANSAKSI
          </div>
                
                      <div class='card-body'>
        <form action="<?php echo $action; ?>" method="post">
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Id User <?php echo form_error('id_user') ?>
          <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          No Order <?php echo form_error('no_order') ?>
          <input type="text" class="form-control" name="no_order" id="no_order" placeholder="No Order" value="<?php echo $no_order; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Tanggal Bayar <?php echo form_error('tanggal_bayar') ?>
          <input type="text" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Bayar" value="<?php echo $tanggal_bayar; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Nominal Pembayaran <?php echo form_error('nominal_pembayaran') ?>
          <input type="text" class="form-control" name="nominal_pembayaran" id="nominal_pembayaran" placeholder="Nominal Pembayaran" value="<?php echo $nominal_pembayaran; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Bukti Transfer <?php echo form_error('bukti_transfer') ?>
          <input type="text" class="form-control" name="bukti_transfer" id="bukti_transfer" placeholder="Bukti Transfer" value="<?php echo $bukti_transfer; ?>" />
          </div>
          </div>
	    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" /> 
	    <div class="row mt-4">
                      <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
	
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
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
          Id Bus <?php echo form_error('id_bus') ?>
          <input type="text" class="form-control" name="id_bus" id="id_bus" placeholder="Id Bus" value="<?php echo $id_bus; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Id Paket <?php echo form_error('id_paket') ?>
          <input type="text" class="form-control" name="id_paket" id="id_paket" placeholder="Id Paket" value="<?php echo $id_paket; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Id Order <?php echo form_error('id_order') ?>
          <input type="text" class="form-control" name="id_order" id="id_order" placeholder="Id Order" value="<?php echo $id_order; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Id Supir <?php echo form_error('id_supir') ?>
          <input type="text" class="form-control" name="id_supir" id="id_supir" placeholder="Id Supir" value="<?php echo $id_supir; ?>" />
          </div>
          </div>
	    <input type="hidden" name="id_surat_tugas" value="<?php echo $id_surat_tugas; ?>" /> 
	    <div class="row mt-4">
                      <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat_tugas') ?>" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
	
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
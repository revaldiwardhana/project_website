<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">FORM</strong> SURAT TUGAS
          </div>
                
          <div class='card-body'>
            <form action="<?php echo $action; ?>" method="post">
	    
              <div class="row">
                <div class="col-md-12 form-group">
                Pemesanan <?php echo form_error('id_pemesanan') ?>
                <?=form_dropdown('id_pemesanan',$pemesanan_list, $id_pemesanan,'class="form-control" id="id_pemesanan"')?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                No POLISI <?php echo form_error('no_polisi') ?>
                <input type="text" class="form-control" name="no_polisi" id="no_polisi" value="<?php echo $no_polisi; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">        
                Bus <?php echo form_error('id_bus') ?>
                <?=form_dropdown('id_bus',$bus_list, $id_bus,'class="form-control" id="id_bus"')?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">        
                Supir <?php echo form_error('id_supir') ?>
                <?=form_dropdown('id_supir',$supir_list, $id_supir,'class="form-control" id="id_supir"')?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                Warna bus <?php echo form_error('warna_bus') ?>
                <input type="text" class="form-control" name="warna_bus" id="warna_bus" value="<?php echo $warna_bus; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                Kernet <?php echo form_error('kernet') ?>
                <input type="text" class="form-control" name="kernet" id="kernet" value="<?php echo $kernet; ?>" />
                </div>
              </div>
	    
              <div class="row">
                <div class="col-md-12 form-group">
                Uang Saku <?php echo form_error('uang_saku') ?>
                <input type="text" class="form-control" name="uang_saku" id="uang_saku" value="<?php echo $uang_saku; ?>" />
                </div>
              </div>
	    
              <input type="hidden" name="id_surat_tugas" value="<?php echo $id_surat_tugas; ?>" /> 
	            <div class="row mt-4">
                <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                <a href="<?php echo site_url('admin/surat_tugas') ?>" class="btn btn-default">Cancel</a>
                </div>
              </div>
	
          </div>
        </div>
    </div>
  </div>
</div><!-- .animated -->
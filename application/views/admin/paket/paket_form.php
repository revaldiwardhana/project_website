<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">INFO</strong> PAKET
          </div>
                
                      <div class='card-body'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Jenis Paket <?php echo form_error('jenis_paket') ?>
          <input type="text" class="form-control" name="jenis_paket" id="jenis_paket" value="<?php echo $jenis_paket; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Jumlah Hari <?php echo form_error('jumlah_hari') ?>
          <input type="text" class="form-control" name="jumlah_hari" id="jumlah_hari" value="<?php echo $jumlah_hari; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Harga Paket <?php echo form_error('harga_paket') ?>
          <input type="text" class="form-control" name="harga_paket" id="harga_paket" value="<?php echo $harga_paket; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Rute1 <?php echo form_error('rute1') ?>
          <input type="text" class="form-control" name="rute1" id="rute1" value="<?php echo $rute1; ?>" />
          </div>
          </div>
	    
        <!-- <div class="row">
          <div class="col-md-12 form-group">
          Rute2 <?php echo form_error('rute2') ?>
          <input type="text" class="form-control" name="rute2" id="rute2" value="<?php echo $rute2; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Rute3 <?php echo form_error('rute3') ?>
          <input type="text" class="form-control" name="rute3" id="rute3" value="<?php echo $rute3; ?>" />
          </div>
          </div> -->
	    
        <div class="row">
          <div class="col-md-3 form-group">
           <?php echo form_error('gambar1') ?>
          <label for="gambar1" class="btn btn-info">Upload Gambar 1</label>
          <input hidden type="file" class="form-control" name="gambar1" id="gambar1" />
          </div>

          <div class="col-md-3 form-group">
           <?php echo form_error('gambar2') ?>
          <label for="gambar2" class="btn btn-info">Upload Gambar 2</label>
          <input hidden type="file" class="form-control" name="gambar2" id="gambar2" />
          </div>

          <div class="col-md-3 form-group">
          <?php echo form_error('gambar3') ?>
          <label for="gambar3" class="btn btn-info">Upload Gambar 3</label>
          <input hidden type="file" class="form-control" name="gambar3" id="gambar3" />
          </div>
          </div>
	    <input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>" /> 
	    <div class="row mt-4">
                      <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/paket') ?>" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
	
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
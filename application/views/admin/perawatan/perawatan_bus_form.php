<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">PERAWATAN</strong> BUS
          </div>
                
          <div class='card-body'>
            <form action="<?php echo $action; ?>" method="post">
          
              <div class="row">
                <div class="col-md-12 form-group">
                  Bus <?php echo form_error('id_bus') ?>
                  <?=form_dropdown('id_bus',$bus_list, $id_bus,'class="form-control" id="id_bus"')?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                Warna Bus <?php echo form_error('warna_bus') ?>
                <input type="text" class="form-control" name="warna_bus" id="warna_bus" value="<?php echo $warna_bus; ?>" />
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                Jenis Perawatan <?php echo form_error('jenis_perawatan') ?>
                <input type="text" class="form-control" name="jenis_perawatan" id="jenis_perawatan" value="<?php echo $jenis_perawatan; ?>" />
                </div>
              </div>
    
              <div class="row">
                <div class="col-md-12 form-group">
                Tanggal Perawatan Bus <?php echo form_error('tanggal_perawatan_bus') ?>
                <input autocomplete="off" type="text" class="form-control" name="tanggal_perawatan_bus" id="tanggal_perawatan_bus" value="<?php echo $tanggal_perawatan_bus; ?>" />
                </div>
              </div>
    
              <div class="row">
                <div class="col-md-12 form-group">
                Harga <?php echo form_error('harga') ?>
                <input type="value" class="form-control" name="harga" id="harga" value="<?php echo $harga; ?>" />
                </div>
              </div>

              <input type="hidden" name="id_perawatan_bus" value="<?php echo $id_perawatan_bus; ?>" /> 
              <div class="row mt-4">
                <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('admin/perawatan') ?>" class="btn btn-default">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div><!-- .animated -->
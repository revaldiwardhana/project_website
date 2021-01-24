<!-- Main content -->
<div class="animated fadeIn">
  <div class='row'>
    <div class="mx-auto col-offet-2 col-md-8">
        <div class='card'>
          <div class='card-header'>
            <strong class="card-title">DATA</strong> DIRI
          </div>
                
                      <div class='card-body'>
        <form action="<?php echo $action; ?>" method="post">
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Nama Lengkap <?php echo form_error('nama_lengkap') ?>
          <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" />
          </div>
          </div>
          
        <div class="row">
          <div class="col-md-12 form-group">
          Username <?php echo form_error('username') ?>
          <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Alamat <?php echo form_error('alamat') ?>
          <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          No Telp <?php echo form_error('no_telp') ?>
          <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo $no_telp; ?>" />
          </div>
          </div>
	    
        <div class="row">
          <div class="col-md-12 form-group">
          Password <?php echo form_error('password') ?>
          <input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>" />
          <?=$button == 'Update' ? '<small class="form-text text-muted">Kosongkan password jika tidak ingin merubah password lama</small>' : ''?>
          </div>
          </div>
	    
        
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <div class="row mt-4">
                      <div class="col-md-12 form-group"><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/supir') ?>" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
	
        </div>
      </div>
    </div>
  </div>
</div><!-- .animated -->
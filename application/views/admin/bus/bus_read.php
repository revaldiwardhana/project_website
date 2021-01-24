
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Bus Read</h3>
        <table class="table table-bordered">
	    <tr><td>Jenis Bus</td><td><?php echo $jenis_bus; ?></td></tr>
	    <tr><td>Fasilitas Bus</td><td><?php echo $fasilitas_bus; ?></td></tr>
	    <tr><td>Jumlah Tempat Duduk</td><td><?php echo $jumlah_tempatduduk; ?></td></tr>
      <tr><td>Jumlah Bus</td><td><?php echo $jumlah_bus; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/bus') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Pembayaran Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>No Order</td><td><?php echo $no_order; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $tanggal_bayar; ?></td></tr>
	    <tr><td>Nominal Pembayaran</td><td><?php echo $nominal_pembayaran; ?></td></tr>
	    <tr><td>Bukti Transfer</td><td><?php echo $bukti_transfer; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
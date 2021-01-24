
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-12'>
                    <a class='btn btn-outline-primary' href='#' role='button'><i class='fa fa-pencil-square-o'></i> Add PEMBAYARAN</a>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
		    <th>Id User</th>
		    <th>No Order</th>
		    <th>Tanggal Bayar</th>
		    <th>Nominal Pembayaran</th>
		    <th>Bukti Transfer</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pembayaran_data as $pembayaran)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pembayaran->id_user ?></td>
		    <td><?php echo $pembayaran->no_order ?></td>
		    <td><?php echo $pembayaran->tanggal_bayar ?></td>
		    <td><?php echo $pembayaran->nominal_pembayaran ?></td>
		    <td><?php echo $pembayaran->bukti_transfer ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('pembayaran/read/'.$pembayaran->id_pembayaran),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
			echo '  '; 
			echo anchor(site_url('pembayaran/update/'.$pembayaran->id_pembayaran),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
			echo '  '; 
			echo anchor(site_url('pembayaran/delete/'.$pembayaran->id_pembayaran),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.content -->
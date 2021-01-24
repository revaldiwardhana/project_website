
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div hidden class='row mb-3'>
                <div class='col-md-12 text-right'>
                    <a class='btn btn-primary btn-sm' href='<?=base_url('admin/penyewa/create')?>' role='button'><i class='fa fa-pencil-square-o'></i> Tambah User Baru</a>
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
		    <th>Nama Lengkap</th>
		    <th>Alamat</th>
		    <th>No Telp</th>
		    <th>Username</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $user->nama_lengkap ?></td>
		    <td><?php echo $user->alamat ?></td>
		    <td><?php echo $user->no_telp ?></td>
		    <td><?php echo $user->username ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('admin/penyewa/read/'.$user->id_user),'<i class="fa fa-eye"></i>',array('title'=>'detail')); 
			//echo '  '; 
			// echo anchor(site_url('admin/penyewa/update/'.$user->id_user),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit')); 
			// echo '  '; 
			// echo anchor(site_url('admin/penyewa/delete/'.$user->id_user),'<i class="fa fa-trash-o"></i>','title="delete" onclick="javasciprt: return confirm(\'Apakah anda yakin ?\')"'); 
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
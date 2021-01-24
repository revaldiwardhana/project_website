
        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                               
                            <tbody>
                                <tr>
                                    <td width="30%">Nama Supir</td>
                                    <td><?=$supir->nama_lengkap ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?=$supir->alamat ?></td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td><?=$supir->no_telp ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url('admin/supir')?>"class="btn btn-primary">Kembali</a>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.content -->

        <!-- Main content -->
        <div class='animated fadeIn'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                               
                            <tbody>
                                <tr>
                                    <td width="30%">Bus</td>
                                    <td><?=$perawatan_bus_data->jenis_bus ?></td>
                                </tr>
                                <!-- <tr>
                                    <td width="30%">No Polisi</td>
                                    <td><?=$perawatan_bus_data->no_polisi ?></td>
                                </tr> -->
                                <tr>
                                    <td>Jenis Perawatan</td>
                                    <td><?=$perawatan_bus_data->jenis_perawatan ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perawatan</td>
                                    <td><?=date('d-m-Y',strtotime($perawatan_bus_data->tanggal_perawatan_bus)) ?></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><?=number_format($perawatan_bus_data->harga) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url('admin/perawatan')?>"class="btn btn-primary">Kembali</a>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.content -->
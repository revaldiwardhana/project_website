
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
                                    <td><?=$surat_tugas->nama_lengkap ?></td>
                                </tr>
                                <tr>
                                    <td>Kernet</td>
                                    <td><?=$surat_tugas->kernet ?></td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td><?=$surat_tugas->jenis_paket ?></td>
                                </tr>

                                <tr>
                                    <td>Rute</td>
                                    <td><?=$surat_tugas->rute1 ?></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Berangkat & Kembali</td>
                                    <td><?=$surat_tugas->tanggal_keberangkatan.' - '.$surat_tugas->tanggal_kembali ?></td>
                                </tr>

                                <tr>
                                    <td>No Polisi</td>
                                    <td><?=$surat_tugas->no_polisi ?></td>
                                </tr>

                                <tr>
                                    <td>Jenis Bus</td>
                                    <td><?=$surat_tugas->jenis_bus ?></td>
                                </tr>
                                <tr>
                                    <td>Warna Bus</td>
                                    <td><?=$surat_tugas->warna_bus ?></td>
                                </tr>
                                <tr>
                                    <td>Uang Saku</td>
                                    <td><?=number_format($surat_tugas->uang_saku) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?=base_url('admin/surat_tugas')?>"class="btn btn-primary">Kembali</a>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.content -->
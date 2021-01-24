
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">PEMESANAN PENDING</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Tanggal Pemesanan</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Lokasi Penjemputan</th>
                            <th>Paket</th>
                            <th>Tanggal Berangkat</th>
                            <th>Harga Sewa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pending as $row){?>
                            <tr>
                            <td><?=date('d-m-y H:i',strtotime($row->tanggal_pesan))?></td>
                            <td><?=$row->nama_pemesanan?></td>
                            <td><?=$row->no_telp?></td>
                            <td><?=$row->alamat?></td>
                            <td><?=$row->jenis_paket?></td>
                            <td><?=date('d-m-Y H:i',strtotime($row->tanggal_keberangkatan))?></td>
                            <td><?=number_format($row->total_harga)?></td>
                            </tr>
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">PEMESANAN TELAH DIBAYAR</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Tanggal Pemesanan</th>
                            <th>Bukti Pembayaran</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Lokasi Penjemputan</th>
                            <th>Paket</th>
                            <th>Tanggal Berangkat</th>
                            <th>Harga Sewa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dibayar as $row){?>
                            <tr>
                            <td><?=date('d-m-y H:i',strtotime($row->tanggal_pesan))?></td>
                            <td><a target="_blank" href="<?=base_url('upload/bukti_bayar/'.$row->bukti_bayar)?>">bukti transfer <i class="fa fa-image"></i></a></td>
                            <td><?=$row->nama_pemesanan?></td>
                            <td><?=$row->no_telp?></td>
                            <td><?=$row->alamat?></td>
                            <td><?=$row->jenis_paket?></td>
                            <td><?=date('d-m-Y H:i',strtotime($row->tanggal_keberangkatan))?></td>
                            <td><?=number_format($row->total_harga)?></td>
                            </tr>
                            <?php }?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

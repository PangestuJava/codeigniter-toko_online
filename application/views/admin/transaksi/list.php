<table class="table table-bordered" width="100%">
    <thead>
        <tr class="bg-success">
            <th>NO</th>
            <th>KODE</th>
            <th>PELANGGAN</th>
            <th>TANGGAL</th>
            <th>JUMLAH TOTAL</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($header_transaksi as $header_transaksi) { ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $header_transaksi->kode_transaksi ?></td>
                <td>
                    <?php echo $header_transaksi->nama_pelanggan ?>
                    <br><small>
                        Telepon : <?php echo $header_transaksi->telepon ?><br>
                        Email : <?php echo $header_transaksi->email ?><br>
                        Alamat : <?php echo $header_transaksi->alamat ?>
                    </small>
                </td>
                <td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
                <td><?php echo $header_transaksi->status_bayar ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?php echo base_url('admin/transaksi/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-eye"></i> Detail
                        </a>
                        <a href="<?php echo base_url('admin/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-xs">
                            <i class="fa fa-print"></i> Cetak
                        </a>
                        <a href="<?php echo base_url('admin/transaksi/status/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-check"></i> Status
                        </a>
                    </div>
                    <br>
                    <div class="btn-group">
                        <a href="<?php echo base_url('admin/transaksi/pdf/' . $header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-success btn-xs">
                            <i class="fa fa-file-pdf-o"></i> PDF
                        </a>
                    </div>
                    <div class="btn-group">
                        <a href="<?php echo base_url('admin/transaksi/kirim/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-xs">
                            <i class="fa fa-print"></i> pengiriman
                        </a>
                    </div>
                </td>
            </tr>
        <?php $i++;
        } ?>
    </tbody>
</table>
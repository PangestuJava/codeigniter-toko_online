<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>TELEPON</th>
            <th>PESAN</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($kontak as $kontak) { ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $kontak->nama ?></td>
                <td><?php echo $kontak->email ?></td>
                <td><?php echo $kontak->telepon ?></td>
                <td><?php echo $kontak->pesan ?></td>
                <td>
                    <a href="<?php echo base_url('admin/kritik/delete/' . $kontak->id_kontak) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data ini?')"><i class="fa fa-trash-0"></i> Hapus</a>
                </td>
            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
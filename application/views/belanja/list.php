<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <h1><?php echo $title ?></h1>
                <hr>
                <div class="clearfix"></div>
                <br><br>
                <?php
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                ?>
                <table class="table-shopping-cart">
                    <tr class="table-head bg-info text-strong">
                        <th class="column-1" style="font-weight: bold; color: white">GAMBAR</th>
                        <th class=" column-2" style="font-weight: bold; color: white">PRODUK</th>
                        <th class="column-3" style="font-weight: bold; color: white">HARGA</th>
                        <th class="column-4 p-l-40" style="font-weight: bold; color: white">JUMLAH</th>
                        <th class="column-4" style="font-weight: bold; color: white">Sub Total</th>
                        <th class="column-6" style="font-weight: bold; color: white" width="20%">ACTION</th>
                    </tr>
                    <?php
                    //loping data keranjang belanja
                    foreach ($keranjang as $keranjang) {
                        //ambil data produk
                        $id_produk      = $keranjang['id'];
                        $produk         = $this->produk_model->detail($id_produk);
                        //form update
                        echo form_open(base_url('belanja/update_cart/' . $keranjang['rowid']));
                        ?>
                        <tr class="table-row">
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
                                </div>
                            </td>
                            <td class="column-2"><?php echo $keranjang['name'] ?></td>
                            <td class="column-3">Rp. <?php echo number_format($keranjang['price'], '0', ',', '.') ?></td>
                            <td class="column-4">
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="column-5">Rp.
                                <?php
                                    $sub_total = $keranjang['price'] * $keranjang['qty'];
                                    echo number_format($sub_total, '0', ',', '.');
                                    ?>
                            </td>
                            <td>
                                <button type="submit" name="update" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Update
                                </button>
                                <a href="<?php echo base_url('belanja/hapus/' . $keranjang['rowid']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-trash-o"></i> Hapus
                                    </b>
                            </td>
                        </tr>
                    <?php
                        echo form_close();
                    }
                    ?>
                    <tr class="table-row bg-info text-strong">
                        <td colspan="4" class="column-1" style="font-weight: bold; color: white">Total Belanja</td>
                        <td colspan="2" class="column-2" style="font-weight: bold; color: white">Rp. <?php echo number_format($this->cart->Total(), '0', ',', '.') ?></td>
                    </tr>
                </table>
                <br>
                <p class="pull-right">
                    <a href="<?php echo base_url('belanja/hapus') ?>" class="btn btn-danger btn-lg">
                        <i class="fa fa-trash-o"></i> Bersihkan Semua
                    </a>
                    <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-success btn-lg">
                        <i class="fa fa-shopping-cart"></i> Check Out
                    </a>
                </p>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
            </div>
        </div>
    </div>
</section>
<?php
//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');
//Form Open
echo form_open(base_url('kontak'), ' class="form-horizontal"');
?>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-b-30">
                <div class="hov-img-zoom">
                    <img src="<?php echo base_url('assets/upload/image/thumbs/' . $site->logo) ?>" alt="IMG-ABOUT">
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <form class="leave-comment">
                    <h4 class="m-text26 p-b-36 p-t-15">
                        Kritik & Saran
                    </h4>
                    <?php
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-info">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                    ?>
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>" required>
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="telepon" placeholder="Nomor Telepon" value="<?php echo set_value('telepon') ?>" required>
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" value="<?php echo set_value('email') ?>" required>
                    </div>

                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="pesan" placeholder="Kritik & Saran" value="<?php echo set_value('pesan') ?>" required></textarea>

                    <div class="w-size25">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php echo form_close(); ?>
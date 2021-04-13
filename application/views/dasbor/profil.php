<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
                <h1><?php echo $title ?></h1>
                <hr>
                <?php
                //notifkasi
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                echo validation_errors('<div class="alert alert-warning">', '</div>');
                echo form_open(base_url('dasbor/profil'), 'class="leave-comment"');
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th width="25%">Nama</th>
                            <th>
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Email</th>
                            <th>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly>
                            </th>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th>Password</th>
                            <th>
                                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                                <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password</span>
                            </th>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th>Telepon</th>
                            <th>
                                <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required>
                            </th>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th>Alamat</th>
                            <th>
                                <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?> </textarea>
                            </th>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success btn-lg" type="submit">
                                    <i class="fa fa-save"></i> Update
                                </button>
                                <button class="btn btn-info btn-lg" type="reset">
                                    <i class="fa fa-times"></i> Reset
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
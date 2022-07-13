<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Profil</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            
            <div class="card-body">
                 <h4 class="header-title mt-0">Biodata</h4>
                <form action="<?= base_url('profile/update') ?>" method="POST">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="">NIP :</label>
                            <input type="text" class="form-control" name="nip" required value="<?= $row['pegawai_nip']?>">
                        </div>
                        <div class="col-12 form-group">
                            <label for="">Nama Lengkap :</label>
                            <input type="text" class="form-control" name="name" required value="<?= $row['pegawai_name']?>">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">Email :</label>
                            <input type="text" class="form-control" name="email" required value="<?= $row['pegawai_email']?>">
                        </div>
                        <div class="col-6 form-group">
                            <label for="">No. HP :</label>
                            <input type="text" class="form-control"  name="hp" required value="<?= $row['pegawai_phone']?>">
                        </div>
                        <div class="form-group col-12">
                            <label for="inputEmail4">Jenis Kelamin</label>
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <div class="form-check-inline ">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="male" name="jk" class="custom-control-input gender" value="male" <?php if($row['pegawai_gender'] == 'male'){echo "checked";}?>>
                                            <label class="custom-control-label" for="male">Pria</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline ">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="female" name="jk" class="custom-control-input gender" value="female" <?php if($row['pegawai_gender'] == 'female'){echo "checked";}?>>
                                            <label class="custom-control-label" for="female">Wanita</label>
                                        </div>
                                    </div>
                                </div>
                            </div>      
					    </div>
                        <div class="col-12 form-group">
                            <label for="">Alamat :</label>
                            <input type="text" class="form-control" name="address" required value="<?= $row['pegawai_address']?>">
                        </div>
                        <div class="col-12 form-group">
                            <button class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0">Data Pengguna</h4>
                <form action="<?= base_url('profile/users')?>" method="POST">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" required value="<?= $row['users_username']?>">
                        </div>
                        <div class="col-12 form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="Isi Jika Ingin Mengganti" name="password">
                        </div>
                        <div class="col-12 form-group">
                            <button class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
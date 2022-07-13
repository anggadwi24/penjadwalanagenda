
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Detail Pegawai</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form>
            <div class="card-body bootstrap-select-1">
            <ul class="nav nav-pills justify-content-start mb-3">
                <li class="nav-item">
                    <a class="nav-link bordered" href="<?= base_url('pegawai') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Kembali </a>
                </li>
            </ul>
                <div class="row">
                    <div class="col-xl-6 col-sm-12 table-responsive">
                        <table class="table  ">
                            <tbody>
                                <tr>
                                    <th>NIP Pegawai</th>
                                    <td>:</td>
                                    <td><?= $row['pegawai_nip']?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Nama Pegawai</th>
                                    <td>:</td>
                                    <td><?= $row['pegawai_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td><?= $row['pegawai_email']?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Jenis Kelamin</th>
                                    <td>:</td>
                                    <td><?php 
                                            if($row['pegawai_gender'] == 'male'){
                                                echo "Laki-laki";
                                            }else{
                                                echo "Perempuan";
                                            }

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No Telp</th>
                                    <td>:</td>
                                    <td><?= $row['pegawai_phone'] ?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td><?= $row['pegawai_address'] ?></td>
                                </tr>
                                <tr>
                                    <th>Bagian</th>
                                    <td>:</td>
                                    <td><?= $row['pegawai_bagian']?></td>
                                </tr>
                               
                            </tbody>
                            
                        </table>
                        
                                                        
                                                                  
                    </div>
                    
                </div>
            </form>
        </div>                                
    </div> <!-- end col -->
</div> <!-- end row -->


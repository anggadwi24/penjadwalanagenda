<style>
          
            .demo-gallery > ul {
                margin-top: 0 !important;
                margin-bottom: 0;
                overflow-x: scroll;
                overflow-y: hidden;
                white-space: nowrap;
                width: auto;
                height:35vh;
            }
            .demo-gallery > ul > li {
                
                margin-bottom: 0;
                margin-right: 20px;
                width: 200px;

                display: inline-block;
            }
            .demo-gallery > ul > li a {
                border: 3px solid #FFF;
                border-radius: 3px;
                display: block;
                overflow: hidden;
                position: relative;
                float: left;
            }
            .demo-gallery > ul > li a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
                opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.1);
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                -webkit-transition: background-color 0.15s ease 0s;
                -o-transition: background-color 0.15s ease 0s;
                transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
                left: 50%;
                margin-left: -10px;
                margin-top: -10px;
                opacity: 0;
                position: absolute;
                top: 50%;
                -webkit-transition: opacity 0.3s ease 0s;
                -o-transition: opacity 0.3s ease 0s;
                transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
                opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.1);
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                -webkit-transition: background-color 0.15s ease 0s;
                -o-transition: background-color 0.15s ease 0s;
                transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
                left: 50%;
                margin-left: -10px;
                margin-top: -10px;
                opacity: 0;
                position: absolute;
                top: 50%;
                -webkit-transition: opacity 0.3s ease 0s;
                -o-transition: opacity 0.3s ease 0s;
                transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
                height: 48px;
                margin-left: -24px;
                margin-top: -24px;
                opacity: 0.8;
                width: 48px;
            }
            .demo-gallery.dark > ul > li a {
                border: 3px solid #04070a;
            }
            .home .demo-gallery {
                padding-bottom: 80px;
            }
        </style>
<?php 
 $pj = $this->model_app->view_where('pegawai',array('pegawai_id'=>$row['agenda_penanggung_jawab']))->row_array();
 
 $staff = $this->model_app->join_where2('agenda_pegawai','pegawai','ap_pegawai_id','pegawai_id',array('ap_agenda_id'=>$row['agenda_id']));
 if($staff->num_rows() > 0){
     $sf = null;
    foreach($staff->result_array() as $st){
        $sf .= $st['pegawai_name'].', ';
    }
    $stf = substr($sf,0,-2);
 }else{
     $stf = 'Tidak ada staff yang mengikuti agenda ini';
 }
 ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Detail Hasil Kegiatan</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills justify-content-start">
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('hasil') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Kembali </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active bordered" href="<?= base_url('hasil/detail?id='.$row['agenda_id']) ?>">Detail Hasil Kegiatan</a>
            </li>
            <?php if($this->session->userdata['isLog']['role'] == 'admin'){?>
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('hasil/edit?id='.$row['agenda_id']) ?>">Edit Hasil Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bordered" id="delete">Hapus Hasil Kegiatan</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link bordered" href="#" data-toggle="modal" data-animation="bounce" data-target="#addCatatan">Tambah Catatan</a>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link bordered" href="#" data-toggle="modal" data-animation="bounce" data-target="#addDokumentasi">Tambah Dokumentasi</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('agenda/laporan?id='.$row['agenda_id']) ?>">Laporan Kegiatan</a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form>
            <div class="card-body bootstrap-select-1">
                <div class="row">
                    <div class="col-xl-6 col-sm-12">
                        <table class="table  ">
                            <tbody>
                                
                                <tr class="table-secondary">
                                    <th>Kode Kegiatan</th>
                                    <td>:</td>
                                    <td><?= $row['agenda_code']?></td>
                                </tr>
                                <tr>
                                    <th>Nama Kegiatan</th>
                                    <td>:</td>
                                    <td><?= $row['agenda_name']?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Tempat Kegiatan</th>
                                    <td>:</td>
                                    <td><?= $row['agenda_place']?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kegiatan</th>
                                    <td>:</td>
                                    <td><?= date('d/m/Y H:i',strtotime($row['agenda_date_start'])) ?> s/d <?= date('d/m/Y H:i',strtotime($row['agenda_date_end'])) ?> WITA</td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Penyelenggara</th>
                                    <td>:</td>
                                    <td><?= $row['agenda_penyelenggara']?></td>
                                </tr>
                               
                            </tbody>
                            
                        </table>    
                    </div>
                    <div class="col-xl-6 col-sm-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Penanggung Jawab</th>
                                    <td>:</td>
                                    <td><?= $pj['pegawai_name']?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Staff yang Menghadiri</th>
                                    <td>:</td>
                                    <td><?=  $stf ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>:</td>
                                    <td><?= ucfirst($row['agenda_kategori'])?></td>
                                </tr>
                                <tr class="table-secondary">
                                    <th>Perihal Kegiatan</th>
                                    <td>:</td>
                                    <td><?= ucfirst($row['agenda_perihal'])?></td>
                                </tr>
                                
                                <tr>
                                    <th>Intruksi Pimpinan</th>
                                    <td>:</td>
                                    <td><?= $validasi['valid_intruksi']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                                                                  
                </div>
            </div>
            </form>
        </div>                                
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
    <div class="col-xl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Notulen</h4>
                <div class="row mt-3">
                    <?php 
                       
                                echo "<div class='col-12 form-group'>".$row['hk_notulen']."</div>";
                        
                    ?>
                </div>
            </div>
        </div>
    </div>      
    <div class="col-xl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class=" header-title">Dokumentasi</h4>
                <!-- <div class="mt-3 row"> -->
              
                    
               
                     <?php
                        $dokumentasi = $this->model_app->view_where('hasil_kegiatan_image',array('hki_hk_id'=>$row['hk_id']));
                        if($dokumentasi->num_rows() > 0){
                            echo '  <div class="demo-gallery" >
                            <ul id="lightgallery" class="list-unstyled  "  >';
                            foreach($dokumentasi->result_array() as $doc){
                                if(file_exists('upload/agenda/'.$doc['hki_url'])){
                                    echo '<li class="my-2 item"  data-responsive="'.base_url('upload/agenda/'.$doc['hki_url']).'" data-src="'.base_url('upload/agenda/'.$doc['hki_url']).'" 
                                            data-sub-html="<h4 class=text-light>'.$row['agenda_name'].'</h4>
                                            ';
                                            if($this->session->userdata['isLog']['role'] == 'admin'){
                                            echo  '<a data-id='.$doc['hki_id'].' data-agenda='.$row['agenda_id'].' class=delete>Hapus Gambar</a>';
                                            }
                                            echo '
                                            " >                             
                                            <a >
                                            <img class="img-responsive " src="'.base_url('upload/agenda/'.$doc['hki_url']).'" alt="Thumb-1">
                                            
                                            </a>
                                            </li>';
                                }
                            }
                            echo ' </ul>

                            </div>';
                        }else{
                            echo '<h6>Tidak ada dokumentasi</h6>';
                        }
                            
                     ?>
                    
                  
                   
            </div>
        </div>
    </div>   
                                                          
<!-- </div><button class="btn btn-outline-danger waves-effect waves-light delete"  data-id="'.$doc['hki_id'].'" data-agenda="'.$row['agenda_id'].'"><i class="fas fa-trash"></i></button>">      -->
<!-- <div class="mo-mb-2 text-center mx-auto">
                                                    <img class="img-thumbnail" alt="'.$row['agenda_name'].'" style="width: auto; height: 200px;border:none" src="'.base_url('upload/agenda/'.$doc['hki_url']).'"data-holder-rendered="true">
                                                    ';
                                                    if($this->session->userdata['isLog']['role'] == 'admin'){
                                                    
                                                    echo '<button class="btn btn-outline-danger waves-effect waves-light delete"  data-id="'.$doc['hki_id'].'" data-agenda="'.$row['agenda_id'].'" style="position:absolute;bottom:5px;right:25px;z-index:2"><i class="fas fa-trash"></i></button>';
                                                    }
                                                    echo '<button class="btn btn-outline-info waves-effect waves-light detail" data-href="'.base_url('upload/agenda/'.$doc['hki_url']).'" style="position:absolute;bottom:5px;right:70px;z-index:2"><i class="fas fa-eye"></i></button>

                                                </div> -->
<?php if($this->session->userdata['isLog']['role'] == 'admin'){?>
<!-- <div class="modal fade" id="addCatatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Catatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('hasil/storeCatatan')?>" method="post" >
            <div class="modal-body">
                
                <div class="card-body bootstrap-select-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputAddress">Kode Kegiatan</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_code']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Tempat Kegiatan</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_place'] ?>" readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tanggal/Jam Mulai Kegiatan</label>
                                    <input type="text" class="form-control" id="inputEmail4" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_start'])) ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Tanggal/Jam Selesai Kegiatan</label>
                                    <input type="text" class="form-control" id="inputPassword4" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_start'])) ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Penyelenggara</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_penyelenggara']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Penanggung Jawab</label>
                                <input type="text" class="form-control" name="" value="<?= $pj['pegawai_name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Catatan</label>
                                <textarea class="form-control" name="catatan" required></textarea>
                            </div>
                                                        
                        
                            
                        </div>                                                
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                <input type="hidden" name="id" value="<?= $row['hk_id']?>">
                <button class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div> -->

<!-- <div class="modal fade" id="addDokumentasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Dokumentasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('hasil/storeDokumentasi')?>" id="formStore" method="post" enctype='multipart/form-data' >
            <div class="modal-body">
                
                <div class="card-body bootstrap-select-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputAddress">Kode Kegiatan</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_code']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Tempat Kegiatan</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_place'] ?>" readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tanggal/Jam Mulai Kegiatan</label>
                                    <input type="text" class="form-control" id="inputEmail4" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_start'])) ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Tanggal/Jam Selesai Kegiatan</label>
                                    <input type="text" class="form-control" id="inputPassword4" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_end'])) ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Penyelenggara</label>
                                <input type="text" class="form-control" name="" value="<?= $row['agenda_penyelenggara']?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Penanggung Jawab</label>
                                <input type="text" class="form-control" name="" value="<?= $pj['pegawai_name'] ?>" readonly>
                            </div>
                          
                            <div class="form-group">
                                <label for="inputAddress">Gambar</label>
                                <input type="file" name="files[]" accept="image/*" class="form-control" multiple>
                            </div>   
                                                        
                        
                            
                        </div>                                                
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                <input type="hidden" name="id" value="<?= $row['hk_id']?>">
                <button class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div> -->
<?php }?>
<script>
    // $(".delete").click(false);
    $(document).on('submit','#formStore',function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Apa anda yakin menyimpan data ini ?',
            type:'warning',
            showCancelButton: true,
            confirmButtonText: `Yakin`,
            cancelButtonText: `Batal`,
            }).then((result) => {
            
            if (result.value) {
                var formData = new FormData(this);
                // formData.append('s', getUrlParameter('s'));
                $.ajax({
                    type:'POST',
                    url:'<?= base_url('hasil/storeDokumentasi')?>',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType :'json',
                    beforeSend:function(){
                        $('#formStore input').attr('disabled',true);
                        $('#formStore select').attr('disabled',true);
                        $('#formStore button').attr('disabled',true);
                        $('#preloader').css('display','');

                    },success:function(resp){
                        // console.log(resp);
                        if(resp.status == true){
                            swal('Success',resp.msg,'success').then(function () {
                                window.location = resp.redirect;
                            });
                            // $('.bs-example-modal-lg').modal('hide');
                        }else{
                            // swal('Peringatan',resp.msg,'warning');
                            swal('Peringatan',resp.msg,'warning').then(function () {
                                window.location = resp.redirect;
                            });
                        
                        }
                    },error:function(e){
                        console.log(e.responseText);
                    },complete:function(){
                        $('#preloader').css('display','none');

                        $('#formStore input').attr('disabled',false);
                        $('#formStore select').attr('disabled',false);
                        $('#formStore button').attr('disabled',false);
                    }
                })
            }else{
                e.preventDefault();  
            }
        });
    })
    $(document).on('click','.detail',function(){
        var href = $(this).attr('data-href');
        window.open(href,'_blank');
    })
    $(document).on('click','.delete',function(){
        var id = $(this).attr('data-id');
        var agenda = $(this).attr('data-agenda');

        swal({
            title: 'Apakah anda yakin?',
            text: "Gambar Dokumentasi ini akan dihapus secara permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            confirmButtonText: 'Yakin'
        }).then((result) => {
           
/* Read more about isConfirmed, isDenied below */
            if (result.value) {
                window.location = '<?= base_url('hasil/deleteDokumentasi?id=')?>'+id+'&agenda='+agenda;;
            } else if (result.dismiss) {
                swal.close();
            }
            })
    })
    $(document).on('click','#delete',function(){
      

        swal({
            title: 'Apakah anda yakin?',
            text: "Hasil kegiatan akan terhapus secara permanan, status agenda akan berubah menjadi divalidasi",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            confirmButtonText: 'Yakin'
        }).then((result) => {
           
/* Read more about isConfirmed, isDenied below */
            if (result.value) {
                window.location = '<?= base_url('hasil/delete?id='.$row['agenda_id'])?>';
            } else if (result.dismiss) {
                swal.close();
            }
            })
    })
</script>

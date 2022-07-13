<style>
    .option{
  background: #fff;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
 
  border-radius: 5px;
  cursor: pointer;
  padding: 5px 10px;
  border: 2px solid lightgrey;
  transition: all 0.3s ease;
}

input[type="radio"]{
  display: none;
}
#option-1:checked:checked ~ .option-1,
#option-2:checked:checked ~ .option-2{
  border-color: #605daf;
  background: #605daf;
}
#option-1:checked:checked ~ .option-1 .dot,
#option-2:checked:checked ~ .option-2 .dot{
  background: #fff;
}
#option-1:checked:checked ~ .option-1 .dot::before,
#option-2:checked:checked ~ .option-2 .dot::before{
  opacity: 1;
  transform: scale(1);
}
.wrapper .option span{
  font-size: 20px;
  color: #808080;
}
#option-1:checked:checked ~ .option-1 span,
#option-2:checked:checked ~ .option-2 span{
  color: #fff;
}
</style>
<?php 
    $validasi = $this->model_app->view_where('validasi',array('valid_agenda_id'=>$row['agenda_id']));
    if($validasi->num_rows() > 0 ){
        $valid = $validasi->row_array();
        if( $row['agenda_status'] == 'ditolak'){
            $frmin = 'Alasan';
            $checked2= 'checked';
            $checked1 = '';
        }else{
            $frmin = 'Intruksi';
            $checked2= '';
            $checked1 = 'checked';
        }
        $intruksi = $valid['valid_intruksi'];

    }else{
        $checked2= '';
        $checked1 = 'checked';
        $intruksi = '';
        $frmin = 'Intruksi';

    }
    if($row['agenda_validasi'] == 'y'){
        if($row['agenda_status'] == 'undone'){

            $status = '<span class="badge badge-info ">Validasi</span>';
        }else if($row['agenda_status'] == 'done'){
            $status = '<span class="badge badge-success ">Selesai</span>';
        }else{
            $status = '<span class="badge badge-danger ">'.ucfirst($row['agenda_status']).'</span>';
        }
        
    }else{
       

            $status = '<span class="badge badge-warning ">Belum divalidasi</span>';
        
    }
?>
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
            <h4 class="page-title">Detail Agenda Kegiatan</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills justify-content-start">
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('agenda') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Kembali </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bordered" href="<?= base_url('agenda/detail?id='.$row['agenda_id']) ?>">Detail Agenda Kegiatan</a>
            </li>
            <?php 
                if($this->session->userdata['isLog']['role'] == 'admin'){
                    if($row['agenda_status'] == 'undone' OR $row['agenda_status'] == 'ditolak'){
                        echo '<li class="nav-item">
                                <a class="nav-link bordered" href="'. base_url('agenda/edit?id='.$row['agenda_id']).'">Edit Agenda Kegiatan</a>
                         </li>';
                    
                   
                         echo ' <li class="nav-item">
                                <a class="nav-link bordered" href="#" id="delete">Hapus Agenda Kegiatan</a>
                            </li>';    
                    }
                }
            ?>
            
           
             <li class="nav-item">
                <a class="nav-link bordered" href="#" data-toggle="modal" data-target="#tambahintruksi"> <?php   if($this->session->userdata['isLog']['role'] == 'camat'){ ?>Validasi<?php }else{ echo "Lihat Intruksi Pimpinan";}?></a>
            </li>
            <?php 
                if($validasi->num_rows() > 0){
                    if($row['agenda_status'] == 'undone' AND $this->session->userdata['isLog']['role'] == 'admin'){

                    
           
            ?>
            <li class="nav-item">
                <a class="nav-link bordered" href="#" data-toggle="modal" data-animation="bounce" data-target=".tambahhasilkegiatan">Selesai</a>
            </li>
            <?php }else if($row['agenda_status'] == 'done'){?>
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('hasil/detail?id='.$row['agenda_id']) ?>">Hasil Kegiatan</a>
            </li>
          
            <?php }?>
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
                    <div class="col-xl-6 col-sm-12 table-responsive">
                        <table class="table  ">
                            <tbody>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td><?= $status?></td>
                                </tr>
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
                            </tbody>
                            
                        </table>
                        
                                                        
                                                                  
                    </div>
                    <div class="col-xl-6 col-sm-12">
                         <!-- <embed type="application/pdf" src="<?= base_url('upload/agenda/'.$row['agenda_surat'])?>" width="600" height="400"></embed> -->
                         <?php 
                            if($row['agenda_surat'] != NULL){
                                ?>
                                    <div class="embed-responsive embed-responsive-1by1">
                                        <iframe src="<?= base_url('upload/agenda/'.$row['agenda_surat'])?>" class="embed-responsive-item" frameborder="0"></iframe>
                                    </div>
                                <?php
                            }
                         ?>
                        

                   
                       
                    </div>
                </div>
            </form>
        </div>                                
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- modal tambah intruksi -->

<div id="tambahintruksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Intruksi Pimpinan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?php 
                if($this->session->userdata['isLog']['role'] == 'camat'){
                    $disabled = '';
                
            ?>
            <form action="<?= base_url('agenda/intruksi') ?>" id="formAct" method="POST">
            <?php }else{
                 $disabled = 'disabled';
            }
                 ?>
            <div class="modal-body">

                <div class="form-group">
                    <label for="inputAddress">Nama Kegiatan</label>
                    <input type="text" class="form-control" name="" value="<?= $row['agenda_name']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Tempat Kegiatan</label>
                    <input type="text" class="form-control" name="" value="<?= $row['agenda_place']?>" readonly>
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
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <input type="radio" name="status" id="option-1" value="validasi"  <?= $checked1 ?> <?= $disabled ?> >
                        <label for="option-1" class="option option-1">
                           
                            <span>Validasi</span>
                        </label>
                    </div>
                    <div class="form-group  col-md-6">
                 
                        <input type="radio" name="status" id="option-2" value="tolak" <?= $checked2 ?> <?= $disabled?>>
                        
                        <label for="option-2" class="option option-2">
                            
                            <span>Tolak</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" id="frmin"><?= $frmin?></label>
                    <textarea class="form-control" name="intruksi" <?= $disabled ?> ><?= $intruksi ?></textarea>
                </div>
                
            </div>
             <?php 
                if($this->session->userdata['isLog']['role'] == 'camat'){
                    ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                <input type="hidden" name="id" value="<?= $row['agenda_id']?>">
                <button  class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
            </form>
            <?php }else{?>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
               
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!--  Modal tambah hasil kegiatan -->
<div class="modal fade tambahhasilkegiatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Hasil Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('hasil/store')?>" id="formStore" method="post" enctype='multipart/form-data'>
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
                                <label for="inputAddress">Notulen</label>
                                <textarea class="form-control" name="notulen" id="elm1" ></textarea>
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
                <input type="hidden" name="id" value="<?= $row['agenda_id']?>">
                <button class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on('change','#option-2',function(){
        $('#frmin').html('Alasan');
    })
    $(document).on('change','#option-1',function(){
        $('#frmin').html('Intruksi');
    })
    $(document).on('submit','#formAct',function(e){
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
                    url:'<?= base_url('agenda/intruksi')?>',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType :'json',
                    beforeSend:function(){
                        $('#formAct input').attr('disabled',true);
                        $('#formAct select').attr('disabled',true);
                        $('#formAct button').attr('disabled',true);
                        $('#preloader').css('display','');
                        $('#status').css('display','');


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
                        $('#status').css('display','none');


                        $('#formAct input').attr('disabled',false);
                        $('#formAct select').attr('disabled',false);
                        $('#formAct button').attr('disabled',false);
                    }
                })
            }else{
                e.preventDefault();  
            }
        });
    })
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
                    url:'<?= base_url('hasil/store')?>',
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
                        $('#status').css('display','');

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
                        $('#status').css('display','none');

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
    $(document).on('click','#delete',function(){
	
		swal({
                title: 'Apakah anda yakin?',
                text: "Agenda akan terhapus secara permanen ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-2',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                console.log(result);
  /* Read more about isConfirmed, isDenied below */
                if (result.value) {
                   window.location = '<?= base_url('agenda/delete?id='.$row['agenda_id'])?>';
                } else if (result.dismiss) {
                   swal.close();
                }
             })
	})
</script>
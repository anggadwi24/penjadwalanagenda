<?php 
    $validasi = $this->model_app->view_where('validasi',array('valid_agenda_id'=>$row['agenda_id']));
    if($validasi->num_rows() > 0){
        $valid = $validasi->row_array();
        $intruksi = $valid['valid_intruksi'];
    }else{
        $intruksi = '';
    }
    if($row['agenda_validasi'] == 'y'){
        if($row['agenda_status'] == 'undone'){

            $status = '<span class="badge badge-info">Validasi</span>';
        }else if($row['agenda_status'] == 'done'){
            $status = '<span class="badge badge-success">Selesai</span>';
        }else{
            $status = '<span class="badge badge-danger">'.ucfirst($row['agenda_status']).'</span>';
        }
        
    }else{
        $status = '<span class="badge badge-danger">Belum divalidasi</span>';
    }
?>
 <?php 
 $pj = $this->model_app->view_where('pegawai',array('pegawai_id'=>$row['agenda_penanggung_jawab']))->row_array();
 $pegawai = $this->model_app->view('pegawai');
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
            <h4 class="page-title">Edit Agenda Kegiatan</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills justify-content-start">
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('agenda/detail?id='.$row['agenda_id']) ?>"><i class="fas fa-arrow-alt-circle-left"></i> Kembali </a>
            </li>
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('agenda/detail?id='.$row['agenda_id']) ?>">Detail Agenda Kegiatan</a>
            </li>
            <?php 
                if($this->session->userdata['isLog']['role'] == 'admin'){
                    if($row['agenda_status'] == 'undone'){
                        echo '<li class="nav-item ">
                                <a class="nav-link active bordered" href="'. base_url('agenda/edit?id='.$row['agenda_id']).'">Edit Agenda Kegiatan</a>
                         </li>';
                    
                   
                      
                    }
                }
            ?>
            
           
            
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="<?= base_url('agenda/update') ?>"  id="formAct" method="POST" enctype='multipart/form-data'>
            <div class="card-body bootstrap-select-1">
                <h4 class="header-title mt-0">Form Edit Agenda Kegiatan</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputAddress">Kode Kegiatan</label>
                            <input type="text" class="form-control" name="code" id="kode" value="<?= $row['agenda_code'] ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Nama Kegiatan</label>
                            <input type="text" class="form-control can" name="name" id="name" value="<?= $row['agenda_name']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Tempat Kegiatan</label>
                            <input type="text" class="form-control can" name="place" value="<?= $row['agenda_place']?>" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Tgl/Jam Mulai Kegiatan </label>
                                <input type="text" class="form-control dateTime" id="inputEmail4"  name="start" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_start'])) ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Tgl/Jam Selesai Kegiatan</label>
                                <input type="text" class="form-control dateTime" id="inputPassword4" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_end']) ) ?>" name="end" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Penyelenggara</label>
                            <input type="text" class="form-control can" name="penyelenggara" value="<?= $row['agenda_penyelenggara'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Penanggung Jawab</label>
                            <select name="pj" id="pj" class="form-control select2" requried>
                                            <?php 
                                                    if($pegawai->num_rows() > 0){
                                                        foreach($pegawai->result_array() as $stf){
                                                            if($row['agenda_penanggung_jawab'] == $stf['pegawai_id']){
                                                                echo '<option value="'.$stf['pegawai_id'].'" selected>'.$stf['pegawai_name'].'</option>';

                                                            }else{
                                                                echo '<option value="'.$stf['pegawai_id'].'">'.$stf['pegawai_name'].'</option>';

                                                            }
                                                        }
                                                    } 
                                                ?>
                            </select>
                        </div>
                    </div>                                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputAddress">Staff yang Menghadiri</label>
                            <select class="select2 mb-3 select2-multiple" style="width: 100%;" multiple="multiple" name="pegawai[]" data-placeholder="Choose" required>
                                                <?php 
                                                    if($pegawai->num_rows() > 0){
                                                        foreach($pegawai->result_array() as $stf){
                                                            $cek = $this->model_app->view_where('agenda_pegawai',array('ap_agenda_id'=>$row['agenda_id'],'ap_pegawai_id'=>$stf['pegawai_id']));
                                                            if($cek->num_rows() > 0){
                                                                echo '<option value="'.$stf['pegawai_id'].'" selected>'.$stf['pegawai_name'].'</option>';

                                                            }else{
                                                                echo '<option value="'.$stf['pegawai_id'].'">'.$stf['pegawai_name'].'</option>';

                                                            }
                                                        }
                                                    } 
                                                ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Kategori</label>
                            <select class="form-control" required name="kategori">
                                <option value="internal" <?php if($row['agenda_kategori'] == 'internal'){echo "selected";}?>>Internal</option>
                                <option value="external" <?php if($row['agenda_kategori'] == 'external'){echo "selected";}?>>External</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Perihal Kegiatan</label>
                            <input type="text" class="form-control can" name="perihal" value="<?= $row['agenda_perihal']?>" >
                        </div>
                        <div class="form-group">
                            <label for="">Surat</label>
                            <input type="file" name="surat" class="form-control can" accept="application/pdf">
                        </div>
                    </div>                                                
                </div>
                <div class="form-group float-right">
                    <button type="reset" id="reset" class="btn btn-danger">Batal</button>
                    <input type="hidden" name="id" value="<?= $row['agenda_id'] ?>">
                    <button  class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>                                
    </div> <!-- end col -->
</div> <!-- end row -->

 <!-- modal tambah intruksi -->

 

<!--  Modal tambah hasil kegiatan -->

<script>
   
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
                    url:'<?= base_url('agenda/update')?>',
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
</script>
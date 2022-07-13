<?php 
 $pj = $this->model_app->view_where('pegawai',array('pegawai_id'=>$row['agenda_penanggung_jawab']))->row_array();
 
 $staff = $this->model_app->join_where2('agenda_pegawai','pegawai','ap_pegawai_id','pegawai_id',array('ap_agenda_id'=>$row['agenda_id']));
 $pegawai = $this->model_app->view('pegawai');

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
            <h4 class="page-title">Edit Hasil Kegiatan</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills justify-content-start">
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('hasil') ?>"><i class="fas fa-arrow-alt-circle-left"></i> Kembali </a>
            </li>
            <li class="nav-item">
                <a class="nav-link bordered" href="<?= base_url('hasil/detail?id='.$row['agenda_id']) ?>">Detail Hasil Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bordered" href="<?= base_url('hasil/edit?id='.$row['agenda_id']) ?>">Edit Hasil Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bordered" id="delete">Hapus Hasil Kegiatan</a>
            </li>
        </ul>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="<?= base_url('hasil/update')?>" id="formAct" method="POST">
            <div class="card-body bootstrap-select-1">
                <h4 class="header-title mt-0">Form Edit Hasil Kegiatan</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputAddress">Kode Kegiatan</label>
                            <input type="text" class="form-control" name="" value="<?= $row['agenda_code'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="name" required value="<?= $row['agenda_name'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Tempat Kegiatan</label>
                            <input type="text" class="form-control" name="place" required value="<?= $row['agenda_place'] ?>" disabled>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="inputEmail4">Tgl/Jam Mulai Kegiatan </label>
                                <input type="text" class="form-control " id="inputEmail4" name="start" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_start'])) ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Tgl/Jam Selesai Kegiatan</label>
                                <input type="text" class="form-control " id="inputPassword4" value="<?= date('Y-m-d H:i',strtotime($row['agenda_date_end']) ) ?>" name="end" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Penyelenggara</label>
                            <input type="text" class="form-control" disabled value="<?= $row['agenda_penyelenggara'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Penanggung Jawab</label>
                            <input type="text" class="form-control" value="<?= $pj['pegawai_name']?>" disabled>
                        </div>
                    </div>                                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputAddress">Staff yang Menghadiri</label>
                            <select class="select2 mb-3 select2-multiple" style="width: 100%;" multiple="multiple" name="pegawai[]" data-placeholder="Choose" required disabled>
                                                <?php 
                                                    if($pegawai->num_rows() > 0){
                                                        foreach($pegawai->result_array() as $stf){
                                                            $cek = $this->model_app->view_where('agenda_pegawai',array('ap_agenda_id'=>$row['agenda_id'],'ap_pegawai_id'=>$stf['pegawai_id']));
                                                            if($cek->num_rows() > 0){
                                                               $selected = 'selected';

                                                            }else{
                                                                $selected = '';
                                                            }
                                                                

                                                            echo '<option value="'.$stf['pegawai_id'].'" '.$selected.'>'.$stf['pegawai_name'].'</option>';
                                                        }
                                                    } 
                                                ?>
                            </select> 
                        </div>
                        <div class="form-group">
                         
                            <label for="inputAddress">Kategori</label>
                            <select class="form-control"  name="kategori" disabled>
                                <option class="internal" <?php if($row['agenda_kategori'] == 'internal'){echo "selected";}?>>Internal</option>
                                <option class="external" <?php if($row['agenda_kategori'] == 'external'){echo "selected";}?>>External</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Perihal Kegiatan</label>
                            <input type="text" class="form-control" name="perihal" value="<?= $row['agenda_perihal']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Notulen</label>
                            <textarea class="form-control" id="elm1" name="notulen"><?= $row['hk_notulen']?></textarea>
                        </div>
                        <div class="form-group">
                                <label for="inputAddress">Gambar</label>
                                <input type="file" name="files[]" accept="image/*" class="form-control" multiple>
                        </div>   
                    </div>                                                
                </div>
                <div class="form-group float-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <input type="hidden" name="id" value="<?= $row['hk_id'] ?>">
                    <button  class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>                                
    </div> <!-- end col -->
</div> <!-- end row -->

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
                    url:'<?= base_url('hasil/update')?>',
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
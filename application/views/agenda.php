 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
        <?php if($this->session->userdata['isLog']['role'] == 'admin'){ ?>
            <div class="btn-group float-right">
                
                <!-- Tambah Data -->
              
                <button class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg"><i class="fas fa-plus"> </i> Tambah Data</button>
             
                <!--  Modal content for the above example -->
		        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		            <div class="modal-dialog modal-lg">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Agenda Kegiatan</h5>
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                    </div>
							<form id="formAct">
		                    <div class="modal-body">
		                    
                            <div class="card-body bootstrap-select-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress">Kode Kegiatan</label>
                                            <input type="text" class="form-control" name="kode_kegiatan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="nama_kegiatan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Tempat Kegiatan</label>
                                            <input type="text" class="form-control" name="tempat_kegiatan" required >
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Tgl/Jam Mulai</label>
                                                <input type="text" class="form-control dateTime" id="inputEmail4" min="<?= date('Y-m-d') ?>" name="start" value="<?= date('Y-m-d H:i' ) ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Tgl/Jam Selesai</label>
                                                <input type="text" class="form-control dateTime" id="inputPassword4" min="<?= date('Y-m-d' ) ?>" value="<?= date('Y-m-d H:i',strtotime('+1 Days') ) ?>" name="end" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Penyelenggara</label>
                                            <input type="text" class="form-control" name="penyelenggara">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Penanggung Jawab</label>
                                           <select name="pj" id="pj" class="form-control select2" requried data-placeholder="Choose">
                                            <option disabled selected></option>
                                            <?php 
                                                    if($staff->num_rows() > 0){
                                                        foreach($staff->result_array() as $stf){
                                                            echo '<option value="'.$stf['pegawai_id'].'">'.$stf['pegawai_name'].'</option>';
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
                                                    if($staff->num_rows() > 0){
                                                        foreach($staff->result_array() as $stf){
                                                            echo '<option value="'.$stf['pegawai_id'].'">'.$stf['pegawai_name'].'</option>';
                                                        }
                                                    } 
                                                ?>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Kategori</label>
                                            <select class="form-control" required name="kategori">
                                                <option class="internal">Internal</option>
                                                <option class="external">External</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Perihal Kegiatan</label>
                                            <input type="text" class="form-control" name="perihal" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Surat</label>
                                            <input type="file" class="form-control" name="surat" required  accept="application/pdf"> 
                                        </div>
                                    </div>                                                
                                </div>
                            </div>
								
		                    </div>
		                    <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                                <button  class="btn btn-primary waves-effect waves-light">Simpan</button>
                            </div>
							</form>
		                </div>
		            </div>
		        </div>




            </div>
            <?php }?>
            <h4 class="page-title">Agenda Kegiatan</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-body pt-0">
               
                <div class="row">
                    <div class="col-12 mb-3"> <button class="btn btn-primary waves-effect waves-light float-right mr-3" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter"> <i class="fas fa-filter"></i> Filter</button>    </div>
                    <div class="col-12">
                        <div class="collapse multi-collapse" id="filter">
                            <div class="card card-body">
                                <form action="<?= base_url('agenda') ?>" method="GET">
                                    <div class="row">
                                    <?php if($this->role == 'admin' OR $this->role =='camat'){

                                        $col = 'col-4';
                                    }else{
                                        $col = 'col-6';
                                    }?>
                                        <div class="<?= $col ?> form-group">
                                            <label for="">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="all">Semua</option>
                                                <option value="internal">Internal</option>
                                                <option value="external">External</option>

                                            </select>
                                        </div>
                                        <?php if($this->role == 'admin' OR $this->role =='camat'){?>
                                        <div class="<?= $col ?> form-group">
                                            <label for="">Status Validasi</label>
                                            <select name="status" id="validasi" class="form-control">
                                                <option value="all">Semua</option>
                                                <option value="sudah">Sudah</option>
                                                <option value="belum">Belum</option>
                                                <option value="ditolak">Ditolak</option>


                                            </select>
                                        </div>
                                        <?php }?>
                                        <div class="<?= $col ?> form-group">
                                            <label for="">Bulan</label>
                                            <select name="bulan" id="bulan" class="form-control">
                                                <option value="all">Semua</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>


                                               


                                            </select>
                                        </div>
                                        <div class="col-12 form-group text-right">
                                            <button class="btn btn-primary">CARI</button>
                                        </div>
                                    </div>
                                </form>             
                            </div>
                        </div>
                    </div>
                    <div class="col-12 table-responsive">
                         <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Kode Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Tempat Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Penyelenggara</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>


                            <tbody>
                                <?php if($record->num_rows() > 0){
                                    foreach($record->result_array() as $row){
                                        $date = date('d/m/Y H:i',strtotime($row['agenda_date_start']));
                                        $date1 = date('d/m/Y H:i',strtotime($row['agenda_date_start'])).' s/d '.date('d/m/Y H:i',strtotime($row['agenda_date_end']));

                                        if($row['agenda_validasi'] == 'y'){
                                            if($row['agenda_status'] == 'undone'){

                                                $status = '<span class="badge badge-info">Validasi</span>';
                                            }else if($row['agenda_status'] == 'done'){
                                                $status = '<span class="badge badge-success">Selesai</span>';
                                            }else{
                                                $status = '<span class="badge badge-danger">'.ucfirst($row['agenda_status']).'</span>';
                                            }
                                            
                                        }else{
                                            $status = '<span class="badge badge-warning">Belum divalidasi</span>';

                                        }
                                        echo '
                                        <tr>
                                            <td>'.$row['agenda_code'].'</td>

                                            <td>'.$row['agenda_name'].'</td>
                                            <td>'.$row['agenda_place'].'</td>
                                            <td data-toggle="tooltip" data-placement="top" title="'.$date1.'">'.$date.'</td>
                                            <td>'.$row['agenda_penyelenggara'].'</td>
                                            <td>'.$status.'</td>
                                            <td>
                                                <a href="'.base_url('agenda/detail?id='.$row['agenda_id']) .'" class="btn btn-outline-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-eye"></i></a>
                                                ';
                                                if($this->session->userdata['isLog']['role'] == 'admin'){
                                                    if($row['agenda_status'] != 'done'){
                                                        echo '<a href="'.base_url('agenda/edit?id='.$row['agenda_id']).'" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil"></i></a>';
                                                        echo '<a href="#"  class="ml-1 btn btn-danger btn-xs waves-effect waves-light delete" data-id="'.$row['agenda_id'].'" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-close"></i></a>';
                                                    }
                                                
                                                }
                                            echo '  
                                            </td>
                                        </tr>
                                        ';
                                    }
                                }?>
                            
                            </tbody>
                         </table>
                    </div>
                </div>                                   
              

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script>
   <?php 
        if($this->input->get('status')){
            echo "$('#validasi').val('".$this->input->get('status')."');";
        }

        if($this->input->get('bulan')){
            echo "$('#bulan').val('".$this->input->get('bulan')."');";
        }

        if($this->input->get('kategori')){
            echo "$('#kategori').val('".$this->input->get('kategori')."');";
        }
   ?>
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
                    url:'<?= base_url('agenda/store')?>',
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
                            $('.bs-example-modal-lg').modal('hide');
                        }else{
                            swal('Peringatan',resp.msg,'warning');

                        
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
        } else if (result.dismiss) {
            swal.close();
        }
})
        
    })
    $(document).on('click','.delete',function(){
    var id = $(this).attr('data-id');
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
               window.location = '<?= base_url('agenda/delete?id=')?>'+id;
            } else if (result.dismiss) {
               swal.close();
            }
         })
})
</script>
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
			<?php if($this->session->userdata['isLog']['role'] == 'admin' OR $this->session->userdata['isLog']['role'] == 'camat' ){?>
            <div class="btn-group float-right">
            	<!-- Tambah Data -->
                <button class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg"><i class="fas fa-plus"> </i> Tambah Data</button>

                <!--  Modal content for the above example -->
		        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		            <div class="modal-dialog modal-lg">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Pegawai</h5>
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                    </div>
							<form  id="formAct" method="post">
		                    <div class="modal-body">
		                       
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="inputEmail4">NIP</label>
								      <input type="text" class="form-control" id="inputEmail4" name="nip" required>
								    </div>
								    <div class="form-group col-md-6">
								      <label for="inputPassword4">Nama</label>
								      <input type="text" class="form-control" id="inputPassword4" name="name" required>
								    </div>
								  </div>
								  <div class="form-row">
								    <div class="form-group col-md-4">
								      <label for="inputEmail4">Jenis Kelamin</label>
								      	<div class="form-group row">
	                                        <div class="col-md-9">
	                                            <div class="form-check-inline my-1">
	                                                <div class="custom-control custom-radio">
	                                                    <input type="radio" id="customRadio4" name="gender" class="custom-control-input" value="male">
	                                                    <label class="custom-control-label" for="customRadio4">Pria</label>
	                                                </div>
	                                            </div>
	                                            <div class="form-check-inline my-1">
	                                                <div class="custom-control custom-radio">
	                                                    <input type="radio" id="customRadio5" name="gender" class="custom-control-input" value="female">
	                                                    <label class="custom-control-label" for="customRadio5">Wanita</label>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>      
								    </div>
								    <div class="form-group col-md-4">
								      <label for="inputPassword4">No Telp</label>
								      <input type="text" class="form-control" id="inputPassword4" name="telp" required>
								    </div>
								    <div class="form-group col-md-4">
								      <label for="inputPassword4">Email</label>
								      <input type="email" class="form-control" id="inputPassword4" name="email" required>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputAddress">Alamat</label>
								    <textarea class="form-control" name="address"></textarea>
								  </div>
								  <div class="form-group">
								    <label for="inputAddress2">Divisi</label>
								    <select class="form-control" name="divisi">
								    	<option disabled selected>Pilih Divisi</option>
										<option value="Sekretariat Sub Bagian Umum dan Kepegawaian">Sekretariat Sub Bagian Umum dan Kepegawaian</option>
										<option value="Sekretariat Sub Bagian Keuangan">Sekretariat Sub Bagian Keuangan</option>
										<option value="Seksi Ketentraman dan Ketertiban Umum">Seksi Ketentraman dan Ketertiban Umum</option>
										<option value="Seksi Pelayanan Umum">Seksi Pelayanan Umum</option>
										<option value="Seksi Pemberdayaan Masyarakat Desa">Seksi Pemberdayaan Masyarakat Desa</option>
										<option value="Seksi Pemerintahan">Seksi Pemerintahan</option>
										<option value="Seksi Sosial">Seksi Sosial</option>
										<?php 
											$cek1 = $this->model_app->view_where('pegawai',array('pegawai_bagian'=>'Camat'));
											if($cek1->num_rows() == 0 AND $this->session->userdata['isLog']['role'] == 'camat' ){
												echo '<option value="Camat">Camat</option>';
											}
											?>
								    </select>
								  </div>
								
		                    </div>
		                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                <button  class="btn btn-primary waves-effect waves-light">Simpan</button>
                            </div>
							</form>
		                </div>
		            </div>
		        </div>


				<?php }?>
                <!-- End Tambah Data -->
            </div>

            <h4 class="page-title">Pegawai</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Seksi/Bagian</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>


                    <tbody>
					<?php if($record->num_rows() > 0){
							foreach($record->result_array() as $row){
								echo "<tr>
										<td>".$row['pegawai_nip']."</td>
										<td>".$row['pegawai_name']."</td>
										<td>".ucwords($row['pegawai_bagian'])."</td>
										<td>".$row['pegawai_email']."</td>
										<td>
										";
										echo "<a href=".base_url('pegawai/detail?id='.$row['pegawai_id']) ." class='btn btn-outline-primary waves-effect waves-light mr-2'><i class='fas fa-eye'></i></a>";
								if($this->session->userdata['isLog']['role'] == 'admin' OR $this->session->userdata['isLog']['role'] == 'camat' ){
									
									echo "<button class='btn btn-outline-info waves-effect waves-light edit mr-2' data-id='".$row['pegawai_id']."'><i class='fas fa-pencil-alt'></i></button>";
									echo "<button class='btn btn-outline-danger waves-effect waves-light delete' data-id='".$row['pegawai_id']."'><i class='fas fa-trash'></i></button>";
								}
								

								echo "</td>



									</tr>";
							}
					}?>
                   
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<div class="modal fade" id="modalEdit"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0" id="myLargeModalLabel">Form Edit Pegawai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="<?= base_url('pegawai/update')?>" id="formStore" method="post">
			<div class="modal-body">
				
					<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">NIP</label>
						<input type="text" class="form-control" id="nip" name="nip" required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Nama</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					</div>
					<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputEmail4">Jenis Kelamin</label>
						<div class="form-group row">
							<div class="col-md-9">
								<div class="form-check-inline my-1">
									<div class="custom-control custom-radio">
										<input type="radio" id="male" name="jk" class="custom-control-input gender" value="male">
										<label class="custom-control-label" for="male">Pria</label>
									</div>
								</div>
								<div class="form-check-inline my-1">
									<div class="custom-control custom-radio">
										<input type="radio" id="female" name="jk" class="custom-control-input gender" value="female">
										<label class="custom-control-label" for="female">Wanita</label>
									</div>
								</div>
							</div>
						</div>      
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">No Telp</label>
						<input type="text" class="form-control" id="telp" name="telp" required>
					</div>
					<div class="form-group col-md-4">
						<label for="inputPassword4">Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					</div>
					<div class="form-group">
					<label for="inputAddress">Alamat</label>
					<textarea class="form-control" name="address" id="address"></textarea>
					</div>
					<div class="form-group">
					<label for="inputAddress2">Seksi/Bagian</label>
					<select class="form-control" name="divisi" id="divisi">
						<option disabled selected></option>
						<option value="Sekretariat Sub Bagian Umum dan Kepegawaian">Sekretariat Sub Bagian Umum dan Kepegawaian</option>
						<option value="Sekretariat Sub Bagian Keuangan">Sekretariat Sub Bagian Keuangan</option>
						<option value="Seksi Ketentraman dan Ketertiban Umum">Seksi Ketentraman dan Ketertiban Umum</option>
						<option value="Seksi Pelayanan Umum">Seksi Pelayanan Umum</option>
						<option value="Seksi Pemberdayaan Masyarakat Desa">Seksi Pemberdayaan Masyarakat Desa</option>
						<option value="Seksi Pemerintahan">Seksi Pemerintahan</option>
						<option value="Seksi Sosial">Seksi Sosial</option>
					
						<?php 
							$cek1 = $this->model_app->view_where('pegawai',array('pegawai_bagian'=>'Camat'));
							if($cek1->num_rows() == 0 AND $this->session->userdata['isLog']['role'] == 'camat' ) {
								echo '<option value="Camat">Camat</option>';
							}
						?>
						
						

					</select>
					</div>
				
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id" id="id">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
				<button  class="btn btn-primary waves-effect waves-light">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>


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
                    url:'<?= base_url('pegawai/store')?>',
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
                            swal('Peringatan',resp.msg,'warning');

                        
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
        } else if (result.dismiss) {
            swal.close();
        }
})
        
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
                    url:'<?= base_url('pegawai/update')?>',
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
                            $('.bs-example-modal-lg').modal('hide');
                        }else{
                            swal('Peringatan',resp.msg,'warning');

                        
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
        } else if (result.dismiss) {
            swal.close();
        }
})
        
    })
	$(document).on('click','.edit',function(){
		var id = $(this).attr('data-id');
		$.ajax({
			type:'POST',
			url:'<?= base_url('pegawai/show')?>',
			data:{id:id},
			dataType:'json',
			success:function(resp){
				if(resp.status == true){
					$('#id').val(resp.arr.id);
					$('#nip').val(resp.arr.nip);
					$('#name').val(resp.arr.name);
					$("input[name=jk][value="+ resp.arr.gender+"]").attr('checked', 'checked');
				
					$('#telp').val(resp.arr.telp);
					$('#email').val(resp.arr.email);
					$('#address').val(resp.arr.address);
				
					if(resp.arr.bagian != 'Camat'){
						
						$('#optCamat').remove();
					}else{
						$('#divisi').append($('<option>', {
							value: 'Camat',
							text: 'Camat',
							id: 'optCamat',
						}));
					}
					$('#divisi').val(resp.arr.bagian);
					$('#modalEdit').modal('show');
				}else{
					swal(
                    {
                        title: 'Ooppss..',
                        text: resp.msg,
                        type: 'warning',
                       
                    }
                )
				}
			}
		})
	})
	$(document).on('click','.delete',function(){
		var id = $(this).attr('data-id');
		swal({
                title: 'Apakah anda yakin?',
                text: "data pegawai akan terhapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-2',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                
  
                if (result.value) {
					window.location = '<?= base_url('pegawai/delete?id=')?>'+id;
                } else if (result.dismiss) {
                   swal.close();
                }
             })
			
	})
</script>
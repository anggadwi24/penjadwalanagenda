 <?php 
 	$option = null;
	if($pegawai->num_rows() > 0){
		foreach($pegawai->result_array() as $peg){
			$cek = $this->model_app->view_where('users',array('users_pegawai_id'=>$peg['pegawai_id']));
			if($cek->num_rows() == 0 ){
				$option .= "<option value='".$peg['pegawai_id']."'>".$peg['pegawai_name']."</option>";
			}
		}
	}
 ?>
 
 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-right">
            	<!-- Tambah Data -->
                <button class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg"><i class="fas fa-plus"> </i> Tambah Data</button>

                <!--  Modal content for the above example -->
		        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		            <div class="modal-dialog modal-lg">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah User</h5>
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                    </div>
							<form action="<?= base_url('user/store')?>" id="formAct" method="POST">
		                    <div class="modal-body">
		                      
							   	  <div class="form-group">
								    <label for="inputAddress2">Role</label>
								    <select class="form-control"  name="role">
								    	<option value="pegawai" selected>Pegawai</option>
										<?php if($this->session->userdata['isLog']['role'] == 'camat'){ ?>
								    	<option value="admin">Admin</option>
									
										<option value="camat">Camat</option>
										<?php }?>

								    </select>
								  </div>
								  <div class="form-group" id="formName">
								      <label for="inputAddress">Nama Pegawai</label>
								       <select name="pegawai" class="form-control select2" required>
										   <option selected disabled></option>
										   <?= $option ?>
									   </select>
								  </div>
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="inputEmail4">Username</label>
								      <input type="text" class="form-control" id="inputEmail4" required name="username">
								    </div>
								    <div class="form-group col-md-6">
								      <label for="inputPassword4">Password</label>
								      <input type="password" class="form-control" id="inputPassword4" required name="password">
								    </div>
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



                <!-- End Tambah Data -->
            </div>
            <h4 class="page-title">User</h4>
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    </thead>


                    <tbody>
						<?php 
						
							if($record->num_rows() > 0){
								foreach($record->result_array() as $row){
									$peg = $this->model_app->view_where('pegawai',array('pegawai_id'=>$row['users_pegawai_id']))->row_array();
									echo "<tr>
											<td>".$peg['pegawai_name']."</td>
											<td>".$row['users_username']."</td>
											<td>".ucwords($row['users_role'])."</td>
											<td>
											<button class='btn btn-outline-info waves-effect waves-light edit' data-id='".$row['users_id']."'><i class='fas fa-pencil-alt'></i></button>

											
											
				
											<button class='btn btn-outline-danger waves-effect waves-light delete' data-id='".$row['users_id']."'><i class='fas fa-trash'></i></button>
											</td>


										</tr>";
								}
							}
						?>
                  
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
				<h5 class="modal-title mt-0" id="myLargeModalLabel">Form Edit User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form action="<?= base_url('user/update')?>" id="formStore" method="POST">
				<div class="modal-body">
					
						<div class="form-group">
						<label for="inputAddress2">Role</label>
						<select class="form-control" id="role" name="role">
							<option value="pegawai" selected>Pegawai</option>
							<?php if($this->session->userdata['isLog']['role'] == 'camat'){ ?>
							<option value="admin">Admin</option>
						
							<option value="camat">Camat</option>
							<?php }?>
						</select>
						</div>
						<div class="form-group" id="formName">
							<label for="inputAddress">Nama Pegawai</label>
							<select name="pegawai" id="pegawai" class="form-control select2" required>
								<option selected disabled></option>
								<?= $option ?>
							</select>
						</div>
						<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Username</label>
							<input type="text" class="form-control" id="username" required name="username">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Password</label>
							<input type="password" class="form-control" id="inputPassword4" name="password">
						</div>
						</div>
						
					
				</div>
				<div class="modal-footer">
					<input type="hidden" id="id" name="id">
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
                    url:'<?= base_url('user/store')?>',
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
                            $('.bs-example-modal-lg').modal('hide');
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
                    url:'<?= base_url('user/update')?>',
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
			url:'<?= base_url('user/detail')?>',

			data:{id:id},
			dataType:'json',
			success:function(resp){
				if(resp.status == true){
					$('#modalEdit').modal('show');
					$('#role').val(resp.data.role);
					$('#username').val(resp.data.username);
					$('#id').val(resp.data.id);
					var opt = $("<option>").val(resp.data.peg_id).text(resp.data.pegawai).attr('selected',true);

					$('#pegawai').append(opt);
				}else{
					swal({
						title: "Gagal",
						text: resp.msg,
						icon: "error",
						button: "Ok",
					});
				}
				


				
			}
		})
	})
	$(document).on('click','.delete',function(){
		var id = $(this).attr('data-id');
		swal({
                title: 'Apakah anda yakin?',
                text: "data user akan terhapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-2',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                
  
                if (result.value) {
					window.location = '<?= base_url('user/delete?id=')?>'+id;
                } else if (result.dismiss) {
                   swal.close();
                }
             })
			
	})
		
</script>
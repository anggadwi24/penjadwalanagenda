 <div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Hasil Kegiatan</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
                    <div class="col-12 mb-3"> <button class="btn btn-primary waves-effect waves-light float-right mr-3" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter"> <i class="fas fa-filter"></i> Filter</button>    </div>
                    <div class="col-12">
                        <div class="collapse multi-collapse" id="filter">
                            <div class="card card-body">
                                <form action="<?= base_url('hasil') ?>" method="GET">
                                    <div class="row">
                                    <?php 
                                        $col = 'col-6';
                                    ?>
                                        <div class="<?= $col ?> form-group">
                                            <label for="">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="all">Semua</option>
                                                <option value="internal">Internal</option>
                                                <option value="external">External</option>

                                            </select>
                                        </div>
                                      
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
                                <th>Nama Kegiatan</th>
                                <th>Tempat Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Penyelenggara</th>
                                <th></th>
                            </tr>
                            </thead>


                            <tbody>
                                <?php if($record->num_rows() > 0){
                                    foreach($record->result_array() as $row){
                                        echo "<tr>
                                                <td>".$row['agenda_name']."</td>
                                                <td>".$row['agenda_place']."</td>
                                            ";
                                            // if(date('Y-m-d',strtotime($row['agenda_date_start'])) ==  date('Y-m-d',strtotime($row['agenda_date_end']))){
                                            //     echo "<td>".date('d/m/Y',strtotime($row['agenda_date_start']))." ".date('H:i',strtotime($row['agenda_date_start']))." s/d ".date('H:i',strtotime($row['agenda_date_end']))." WITA</td>";
                                            // }else{
                                            //     echo "<td> ".date('d/m/Y H:i',strtotime($row['agenda_date_start']))." WITA s/d ".date('d/m/Y H:i',strtotime($row['agenda_date_end']))." WITA</td>";
        
                                            // }
                                            echo "<td> ".date('d/m/Y H:i',strtotime($row['agenda_date_start']))." WITA</td>";
                                        echo "  <td>".$row['agenda_penyelenggara']."</td>";
                                        echo    "<td>";
                                            echo    '<a href="'.base_url('hasil/detail?id='.$row['agenda_id']).'" class="btn btn-outline-primary waves-effect waves-light mr-1"><i class="fas fa-eye"></i></a>';
                                        if($this->session->userdata['isLog']['role'] == 'admin'){
                                            echo    '<a href="'.base_url('hasil/edit?id='.$row['agenda_id']).'" class="btn btn-outline-info waves-effect waves-light mr-1"><i class="fas fa-pencil-alt"></i></a>';
                                            echo    '<a href="#" class="btn btn-outline-danger waves-effect waves-light delete " data-id="'.$row['agenda_id'].'"><i class="fas fa-trash"></i></a>';

                                        }
                                        echo    "</td>";
                                        echo "

                                            </tr>";
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
      

        if($this->input->get('bulan')){
            echo "$('#bulan').val('".$this->input->get('bulan')."');";
        }

        if($this->input->get('kategori')){
            echo "$('#kategori').val('".$this->input->get('kategori')."');";
        }
   ?>
$(document).on('click','.delete',function(){
      var id = $(this).data('id');

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
              window.location = '<?= base_url('hasil/delete?id=')?>'+id;
          } else if (result.dismiss) {
              swal.close();
          }
          })
  })
</script>
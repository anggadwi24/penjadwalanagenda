<style>
    .textwhite{
        color: white;
    }
</style>

<?php 
    $user = $this->model_app->join_where2('users','pegawai','users_pegawai_id','pegawai_id',array('users_id'=>$this->session->userdata['isLog']['id']))->row_array();
    // $cekagenda = $this->model_app->view_where('agenda_pegawai',array('ap_pegawai_id'=>$user['pegawai_id']));
$cekagenda = $this->db->query('select * from  agenda a JOIN agenda_pegawai b ON a.agenda_id = b.ap_agenda_id  where agenda_date_start BETWEEN "'.date('Y-m-d 00:00:00',strtotime('monday this week')).'" AND "'.date('Y-m-d 23:59:59',strtotime('sunday this week')).'" AND ap_pegawai_id = "'.$user['pegawai_id'].'" ');
?>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>


 <!-- sample modal content -->
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" >
         <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                    <div class="col-12 table-responsive">
                        <h5>Selamat Datang <?= $user['pegawai_name'] ?></h5>
                        <p>Berikut jadwal agenda kegiatan milik anda</p><br>
                         <table id="datatable1" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Agenda Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Tempat Kegiatan</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cekagenda->result_array() as $row){

                                // $row = $this->model_app->view_where('agenda',array('agenda_id'=>$cgd['ap_agenda_id']))->row_array();
                                ?>
                                <tr>
                                    <td><a href='<?= base_url('agenda/detail?id='.$row['agenda_id']) ?>' ><?= $row['agenda_name'] ?></a></td>
                                    <td><?= date('d/m/Y H:i',strtotime($row['agenda_date_start'])) ?> s/d <?= date('d/m/Y H:i',strtotime($row['agenda_date_end'])) ?> WITA</td>
                                    <td><?= $row['agenda_place'] ?></td>
                                </tr>
                                <?php } ?>                                
                            </tbody>
                        </table>
                    </div>
                    <br>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <?php if($this->session->userdata['isLog']['role'] != 'pegawai'){
                $unvalid = $this->model_app->view_where('agenda',array('agenda_validasi'=>'n','agenda_validasi_by'=>NULL,'agenda_status !='=>'done'));
                $valid =  $this->model_app->view_where('agenda',array('agenda_validasi'=>'y','agenda_validasi_by !='=>NULL,'agenda_status !='=>'done'));
                $ditolak =  $this->model_app->view_where('agenda',array('agenda_validasi'=>'y','agenda_validasi_by !='=>NULL,'agenda_status'=>'ditolak'));

                if($this->session->userdata['isLog']['role'] == 'admin'){
                    $col = 'col-lg-4';
                }else{
                    $col = 'col-lg-6';
                }
                ?>
            <div class="<?= $col ?>">
                <div class="card bg-warning">
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row">
                            
                                <div class="col-10 text-left">
                                    <h5 class="mt-0 mb-1 textwhite"><?= $unvalid->num_rows() ?></h5>
                                    <p class="mb-0 font-20 textwhite">Kegiatan belum divalidasi</p>   
                                </div>
                                <div class="col-2 textwhite text-center">
                                    <i class="fa fa-history" aria-hidden="true"></i>

                                </div>
                            </div>                                                        
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="<?= base_url('agenda?status=belum')?>" class="font-16">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="<?= $col ?>">
                <div class="card  bg-success">
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row">
                                
                                <div class="col-10 text-left ">
                                    <h5 class="mt-0 mb-1 textwhite"><?=$valid->num_rows() ?></h5>
                                    <p class="mb-0 font-20 textwhite">Kegiatan sudah divalidasi</p>    
                                </div>
                                <div class="col-2 textwhite text-center">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </div>                                                        
                        </div>                                                    
                    </div>
                    <div class="card-footer bg-light">
                 
                        <a href="<?= base_url('agenda?status=sudah')?>" class="font-16">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                 
                    </div>
                </div>
            </div>   
            <?php if($this->session->userdata['isLog']['role'] == 'admin'){?>
            <div class="<?= $col ?>">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row">
                            
                                <div class="col-10 text-left">
                                    <h5 class="mt-0 mb-1 textwhite"><?= $ditolak->num_rows() ?></h5>
                                    <p class="mb-0 font-20 textwhite">Kegiatan ditolak </p>   
                                </div>
                                <div class="col-2 textwhite text-center">
                                    <i class="fa fa-times" aria-hidden="true"></i>

                                </div>
                            </div>                                                        
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="<?= base_url('agenda?status=ditolak')?>" class="font-16">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>  
            <?php }?>                                        
        </div> 
        <?php }else{
             $valid =  $this->model_app->view_where('agenda',array('agenda_validasi'=>'y','agenda_validasi_by !='=>NULL,'agenda_status !='=>'done'));
            ?>
            <div class="col-lg-6">
                <div class="card  bg-success">
                    <div class="card-body">
                        <div class="icon-contain">
                            <div class="row">
                                
                                <div class="col-10 text-left">
                                    <h5 class="mt-0 mb-1 textwhite"><?=$valid->num_rows() ?></h5>
                                    <p class="mb-0 font-20 textwhite">Kegiatan sudah divalidasi</p>    
                                </div>
                                <div class="col-2 textwhite">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </div>                                                        
                        </div>                                                    
                    </div>
                    <div class="card-footer bg-light">
                 
                        <a href="<?= base_url('agenda')?>" class="font-16">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                 
                    </div>
                </div>
            </div>           
        <?php }?>
        <div class="col-12 my-2">
            <div class="card">
            <div class="card-body">
                
                <h5 class="header-title mb-4 mt-0">Calendar</h5>
                <div id='calendar'></div>
            </div>
        </div>  
        </div>
                                          
    </div>                             
</div>
<!-- end row -->

<script type="text/javascript">
        $(document).ready(function(){
            if (<?= $this->session->flashdata('modal')?>==true) {
             $('#myModal').modal('show');
            }else{}
        });
    </script>
<script>

    var baseUrl='<?= base_url('main/') ?>';
    data();
    function data(){
   
   $.ajax({
       
       type:'POST',
       url:baseUrl+'getCalendar',
      
       dataType:'json',
      success:function(resp){
           if(resp.status == true){
               
               $('#calendar').fullCalendar({
                   header: {
                       left: 'prev,next today',
                       center: 'title',
                       right: 'month,basicWeek,basicDay'
                   },
                   editable: false,
                   eventLimit: true, /* -- allow "more" link when too many events -- */
                   droppable: false, /* -- this allows things to be dropped onto the calendar !!! -- */
                   drop: function(date, allDay) { /* -- this function is called when something is dropped -- */
                       /* -- retrieve the dropped element's stored Event Object -- */
                       var originalEventObject = $(this).data('eventObject');
                       /* -- we need to copy it, so that multiple events don't have a reference to the same object -- */
                       var copiedEventObject = $.extend({}, originalEventObject);
                       /* -- assign it the date that was reported -- */
                       copiedEventObject.start = date;
                       copiedEventObject.allDay = allDay;
                       /* -- render the event on the calendar -- */
                       /* -- the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/) -- */
                       $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                       /* -- is the "remove after drop" checkbox checked? -- */
                      
                   },
                //    eventClick: function(event, element)
                //    {
                   
                //       detailBook(event.id,event.status);
                //    },
                   events: resp.arr
               });        
           }else{
               swal('Oopss.',resp.msg,'warning');
           }
          
       }
       
       
   })
}

</script>
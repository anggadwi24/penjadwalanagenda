<style>
    .textwhite{
        color: white;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
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
                                    <p class="mb-0 font-16 textwhite">Kegiatan belum divalidasi</p>   
                                </div>
                                <div class="col-2 textwhite text-center">
                                    <i class="fa fa-history" aria-hidden="true"></i>

                                </div>
                            </div>                                                        
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="<?= base_url('agenda?status=belum')?>">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
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
                                    <p class="mb-0 font-16 textwhite">Kegiatan sudah divalidasi</p>    
                                </div>
                                <div class="col-2 textwhite text-center">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </div>                                                        
                        </div>                                                    
                    </div>
                    <div class="card-footer bg-light">
                 
                        <a href="<?= base_url('agenda?status=sudah')?>">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                 
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
                                    <p class="mb-0 font-16 textwhite">Kegiatan ditolak </p>   
                                </div>
                                <div class="col-2 textwhite text-center">
                                    <i class="fa fa-times" aria-hidden="true"></i>

                                </div>
                            </div>                                                        
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <a href="<?= base_url('agenda?status=ditolak')?>">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
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
                                    <p class="mb-0 font-16 textwhite">Kegiatan sudah divalidasi</p>    
                                </div>
                                <div class="col-2 textwhite">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </div>                                                        
                        </div>                                                    
                    </div>
                    <div class="card-footer bg-light">
                 
                        <a href="<?= base_url('agenda')?>">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                 
                    </div>
                </div>
            </div>           
        <?php }?>
        <div class="card">
            <div class="card-body">
                
                <h5 class="header-title mb-4 mt-0">Calendar</h5>
                <div id='calendar'></div>
            </div>
        </div>                                    
    </div>                             
</div>
<!-- end row -->

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
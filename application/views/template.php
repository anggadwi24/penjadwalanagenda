
<?php 
    if(isset($title)){
        $title = $title;
    }else{
        $title = 'PENJADWALAN AGENDA KEGIATAN - KECAMATAN KUTA SELATAN';
    }
    $user = $this->model_app->join_where2('users','pegawai','users_pegawai_id','pegawai_id',array('users_id'=>$this->session->userdata['isLog']['id']))->row_array();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?= $title ?></title>
        <meta content="KECAMATAN KUTA SELATAN" name="description" />
        <meta content="PENJADWALAN AGENDA KEGIATAN KECAMATAN KUTA SELATAN" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
        <link href="<?= base_url() ?>assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">

        <!-- Magnific popup -->
        <link href="<?= base_url() ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

       <!-- Plugins css -->
        <link href="<?= base_url() ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" /> 
        <link href="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <!-- DataTables -->
        <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />


        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/light/css/lightgallery.css" rel="stylesheet">
        <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
        
        <script src="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/moment/moment.js"></script>

        <script src='<?= base_url() ?>assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
    
        <style>
                .fix{
                width:85%; z-index: 2;
                margin-bottom: 3px;
                }
            
            @media screen and (max-width: 1866px) {
                .fix{
                width:85%; z-index: 2;
                }
            }
            @media screen and (max-width: 1766px) {
                .fix{
                width:84%; z-index: 2;
                }
            }
             @media screen and (max-width: 1666px) {
                .fix{
                width:83%; z-index: 2;
                }
            }
            @media screen and (max-width: 1566px) {
                .fix{
                width:81%; z-index: 2;
                }
            }
            @media screen and (max-width: 1466px) {
                .fix{
                width:79%; z-index: 2;
                }
            }
             @media screen and (max-width: 1366px) {
                .fix{
                width:79%; z-index: 2;
                }
            }
            @media screen and (max-width: 1266px) {
                .fix{
                width:78%; z-index: 2;
                }
            }
            @media screen and (max-width: 1166px) {
                .fix{
                width:75%; z-index: 2;
                }
            }
            @media screen and (max-width: 1024px) {
                .fix{
                width:100%; z-index: 2;
                }
            }
        </style>

    </head>

    

    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left" >
                    <div class="text-center bg-logo" style="height:70px;">
                        <a href="<?= base_url('') ?>" class="logo"><i class="mdi mdi-bowling text-success"></i> PENJADWALAN AGENDA KEGIATAN 
                        </a>
                        <!-- <a href="index.html" class="logo"><img src="<?= base_url() ?>assets/images/logo.png" height="24" alt="logo"></a> -->
                    </div>
                </div>
                <div class="sidebar-user">
                    <img src="<?= base_url('upload/docs/logo.png') ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <h4 class=""><?= $user['pegawai_name'] ?> </h4> 
                    <p style="font-size:1.rem"><?= ucfirst($user['users_role'])?></p>
                    <!-- <ul class="list-unstyled list-inline mb-0 mt-2">
                        <li class="list-inline-item">
                            <a href="<?= base_url('profile') ?>" class="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="dripicons-user text-purple"></i></a>
                        </li>
                      
                        <li class="list-inline-item">
                            <a href="<?= base_url('logout')?>" class="" data-toggle="tooltip" data-placement="top" title="Log out"><i class="dripicons-power text-danger"></i></a>
                        </li>
                    </ul>            -->
                </div>
                <div class="sidebar-inner ">

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?= base_url() ?>" class="waves-effect">
                                    <i class="dripicons-device-desktop"></i>
                                    <span> Dashboard</span>
                                </a>
                            </li>

                           
                            <li>
                                <a href="<?= base_url('agenda') ?>" class="waves-effect">
                                    <i class="dripicons-blog"></i>
                                    <span> Agenda Kegiatan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('hasil') ?>" class="waves-effect">
                                    <i class="dripicons-copy"></i>
                                    <span> Hasil Kegiatan</span>
                                </a>
                            </li>
                         
                        
                            <li>
                                <a href="<?= base_url('pegawai') ?>" class="waves-effect">
                                    <i class="dripicons-user"></i>
                                    <span> Pegawai</span>
                                </a>
                            </li>
                            <?php 
                                if($this->session->userdata['isLog']['role'] == 'admin' OR $user['users_role'] == 'camat'){

                                
                            ?>
                            <li>
                                <a href="<?= base_url('user') ?>" class="waves-effect">
                                    <i class="dripicons-user"></i>
                                    <span> User</span>
                                </a>
                            </li>
                            <?php }?>
                         

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar" >

                        <nav class="navbar-custom fix" style="position: fixed;">

                            <ul class="list-inline float-right mb-0" >
                               
                               

                                <li class="list-inline-item dropdown notification-list " >
                               
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user " style="margin-left:-4rem" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-bars text-white" style="font-size:18px;"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><?= ucfirst($user['pegawai_name'])?></h5>
                                        </div>
                                        <a class="dropdown-item" href="<?= base_url('profile')?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                      
                                        <a class="dropdown-item" href="<?= base_url('logout')?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                
                                </li>
                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                              
                            </ul>

                            <div class="clearfix"></div>
                        </nav>
                    </div>
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid" style="margin-top: 50px;">
                            


                            <?= $contents ?>


                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © <?= date('Y') ?> Kecamatan Kuta Selatan
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

<?php 
if($this->session->flashdata('error')){
   
?>
    <script>
         var msg = <?= $this->session->flashdata('error') ?>;
        swal(
            {
                title: 'Ooppss..',
                text: msg,
                type: 'warning',
                
            }
        )
    </script>   
    <?php
}
?>
<?php
if($this->session->flashdata('success')){ ?>
    <script>
        swal(
            {
                title: 'Success',
                html: '<?= $this->session->flashdata('success') ?>',
                type: 'success',
                
            }
        )
    </script>
    <?php }?>


        <!-- jQuery  -->
        <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/modernizr.min.js"></script>
        <script src="<?= base_url() ?>assets/js/detect.js"></script>
        <script src="<?= base_url() ?>assets/js/fastclick.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?= base_url() ?>assets/js/waves.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?= base_url() ?>assets/plugins/chart.js/chart.min.js"></script>
        <script src="<?= base_url() ?>assets/pages/dashboard.js"></script>

        <!-- Required datatable js -->
        <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?= base_url() ?>assets/pages/datatables.init.js"></script>
        <!-- App js -->
        <script src="<?= base_url() ?>assets/js/app.js"></script>
        <!-- modal -->
        <script src="<?= base_url() ?>assets/pages/modal-animation.js"></script>

        <!-- Plugins js -->
        <script src="<?= base_url() ?>assets/plugins/timepicker/moment.js"></script>
        <script src="<?= base_url() ?>assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
        <script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="<?= base_url() ?>assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/colorpicker/jquery-asColor.js"></script>
        <script src="<?= base_url() ?>assets/plugins/colorpicker/jquery-asGradient.js"></script>
        <script src="<?= base_url() ?>assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/select2/select2.min.js"></script>

        <script src="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/tinymce/tinymce.min.js"></script>
        <!-- Plugins Init js -->
        <script src="<?= base_url() ?>assets/pages/form-advanced.js"></script> 
        <script src="<?= base_url() ?>assets/pages/form-editor.js"></script>

        <!-- Magnific popup -->
        <script src="<?= base_url() ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url() ?>assets/pages/lightbox.js"></script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
        <script src="<?= base_url()?>assets/light/js/lg-rotate.js"></script>
        <script>
            $('#datatable').dataTable( {
                "order": [],
} );
            lightGallery(document.getElementById('lightgallery'),{
                selector:'.item',
            }
                
            );
            
        </script>

        <script>
         "use strict";
(() => {
const modified_inputs = new Set;
const defaultValue = "defaultValue";
// store default values
addEventListener("beforeinput", (evt) => {
    const target = evt.target;
    if (!(defaultValue in target || defaultValue in target.dataset)) {
        target.dataset[defaultValue] = ("" + (target.value || target.textContent)).trim();
    }
});
// detect input modifications
addEventListener("input", (evt) => {
    const target = evt.target;
    let original;
    if (defaultValue in target) {
        original = target[defaultValue];
    } else {
        original = target.dataset[defaultValue];
    }
    if (original !== ("" + (target.value || target.textContent)).trim()) {
        if (!modified_inputs.has(target)) {
            modified_inputs.add(target);
        }
    } else if (modified_inputs.has(target)) {
        modified_inputs.delete(target);
    }
});
// clear modified inputs upon form submission
addEventListener("submit", (evt) => {
    modified_inputs.clear();
    // to prevent the warning from happening, it is advisable
    // that you clear your form controls back to their default
    // state with evt.target.reset() or form.reset() after submission
});
// warn before closing if any inputs are modified
addEventListener("beforeunload", (evt) => {
    if (modified_inputs.size) {
        const unsaved_changes_warning = "Warnings.";
        evt.returnValue = unsaved_changes_warning;
        return unsaved_changes_warning;
    }
});
})();
        </script>

    </body>
</html>
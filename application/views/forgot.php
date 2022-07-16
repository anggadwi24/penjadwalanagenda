
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>PENJADWALAN AGENDA KEGIATAN - KECAMATAN KUTA SELATAN</title>
        <meta content="KECAMATAN KUTA SELATAN" name="description" />
        <meta content="PENJADWALAN AGENDA KEGIATAN KECAMATAN KUTA SELATAN" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css">

        <link href="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    </head>

<style>
        .field-icon {
  right:15px;
  margin-left:-25px;
  padding-left:-0px;
  margin-top: 12px;
  position: absolute;
  z-index: 99;
} 
a:hover{
    text-decoration: underline;
}
</style>
    <body class="fixed-left" >

        <div class="accountbg position-fixed"  style="overflow: hidden ;"></div>
        <div class="wrapper-page position-fixed" style="max-width:30%;overflow:hidden;left:0;right:0">

            <div class="card" style="border:none;border-radius:30px;overflow:hidden">
                <div class="card-body">

                    <div class="text-center m-b-15">
                      <img src="<?= base_url('upload/docs/logo.png') ?>"  class="img-fluid" alt="" style="width:150px;">
                      <h6 class="text-center mb-0" style="font-size: 22px;">Sistem Informasi Penjadwalan Agenda Kegiatan</h6>
                      <h6 class="text-center mt-1" style="font-size: 22px;">Kantor Kecamatan Kuta Selatan</h6>
                      <hr style="width:50%;border-top:1px solid black">
                      <h6 class="text-center mt-4" style="font-size: 22px;">Lupa Password</h6>
                      
                    </div>

                    <div class="px-3 pb-3 pt-0">
                        <form class="form-horizontal mt-3" action="<?= base_url('forgot/do') ?>" method="post">

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="">Masukan Email</label>
                                    <!--  -->
                                    <label class="sr-only" for="inlineFormInputGroup">Email</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"  style="background:white;"><i class="fas fa-envelope"></i></div>
                                        </div>
                                        <input class="form-control" type="text" required="" name="email" placeholder="email">
                                    </div>
                                </div>
                            </div>

                           

                            <!-- <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>
                             -->
                            <div class="form-group  row m-t-20">
                                <div class="col-4">
                                    <a href="<?= base_url('auth/')?>">Login</a>
                                </div>
                                <div class="col-8 ">
                                    <button class="btn btn-primary btn-block waves-effect waves-light float-right w-75" type="submit" style="border-radius:5px;">Kirim</button>
                                </div>
                            </div>

                            <!-- <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                                </div>
                            </div> -->
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- jQuery  -->
      
        <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script>
            $(document).on('click','#toggle',function(){
                var pass = $('#password').attr('type');
                if(pass == 'password'){
                    $('#password').attr('type','text');
                    $('#toggle').html('<i class="fas fa-eye-slash"></i>');
                }else{
                    $('#password').attr('type','password');
                    $('#toggle').html('<i class="fas fa-eye"></i>');


                }
                
            })
        </script>
        <?php 
if($this->session->flashdata('erorr')){
   
?>
    <script>
         var msg = <?= $this->session->flashdata('erorr') ?>;
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

        <!-- App js -->
        <script src="<?= base_url() ?>assets/js/app.js"></script>

    </body>
</html>
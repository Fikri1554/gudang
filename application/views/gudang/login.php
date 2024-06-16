<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title>Login</title>

    <!-- Site favicon -->
    <link rel="icon" href="<?php echo base_url('assets/img/andhika.gif'); ?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/andhika.gif'); ?>" type="image/x-icon"/>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/style.css" />

    <script type="text/javascript">

        $(document).ready(function(){
            $("#txtpass").keyup(function(event){
                if(event.keyCode === 13){
                    $("#btnLogin").click();
                }
            });
        });

        function loginUser()
        {
            var user = $('#txtuser').val();
            var pass = $('#txtpass').val();

            $.post('<?php echo base_url("gudang/login"); ?>',
            { user : user,pass : pass },
              function(data)
              {
                $("#idLoading").hide();
                if(data['status'] == "0")// gagal login
                {
                    alert(data['textSt']);
                  $("#idLblAlert").text(data['textSt']);
                }else{
                  window.location = "<?php echo base_url('gudang/getData');?>";
                }            
              },
            "json"
            );

        }
    </script>


</head>

<body class="login-page">
    <!-- <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="<?php echo base_url(); ?>assets/vendors/images/deskapp-logo.svg" alt="" />
                </a>
            </div>
        </div>
    </div> -->
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?php echo base_url(); ?>assets/vendors/images/login-page-img.png" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login</h2>
                        </div>
                        <form>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" id="txtuser" name="txtuser" placeholder="Username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" id="txtpass" name="txtpass" placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <a class="btn btn-primary btn-lg btn-block" id="btnLogin" style="color:#FFFFFF;" onclick="loginUser();">Sign In</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/layout-settings.js"></script>
    
</body>

</html>
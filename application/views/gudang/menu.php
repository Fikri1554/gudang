<?php
  if(!$this->session->userdata('idUserGudang'))
  {
    redirect(base_url("gudang"));
  }
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Andhika Group</title>

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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?><?php echo base_url(); ?>assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?><?php echo base_url(); ?>assets/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/styles/style.css" />

</head>

<body>
   <!--  <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="<?php echo base_url(); ?>assets/img/andhika.gif" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> -->

    <div class="header" style="background-color:#250F2C;">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="" style="padding-left:15px;"><label>System GD</label></a>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="nav-link">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-stack"></span><span class="mtext">Data</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url('gudang/getData'); ?>">Gudang</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" >
                      <a class="nav-link" href="<?php echo base_url('gudang/logout'); ?>" style="font-size:16px;font-weight:bold;color:#FFFFFF;" title="Log Out Data">
                        <span class="nav-link-title">
                          <i class="fa fa-user-circle"></i>&nbsp Log Out
                        </span>
                      </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>    
    <!-- js -->
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/core.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/script.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/process.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/layout-settings.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/scripts/dashboard3.js"></script>
    <!-- Google Tag Manager (noscript) -->
   
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
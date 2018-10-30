<?php
    defined('BASEPATH') OR exit ('No direct script access allowed');

    if($this->session->userdata('is_logged_in') != true){
        redirect(base_url('auth'));
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | PT. JAS Aero Engineering</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/linearicons/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/chartist/css/chartist-custom.css'); ?>">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css'); ?>">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png'); ?>">

    <!-- datatables -->
    <!--<link rel="stylesheet" href="<?php //echo base_url('assets/dad/datatables/css/dataTables.bootstrap.css'); ?>"> //work -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <!-- TinyMCE -->
    <script src="<?php echo base_url()?>plugins/tinymce/js/tinymce/tinymce.min.js"></script>
    <!-- end -->

    <!-- datepicker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datepicker3.css'); ?>">

</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="<?php echo base_url('main/dashboard'); ?>"><img src="<?php echo base_url('assets/img/jae-admin.png'); ?>" alt="JAS Aero-Engineering Services Logo" class="img-responsive logo"></a>
                <!-- can be add style="width:119px; height:21px;" at logo -->
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        -->
                        <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">User Manual</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li>
                        -->
                        <li class="dropdown">
                            <?php 
                                $email = $this->session->userdata('email');
                                $sql = "SELECT users.photo FROM users WHERE email = '$email'";
                                $query = $this->db->query($sql);
                                $num = $query->num_rows();

                                if($num > 0){
                                    $pic = $query->row()->photo;
                                    if($pic == ''){
                                        $pic = 'image_not_available.jpg';
                                    }
                                    else {
                                        $pic = $pic;
                                    }
                                } else {
                                    $pic = 'image_not_available.jpg';
                                }

                                $image = base_url('./img_user/'.$pic);
                                    if(!file_exists ($image)){
                                        $picture = $image;
                                    } else {
                                        $picture = base_url('img_user/image_not_available.jpg');
                                    }
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=$picture?>" class="img-circle" alt="Avatar"> <span><?php echo ucfirst($this->session->userdata('complete_name')); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            
                            <ul class="dropdown-menu">
                                <!--
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                -->
                                <!--
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                -->
                                <li><a href="<?php echo base_url('auth/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        
                        <li><a href="<?php echo base_url('main/dashboard');?>" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-screen"></i> <span>Content</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <?php if($this->session->userdata('users_level') == 'Sadmin' OR $this->session->userdata('users_level') == 'Admin') { ?>
                                    <li><a href="<?php echo base_url('id_web/web_list');?>" class="">Web Identity</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url('slider/slider_list');?>" class="">Image Slider</a></li>
                                </ul>
                            </div>
                        </li>                        
                        <li>
                            <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-list"></i> <span>Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages2" class="collapse ">
                                <ul class="nav">
                                    <li><a href="<?php echo base_url('profile/profile_list');?>" class="">Profile</a></li>
                                    <li><a href="<?php echo base_url('servicelist/service_list');?>" class="">Services</a></li>
                                    <!--<li><a href="<?php //echo base_url('facility/facility_list');?>" class="">Facility</a></li>-->
                                    <li><a href="<?php echo base_url('customer/cust_list');?>" class="">Customer</a></li>
                                    <?php if($this->session->userdata('users_level') == 'Sadmin' OR $this->session->userdata('users_level') == 'Admin') { ?>
                                    <li><a href="<?php echo base_url('applist/app_list');?>" class="">Application</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url('careerlist/career_list');?>" class="">Career</a></li>
                                    <li><a href="<?php echo base_url('newslist/news_list');?>" class="">News</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages3" class="collapse ">
                                <ul class="nav">
                                    <?php if($this->session->userdata('users_level') == 'Sadmin') { ?>
                                    <li><a href="<?php echo base_url('users/user_list');?>" class="">Users</a></li>
                                    <li><a href="<?php echo base_url('log/log_list');?>" class="">Logs</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url('archivelist/archive_list');?>" class="">Archives</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?php echo base_url('contactlist/contact_list');?>" ><i class="lnr lnr-envelope"></i> <span>Contact Us</span></a></li>

                        <?php
                        //-- dynamic main menu
                        //$main_menu = $this->db->get_where('menu_utama', array('isMainMenu' => 0)); //, 'isActiveMnUtama' => 'Y'));
                
                        //foreach ($main_menu->result() as $main) {
                            // Query untuk mencari data sub menu
                            //$sub_menu = $this->db->get_where('menu_utama', array('isMainMenu' => $main->id_mnUtama));
                            // periksa apakah ada sub menu
                            /*
                            if ($sub_menu->num_rows() > 0) {
                                // main menu dengan sub menu
                                echo "<li>
                                    <a href='#subPages' data-toggle='collapse' class='collapsed'><i class=' . $main->icon_mnUtama . '></i><span>" . $main->label_mnUtama . "</span><i class='icon-submenu lnr lnr-chevron-left'></i></a>
                                    <div id='subPages' class='collapse'>
                                    <ul class='nav'>";

                                // submenu
                                foreach ($sub_menu->result() as $sub) {
                                    echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon_mnUtama . '"></i>' . $sub->label_mnUtama) . "</li>";
                                }

                                echo "</ul>
                                    </li>";

                            } else {
                                */
                                // main menu tanpa sub menu
                                //echo "<li>" . anchor($main->link, '<i class="' . $main->icon_mnUtama . '"></i>' . $main->label_mnUtama) . "</li>";
                            //}
                        //}
                        ?>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <?php echo $contents; ?>
                
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2018. <a href="https://jas-aero.com" target="_blank">PT JAS Aero-Engineering Services</a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>   

    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/scripts/klorofil-common.js'); ?>"></script>
    
    <!-- tinyMCE -->
    <script type='text/javascript'> 
        tinymce.init({ selector:'textarea', menubar:'', theme: 'modern', plugins: 'lists, advlist'});
    </script>

    <!-- datatables -->
    <!--<script src="<?php //echo base_url('assets/dad/datatables/js/jquery.dataTables.min.js'); ?>"></script> //work -->
    <!--<script src="<?php //echo base_url('assets/dad/datatables/js/dataTables.bootstrap.js'); ?>"></script> //work -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/Javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
    <!-- end of datatables -->

    <!-- datepicker -->
    <script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script type="text/javascript">
        /*-- add --*/
        $(document).ready(function () {
            $('#tanggal').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });

        /*-- edit --*/
        $(document).ready(function () {
            $('#tanggal1').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>
    <!-- end calendar -->
   
    <script>
    $(function() {
        var data, options;

        // headline charts
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 300,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);


        // visits trend charts
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);

        // visits chart
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [6384, 6342, 5437, 2764, 3958, 5068, 7654]
            ]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);


        // real-time pie chart
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function(percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000; // in milliseconds

        setInterval(function() {
            var randomVal;
            randomVal = getRandomInt(0, 100);

            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });

    
    </script>

</body>
</html>






   

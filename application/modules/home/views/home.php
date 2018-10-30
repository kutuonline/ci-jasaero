<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<?php foreach($idHome as $row1){ ?>
<title><?php echo $row1->website_name; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="<?php echo strip_tags($row1->meta_desc); ?>" content="<?php echo strip_tags($row1->meta_keyword); ?>" />
<meta name="Doni Andriansyah" content="https://jas-aero.com" />
<!-- css -->
<link href="<?php echo base_url('assets/template/css/bootstrap.min.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/css/fancybox/jquery.fancybox.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/template/css/jcarousel.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/css/flexslider.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/js/owl-carousel/owl.carousel.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/template/css/style.css');?>" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- carousel css -->
<link rel="stylesheet" href="<?php echo base_url('assets/template/css/carousel.css'); ?>">
<!-- end -->
 
<!-- ICONS -->
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png'); ?>">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- avoid right click on mouse -->
<script type="text/javascript">
function mousedwn(e){try{if(event.button==2||event.button==3)return false}catch(e){if(e.which==3)return false}}document.oncontextmenu=function(){return false};document.ondragstart=function(){return false};document.onmousedown=mousedwn
</script>

<style type="text/css">
* : (input, textarea) {
    -webkit-touch-callout: none;
    -webkit-user-select: none;

}
</style>

<style type="text/css">
img {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
    }
</style>
<!-- end of avoid right click on mouse -->

<!-- avoid view page source and ctrl + U -->
<script type="text/javascript">
window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
</script>
<!-- end of avoid view page source and ctrl + U -->

</head>

<?php 
  function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
  }
?>

<body>
<div id="wrapper" class="home-page">
  <!-- start header -->
  <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/img/logo-jasaero.png');?>" alt="logo" style="width:75%" class="img-responsive"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url('home'); ?>">Home</a></li> 
                        <li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
                        <li><a href="<?php echo base_url('service'); ?>">Services</a></li>
                        <li><a href="<?php echo base_url('news'); ?>">News</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
  </header>
  <!-- end header -->

  <section id="banner">   
  <!-- Slider -->
  <div id="main-slider" class="flexslider">
      <ul class="slides">
          <?php foreach($slider as $row6){ ?>
              <li>
                  <img src="<?=base_url()?>img_slider/<?=$row6->img_slider?>" alt="" oncontextmenu="return false;"/>
                  <div class="flex-caption">
                      <h3><?php echo $row6->slider_name; ?></h3> 
                      <p><?php echo $row6->desc_slider; ?></p> 
                  </div>
              </li>
          <?php } ?>
      </ul>
  </div>
  <!-- end slider --> 
  </section> 

  <section id="call-to-action-2">
      <div class="container">
          <div class="row">
              <div class="col-md-10 col-sm-9">
                  <h3>Welcome to <?php echo $row1->corp_name; ?></h3>
                  <p><?php echo $row1->welcome_note; ?></p>
              </div>
              <div class="col-md-2 col-sm-3">
                  <a href="<?php echo base_url('aboutus'); ?>" class="btn btn-primary">Learn More</a>
              </div>
          </div>
      </div>
  </section>
  
  <section id="content">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <?php foreach($service as $row5){ ?>
              <div class="aligncenter">
                  <h2 class="aligncenter"><?php echo $row5->title_profile; ?></h2>
                  <p><?php echo $row5->desc_profile; ?></p>
              </div>
              <?php } ?>
              <br/>
          </div>
      </div>
      
      <div class="row">
          <div class="skill-home"> 
              <div class="skill-home-solid clearfix"> 

                  <?php foreach($serv as $row2): ?>
                  <div class="col-md-3 text-center">
                      <img src="<?=base_url()?>img_service/<?=$row2->img_service;?>" style="width:50%; border:none" oncontextmenu="return false;">
                      <div class="box-area">
                          <h3><?php echo strip_tags($row2->title); ?></h3>
                          <p><?php echo strip_tags($row2->desc_service); ?> </p>
                      </div>
                  </div>
                  <?php endforeach; ?>
      
              </div>
          </div>
      </div> 
  </div>
  </section>
  
  <section class="section-padding gray-bg">
      <div class="container">
          <div class="row">
              <div class="col-md-12">

                  <?php foreach($profil as $row3){ ?>
                  <div class="section-title text-center">
                      <h2><?php echo $row3->title_profile; ?></h2>
                      <p><?php echo $row3->desc_profile; ?></p>
                  </div>
                  <?php } ?>

              </div>
          </div>
      </div>
  </section> 

  <section id="clients">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <?php foreach($cust as $row4){ ?>
                      <div id="customers" class="aligncenter"><h2 class="aligncenter"><?php echo $row4->title_profile; ?></h2><?php echo $row4->desc_profile; ?></div>
                  <?php } ?>
              </div>
          </div>
      </div>
  </section>

    <!-- carousel -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="Carousel" class="carousel slide">

                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row"> 
                                <?php foreach($cust_carousel as $i => $logo){ ?>
                                    <?php if (($i > 0) && ($i % 4 == 0)) { ?>
                            </div><!--.row-->
                        </div><!--.item-->
                
                        <div class="item">
                            <div class="row">
                                <?php } ?>
                                <div class="col-md-3">
                                    <img src="<?=base_url()?>img_customer/<?=$logo->cust_logo?>" alt="customer_logo" title="<?=$logo->cust_name?>" style="max-width:100%;" oncontextmenu="return false;">
                                </div>
                                <?php } ?>
                            </div><!--.row-->
                        </div><!--.item-->
                    </div><!--.carousel-inner-->

                    <a data-slide="prev" href="#Carousel" class="left carousel-control" title="Prev">‹</a>
                    <a data-slide="next" href="#Carousel" class="right carousel-control" title="Next">›</a>
                </div><!--.Carousel-->
            </div>
        </div>
    </div><!--.container-->
    <!-- end -->

    <section id="clients">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <h2>A Join Venture Between</h2>
                      <p>
                        <img src="<?php echo base_url('assets/img/cas-group.png'); ?>">
                        <img src="<?php echo base_url('assets/img/SIAEngineering.png'); ?>">
                      </p>
                  </div>
              </div>
          </div>
      </div>
    </section>

    <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Our Contact</h5>
                    <address>
                        <strong><?php echo $row1->corp_name; ?></strong><br>
                        <?php echo $row1->corp_address; ?>
                    </address>
                    <p>
                        Phone: <?php echo $row1->phone_no; ?> <br>
                        Fax: <?php echo $row1->fax_no; ?> <br>
                        Email: <?php echo $row1->email3; ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Quick Links</h5>
                    <ul class="link-list">
                        <li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
                        <li><a href="<?php echo base_url('service'); ?>">Services</a></li>
                        <li><a href="<?php echo base_url('news'); ?>">News</a></li>
                        <li><a href="<?php echo base_url('archives'); ?>">Archives</a></li>
                        <li><a href="<?php echo base_url('home/#customers'); ?>">Our Customers</a></li>
                        <li><a href="<?php echo base_url('applications'); ?>">Applications</a></li>
                        <li><a href="<?php echo base_url('career'); ?>">Career</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>


            

            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Associate Member Of</h5>
                    <ul class="link-list">
                        <img src="<?php echo base_url('assets/img/IATP.png');?>" style="width:85%" oncontextmenu="return false;"><br><br>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Member Of</h5>
                    <ul class="link-list">
                        <img src="<?php echo base_url('assets/img/iamsa.jpg');?>" style="width:85%" oncontextmenu="return false;"><br><br>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy; 2018. All right reserved. </span><a href="https://jas-aero.com" target="_blank"><?php echo $row1->corp_name; ?></a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
  </div>
  </footer>
</div>

<?php } ?> <!-- end of id web -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bab0b079d44382222fc0122/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/template/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/jquery.easing.1.3.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/jquery.fancybox.pack.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/jquery.fancybox-media.js');?>"></script> 
<script src="<?php echo base_url('assets/template/js/portfolio/jquery.quicksand.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/portfolio/setting.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/jquery.flexslider.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/animate.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/custom.js');?>"></script>
<script src="<?php echo base_url('assets/template/js/owl-carousel/owl.carousel.js');?>"></script>

<!-- carousel (https://bootsnipp.com/snippets/featured/simple-carousel) -->
<script>
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 2000
    })
});
</script>

</body>
</html>
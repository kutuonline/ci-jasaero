<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<?php foreach($idHome as $row1){ ?>
<title><?php echo $row1->website_name; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="<?php echo strip_tags($row1->meta_desc); ?>" content="<?php echo strip_tags($row1->meta_keyword); ?>" />
<meta name="Doni Andriansyah" content="https://jas-aero.com" />
 
<link href="<?php echo base_url('assets/template/css/bootstrap.min.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/css/fancybox/jquery.fancybox.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/template/css/jcarousel.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/css/flexslider.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/css/style.css');?>" rel="stylesheet" />

<!-- ICONS -->
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png'); ?>">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
<div id="wrapper">

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
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li> 
						<li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
						<li class="active"><a href="<?php echo base_url('service'); ?>">Services</a></li>
                        <li><a href="<?php echo base_url('news'); ?>">News</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header><!-- end header -->

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Services</h2>
			</div>
		</div>
	</div>
	</section>

	<section id="content">
		<div class="container content">		
            <div class="row service-v1 margin-bottom-40">
                <?php foreach($data_detail as $row){ ?>
                <div class="col-md-12 md-margin-bottom-40">
                    <h3><?php echo $row->title; ?></h3>
                    <p><?php echo $row->detail_service; ?></p>   
                </div>
                <?php } ?>
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
            			>Email: <?php echo $row1->email3; ?>
          			</p>
        		</div>
      		</div>
      		<div class="col-lg-3">
        		<div class="widget">
          			<h5 class="widgetheading">Quick Links</h5>
          			<ul class="link-list">
                        <li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
                        <li><a href="<?php echo base_url('service'); ?>">Services</a></li>
                        <li><a href="<?php echo base_url('home/#customers'); ?>">Our Customers</a></li>
                        <li><a href="<?php echo base_url('applications'); ?>">Applications</a></li>
                        <li><a href="<?php echo base_url('news'); ?>">News</a></li>
            			<li><a href="<?php echo base_url('career'); ?>">Career</a></li>
            			<li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
          			</ul>
        		</div>
      		</div>
      		<div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Associate Member Of</h5>
                    <ul class="link-list">
                        <img src="<?php echo base_url('assets/img/iamsa.jpg');?>" style="width:85%" oncontextmenu="return false;"><br><br>
                        <img src="<?php echo base_url('assets/img/iatp.png');?>" style="width:85%" oncontextmenu="return false;">
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

<?php } ?> <!-- end of id -->

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
</body>
</html>
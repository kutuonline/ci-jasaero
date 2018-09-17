<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<?php foreach($idHome as $row){ ?>
<title><?php echo $row->website_name; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="<?php echo strip_tags($row->meta_desc); ?>" content="<?php echo strip_tags($row->meta_keyword); ?>" />
<meta name="Doni Andriansyah" content="http://jas-aero.com" />
 
<link href="<?php echo base_url('assets/template/css/bootstrap.min.css');?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/template/css/fancybox/jquery.fancybox.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/template/css/jcarousel.css" rel="stylesheet');?>" />
<link href="<?php echo base_url('assets/template/css/flexslider.css" rel="stylesheet');?>" />
<link href="<?php echo base_url('assets/template/css/style.css');?>" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

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
						<li><a href="<?php echo base_url('service'); ?>">Services</a></li>
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
				<h2 class="pageTitle">Applications</h2>
			</div>
		</div>
	</div>
	</section>

	<section id="content">
		<div class="container content">		
        <!-- Service Blcoks -->
			<center>
				<?php foreach($appQis as $row1){ ?>
				<a href="<?php echo $row1->app_url; ?>" target="_blank" class="btn btn-primary">
					<i class="fa fa-line-chart fa-5x" aria-hidden="true"></i><br>
					<?php echo $row1->app_name; ?>
				</a>
				<?php } ?> &nbsp;

				<?php foreach($appSms as $row2){ ?>
				<a href="<?php echo $row2->app_url; ?>" target="_blank" class="btn btn-danger">
					<i class="fa fa-plus-square fa-5x" aria-hidden="true"></i><br>
					<?php echo $row2->app_name; ?>
				</a>
				<?php } ?> &nbsp;

				<?php foreach($appTcs as $row3){ ?>
				<a href="<?php echo $row3->app_url; ?>" target="_blank" class="btn btn-success">
					<i class="fa fa-cog fa-5x" aria-hidden="true"></i><br>
					<?php echo $row3->app_name; ?>
				</a>
				<?php } ?> &nbsp;

				<?php foreach($appEgb as $row4){ ?>
				<a href="<?php echo $row4->app_url; ?>" target="_blank" class="btn btn-warning">
					<i class="fa fa-university fa-5x" aria-hidden="true"></i><br>
					<?php echo $row4->app_name; ?>
				</a>
				<?php } ?> &nbsp;
			</center>

			<br>

			<center>
				<?php foreach($cctvJkt as $row5){ ?>
				<a style="text-decoration:none;" href="<?php echo $row5->app_url; ?>" target="_blank">
					<img src="<?php echo base_url('assets/img/cctv.png');?>" style="width:15%; border:none;" title="<?php echo $row5->app_name;?>">
				</a>
				<?php } ?>

				&nbsp;

				<?php foreach($cctvSub as $row6){ ?>
				<a style="text-decoration:none;" href="<?php echo $row6->app_url; ?>" target="_blank">
					<img src="<?php echo base_url('assets/img/cctv.png');?>" style="width:15%; border:none;" title="<?php echo $row6->app_name;?>">
				</a>
				<?php } ?>

				&nbsp;

				<?php foreach($cctvDps as $row7){ ?>
				<a style="text-decoration:none;" href="<?php echo $row7->app_url; ?>" target="_blank">
					<img src="<?php echo base_url('assets/img/cctv.png');?>" style="width:15%; border:none;" title="<?php echo $row7->app_name;?>">
				</a>
				<?php } ?>
			</center>

			<br>
			<br>
        
    	</div>
    </section>

	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Our Contact</h5>
					<address>
					<strong><?php echo $row->corp_name; ?></strong><br>
						<?php echo $row->corp_address; ?></address>
					<p>
						Phone: <?php echo $row->phone_no; ?> <br>
						Fax: <?php echo $row->fax_no; ?> <br>
						Email: <?php echo $row->email3; ?>
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
			<!--
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Latest posts</h5>
					<ul class="link-list">
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
						<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
						<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
					<div class="widget">
					<h5 class="widgetheading">Recent News</h5>
					<ul class="link-list">
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
						<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
						<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
					</ul>
				</div>
			</div>
			-->
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; 2018. All right reserved. </span><a href="https://jas-aero.com" target="_blank"><?php echo $row->corp_name; ?></a>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>

<?php } ?> <!-- end idHome -->

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
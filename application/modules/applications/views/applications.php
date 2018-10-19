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
				<p>Below is an application that we have to monitor and support the improvement of service quality and human resources.</p>

				<br>

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
                        <li><a href="<?php echo base_url('archives'); ?>">Archives</a></li>
            			<li><a href="<?php echo base_url('career'); ?>">Career</a></li>
            			<li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Associate Member Of</h5>
                    <ul class="link-list">
                        <!--<img src="<?php //echo base_url('assets/img/iamsa.jpg');?>" style="width:85%" oncontextmenu="return false;"><br><br>-->
                        <img src="<?php echo base_url('assets/img/iatp.png');?>" style="width:85%" oncontextmenu="return false;">
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget">
                    <h5 class="widgetheading">Member Of</h5>
                    <ul class="link-list">
                        <img src="<?php echo base_url('assets/img/iamsa.jpg');?>" style="width:85%" oncontextmenu="return false;"><br><br>
                        <!--<img src="<?php //echo base_url('assets/img/iatp.png');?>" style="width:85%" oncontextmenu="return false;">-->
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
							<span>&copy; 2018. All right reserved. </span><a href="https://jas-aero.com" target="_blank"><?php echo $row->corp_name; ?></a>
						</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	</footer>
</div>

<?php } ?> <!-- end idHome -->

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
</body>
</html>
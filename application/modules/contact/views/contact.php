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
<link href="<?php echo base_url('assets/template/css/style.css');?>" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- ICONS -->
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png'); ?>">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- 
javascript recaptcha 
jika sudah online, mohon enable
-->
<?php //echo $script_captcha; ?>

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
                  <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/img/logo-jasaero.png');?>" alt="logo" style="width:75%" class="img-responsive"  /></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li> 
                        <li><a href="<?php echo base_url('aboutus'); ?>">About Us</a></li>
                        <li><a href="<?php echo base_url('service'); ?>">Services</a></li>
                        <li><a href="<?php echo base_url('news'); ?>">News</a></li>
                        <li class="active"><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header><!-- end header -->

	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Contact Us</h2>
			</div>
		</div>
	</div>
	</section>

	<section id="content">	
		<div class="container">

			<div class="row"> 
				<div class="col-md-12">
					<div class="about-logo">
						<?php foreach($idHome as $row){ ?>
							<h3><?php echo $row->department; ?></h3>
							<br>
							<h4><?php echo $row->corp_name; ?></h4>

							<table border="0" width="450">
								<tr>
									<td><?php echo $row->corp_address; ?></td>
								</tr>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td><i class=" fa fa-phone" title="Phone"></i>&nbsp;&nbsp;<?php echo $row->phone_no; ?></td>
								</tr>
								<tr>
									<td><i class=" fa fa-fax" title="Fax"></i>&nbsp;&nbsp;<?php echo $row->fax_no; ?></td>
								</tr>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td><?php echo $row->pic_email1; echo ":"; ?> <?php echo "<a href='mailto:$row->email1'>"; echo $row->email1; echo "</a>"; ?></td>
								</tr>
								<tr>
									<td><?php echo $row->pic_email2; echo ":"; ?> <?php echo "<a href='mailto:$row->email2'>"; echo $row->email2; echo "</a>"; ?></td>
								</tr>
								<tr>
									<td><?php echo $row->pic_email3; echo ":"; ?> <?php echo "<a href='mailto:$row->email3'>"; echo $row->email3; echo "</a>"; ?></td>
								</tr>
							</table>
						<?php } ?>
					</div>  
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<form name="form1" action="<?php echo base_url('contact/actNew');?>" method="post">
	      				<h3>Contact Us</h3>

	       				<div class="form-group">
                			<input type="text" name="fullNm" class="form-control" placeholder="Full Name" required/>
            			</div>

            			<div class="form-group">
                			<input type="email" name="email" class="form-control" placeholder="Email" required/>
            			</div>

            			<div class="form-group">
                			<textarea name="msg" class="form-control" placeholder="Message" rows="4" required></textarea>
            			</div>

            			<!-- 
            			menampilkan re-captcha
            			jika sudah onlinr, mohon di enable
            			-->
            			<!--<div class="form-group">
                			<?php //echo $captcha; ?>
            			</div>
            			-->

	    				<button class="btn btn-primary pull-right">Send</button><br />
	    			</form>
				</div>

				<br><br>

				<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d833.9770620817429!2d106.67559039087784!3d-6.119149386248578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x361deebcd11b6e9d!2sJAS+Aero+Engineering+Services.+PT!5e0!3m2!1sid!2sid!4v1536593637674" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
            		<?php echo $row1->corp_address; ?></address>
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

<?php } ?>

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
<script src="<?php echo base_url('assets/template/contact/jqBootstrapValidation.js');?>"></script>
<script src="<?php echo base_url('assets/template/contact/contact_me.js');?>"></script>
</body>
</html>
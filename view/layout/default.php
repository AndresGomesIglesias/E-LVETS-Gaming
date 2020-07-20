<!DOCTYPE html>
<html lang="zxx">



<?php include(Router::root('view/includes/head.php'));?>
<link href="<?=Router::webroot('assets/css/style-esports.css');?>" rel="stylesheet">
<link href="<?=Router::webroot('assets/css/commun_custom.css');?>" rel="stylesheet">
<link href="<?=Router::webroot('assets/css/custom.css');?>" rel="stylesheet">

<body data-template="template-esports">
	<div class="site-wrapper  clearfix">
		<div class="hideclass">
			<div class=" site-overlay"></div>
			<!-- Header
		================================================== -->
			<!-- Header Mobile -->
			<div class="header-mobile clearfix" id="header-mobile">
				<div class="header-mobile__logo">
					<a href=" <?php echo Router::url('posts/index/'); ?>"><img
							src="<?php echo Router::root('img/elv114.png') ;?>"
							srcset="assets/images/esports/logo@2x.png 2x" alt="E-LVETS"
							class="header-mobile__logo-img"></a>
				</div>
				<div class="header-mobile__inner">
					<a id="header-mobile__toggle" class="burger-menu-icon"><span
							class="burger-menu-icon__line"></span></a>
					<span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
				</div>
			</div>
			<!-- Header Mobile / End -->

			<!-- Header Desktop -->
			<header class="header header--layout-3">
				<!-- Header Top Bar -->
				<div class="header__top-bar clearfix ">
					<div class="container">
						<div class="header__top-bar-inner">

							<!-- Social Links -->
							<ul class="social-links social-links--inline social-links--main-nav social-links--top-bar">
								<li class="social-links__item">
									<a href="https://www.facebook.com/elvetsgaming/" class="social-links__link"
										data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
											class="fab fa-facebook-square fa-2x"></i></a>
								</li>
								<li class="social-links__item">
									<a href="https://twitter.com/elvetsgaming" class="social-links__link"
										data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
											class="fab fa-twitter-square fa-2x"></i></a>
								</li>
								<li class="social-links__item">
									<a href="https://www.twitch.tv/elvets_gaming" class="social-links__link"
										data-toggle="tooltip" data-placement="bottom" title="Twitch"><i
											class="fab fa-twitch fa-2x"></i></a>
								</li>
								<li class="social-links__item">
									<a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
										title="YouTube"><i class="fab fa-youtube fa-2x"></i></a>
								</li>
								<li class="social-links__item">
									<a href="https://www.instagram.com/elvetsgaming/" class="social-links__link"
										data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
											class="fab fa-instagram  fa-2x"></i></a>
								</li>
							</ul>
							<!-- Social Links / End -->

							<!-- Account Navigation -->
							<ul class="nav-account">
								<li class="nav-account__item nav-account__item--logout">
									<?php echo ($this->Session->isLogged()) ? '<a href='.  Router::url('users/logout') .'>Logout</a>'  :'<a href='.  Router::url('users/login') .'>Login</a>' ; ?>
								</li>

							</ul>
							<!-- Account Navigation / End -->
						</div>
					</div>
				</div>
				<!-- Header Top Bar / End -->

				<!-- Header Primary -->
				<div class="header__primary">
					<div class="container">
						<div class="header__primary-inner">

							<!-- Header Logo -->
							<div class="header-logo"><a href=" <?= router::url('posts/index');?>"><img
										src="<?php echo  router::webroot('img/elv114.png');?>"
										srcset="assets/images/esports/logo@2x.png 2x" alt="E-LVETS"
										class="header-logo__img"></a></div>
							<!-- Header Logo / End -->


							<!-- Main Navigation -->
							<?php include(Router::root('view/includes/navbar/navbar.php'));?>
							<!-- Main Navigation / End -->

							<div class="header__primary-spacer"></div>
							<!-- Manager Navigation -->

							<?php if($this->Session->isLogged()):?>
							<?php echo Permission::ifIsAllowGetNavBar($this->Session->read('User')->grade);?>
							<p class="centered">
								<a><img src="<?php echo Router::webroot($this->Session->read('User')->avatarPath);?> "
										class="img-circle img-header"
										width="30"><?php echo $this->Session->read('User')->firstname?></a>
								<P> </p>
							</p>
							<?php endif ?>

							<!-- Manager Navigation / End -->
			</header>
			<!-- Header / End -->

			<!-- Hero Unit Slider
		================================================== -->
			<div class="rev_slider_wrapper container" data-source="gallery">

				<div id="hero-revslider_wrapper" class="rev_slider_wrapper" data-alias="funky-slider"
					data-source="gallery"
					style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
					<!-- START REVOLUTION SLIDER 5.4.7.2 fullwidth mode -->
					<div id="hero-revslider" class="rev_slider" style="display:none;" data-version="5.4.7.2">
						<ul>
							<!-- Slide #1 -->
							<li data-transition="fade" data-slotamount="default" data-hideafterloop="0"
								data-hideslideonmobile="off" data-easein="default" data-easeout="default"
								data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide">

								<!-- MAIN IMAGE -->
								<img src="<?php echo Router::webroot('assets/img/smuff.png');?>" data-bgcolor='#1d1429'
									alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
									data-bgparallax="off" class="rev-slidebg" data-no-retina>
								<!-- LAYERS -->

								<!-- LAYER NR. 1 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-5" id="slide1-layer1"
									data-x="['center','center','center','center']"
									data-hoffset="['-185','-185','-135','-100']"
									data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']"
									data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
									data-basealign="slide" data-responsive_offset="on"
									data-frames='[{"delay":800,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;skY:10px;opacity:0;","to":"o:1;tO:50% 100%;z:-5;","ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;">

									<img src="<?php echo Router::webroot('img/smuff.png');?>" alt=""
										data-ww="['457px','385px','323px','261px']"
										data-hh="['591px','500px','420px','340px']" width="523" height="851px"
										data-no-retina>
								</div>

								<!-- LAYER NR. 2 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h1 rs-parallaxlevel-10"
									id="slide1-layer2" data-x="['left','left','left','left']"
									data-hoffset="['775','520','430','320']" data-y="['top','top','top','top']"
									data-voffset="['195','150','120','105']" data-fontsize="['90','72','56','42']"
									data-lineheight="['90','72','56','42']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"x:-200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 6;">
									<div class="rs-looped rs-wave" data-speed="2" data-angle="0" data-radius="2px"
										data-origin="50% 50%">Join</div>
								</div>

								<!-- LAYER NR. 3 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h1 alc-hero-slider__h--color-primary rs-parallaxlevel-10"
									id="slide1-layer3" data-x="['left','left','left','left']"
									data-hoffset="['775','520','430','320']" data-y="['top','top','top','top']"
									data-voffset="['280','210','175','150']" data-fontsize="['90','72','56','42']"
									data-lineheight="['90','72','56','42']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 7;">
									<div class="rs-looped rs-wave" data-speed="2" data-angle="0" data-radius="2px"
										data-origin="50% 50%">ours teams</div>
								</div>

								<!-- LAYER NR. 4 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h5 rs-parallaxlevel-11"
									id="slide1-layer4" data-x="['left','left','left','left']"
									data-hoffset="['780','525','435','320']" data-y="['top','top','top','top']"
									data-voffset="['166','130','95','80']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text"
									data-typewriter='{"lines":"Recrutement Open","enabled":"on","speed":"80","delays":"1%7C100","looped":"on","cursorType":"one","blinking":"on","word_delay":"off","sequenced":"on","hide_cursor":"off","start_delay":"500","newline_delay":"1000","deletion_speed":"30","deletion_delay":"3000","blinking_speed":"500","linebreak_delay":"60","cursor_type":"one","background":"off"}'
									data-responsive_offset="on"
									data-frames='[{"delay":700,"speed":1000,"frame":"0","from":"y:50px;z:0;rX:45deg;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-10px;opacity:0;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;">
									You like competion
								</div>

								<!-- LAYER NR. 5 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__text rs-parallaxlevel-11"
									id="slide1-layer5" data-x="['left','left','left','left']"
									data-hoffset="['780','525','435','320']" data-y="['top','top','top','top']"
									data-voffset="['385','290','250','210']" data-fontsize="['14','12','11','10']"
									data-lineheight="['21','18','56','15']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;opacity:0;","to":"o:1;tO:50% 0%;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;">
									We are looking for players.
								</div>

								<!-- LAYER NR. 6 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-10" id="slide1-layer6"
									data-x="['left','left','left','left']" data-hoffset="['775','525','435','320']"
									data-y="['bottom','bottom','bottom','bottom']"
									data-voffset="['125','160','105','90']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="button" data-basealign="slide"
									data-responsive_offset="on"
									data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;opacity:0;","to":"o:1;tO:50% 0%;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;"}]'
									style="z-index: 10;"><a href="_esports_team-player.html"
										class="btn btn-primary btn-icon-right">More information <i
											class="fa fa-angle-right"></i></a>
								</div>

							</li>
							<!-- Slide #1 / End -->

							<!-- Slide #2 -->
							<li data-transition="fade" data-slotamount="default" data-hideafterloop="0"
								data-hideslideonmobile="off" data-easein="default" data-easeout="default"
								data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide">

								<!-- MAIN IMAGE -->
								<img src="" data-bgcolor='#1d1429' alt="" data-bgposition="center center"
									data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off"
									class="rev-slidebg" data-no-retina>
								<!-- LAYERS -->

								<!-- LAYER NR. 1 -->
								<div class="tp-caption tp-resizeme" id="slide2-layer1"
									data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']"
									data-y="['top','top','top','top']" data-voffset="['0','0','0','0']"
									data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
									data-basealign="slide" data-responsive_offset="on"
									data-frames='[{"delay":1200,"speed":800,"frame":"0","from":"rX:90deg;sX:1;sY:1;skY:0;opacity:0;z:1;","to":"o:1;tO:50% 100%;z:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 1;">

									<img src="" alt="" data-ww="['593px','420px','300px','290px']"
										data-hh="['431px','480px','420px','340px']" width="593" height="431"
										data-no-retina>
								</div>

								<!-- LAYER NR. 2 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-5" id="slide2-layer2"
									data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']"
									data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']"
									data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
									data-basealign="slide" data-responsive_offset="on"
									data-frames='[{"delay":800,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;skY:10px;opacity:0;z:5;","to":"o:1;tO:50% 100%;z:5;","ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;">

									<img src="<?php echo Router::webroot('img/academie.png');?>" alt=""
										data-ww="['949px','760px','580px','460px']"
										data-hh="['503px','403px','307px','244px']" width="949" height="503"
										data-no-retina>
								</div>

								<!-- LAYER NR. 3 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h1 rs-parallaxlevel-10"
									id="slide2-layer3" data-x="['left','left','left','left']"
									data-hoffset="['120','40','30','20']" data-y="['top','top','top','top']"
									data-voffset="['125','150','120','70']" data-fontsize="['90','72','56','42']"
									data-lineheight="['90','72','56','42']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"x:-200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 6;">
									<div class="rs-looped rs-wave" data-speed="2" data-angle="0" data-radius="2px"
										data-origin="50% 50%">Academie</div>
								</div>

								<!-- LAYER NR. 4 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h1 alc-hero-slider__h--color-primary rs-parallaxlevel-10"
									id="slide2-layer4" data-x="['left','left','left','left']"
									data-hoffset="['120','40','30','20']" data-y="['top','top','top','top']"
									data-voffset="['210','210','175','115']" data-fontsize="['90','72','56','42']"
									data-lineheight="['90','72','56','42']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 7;">
									<div class="rs-looped rs-wave" data-speed="2" data-angle="0" data-radius="2px"
										data-origin="50% 50%">Club eSport</div>
								</div>

								<!-- LAYER NR. 5 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h5 rs-parallaxlevel-11"
									id="slide2-layer5" data-x="['left','left','left','left']"
									data-hoffset="['120','40','30','20']" data-y="['top','top','top','top']"
									data-voffset="['96','130','95','45']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text"
									data-typewriter='{"lines":"A NEW ERA BEGINS!","enabled":"on","speed":"80","delays":"1%7C100","looped":"on","cursorType":"one","blinking":"on","word_delay":"off","sequenced":"on","hide_cursor":"off","start_delay":"500","newline_delay":"1000","deletion_speed":"30","deletion_delay":"3000","blinking_speed":"500","linebreak_delay":"60","cursor_type":"one","background":"off"}'
									data-responsive_offset="on"
									data-frames='[{"delay":700,"speed":1000,"frame":"0","from":"y:50px;z:0;rX:45deg;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-10px;opacity:0;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;">
									Are you the talent of tomorrow?
								</div>

								<!-- LAYER NR. 6 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__text rs-parallaxlevel-11"
									id="slide2-layer6" data-x="['left','left','left','left']"
									data-hoffset="['120','40','30','20']" data-y="['top','top','top','top']"
									data-voffset="['315','290','250','175']" data-fontsize="['14','12','11','10']"
									data-lineheight="['21','18','56','15']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;opacity:0;","to":"o:1;tO:50% 0%;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9;">
									If you are looging for un formation center <br> E-LVETS family is here!
								</div>

								<!-- LAYER NR. 7 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-10" id="slide2-layer7"
									data-x="['left','left','left','left']" data-hoffset="['120','40','30','20']"
									data-y="['bottom','bottom','bottom','bottom']"
									data-voffset="['170','160','105','125']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="button" data-basealign="slide"
									data-responsive_offset="on"
									data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;opacity:0;","to":"o:1;tO:50% 0%;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;"}]'
									style="z-index: 10;"><a href="_esports_team-overview.html"
										class="btn btn-primary-inverse btn-icon-right">Join our Academie<i
											class="fa fa-angle-right"></i></a>
								</div>

							</li>
							<!-- Slide #2 / End -->

							<!-- Slide #3 -->
							<li data-transition="fade" data-slotamount="default" data-hideafterloop="0"
								data-hideslideonmobile="off" data-easein="default" data-easeout="default"
								data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide">

								<!-- MAIN IMAGE -->
								<img src="<?php echo Router::webroot('assets/images/esports/hero-slider/hero-bg-3.jpg');?>"
									data-bgcolor='#1d1429' alt="" data-bgposition="center center" data-bgfit="cover"
									data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
								<!-- LAYERS -->

								<!-- LAYER NR. 1 -->
								<div class="tp-caption alc-hero-slider__label tp-resizeme rs-parallaxlevel-11"
									id="slide3-layer1" data-x="['left','left','left','left']"
									data-hoffset="['128','80','40','20']" data-y="['top','top','top','top']"
									data-voffset="['120','130','100','78']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="button" data-basealign="slide"
									data-responsive_offset="on"
									data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"y:-50px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 10;">
								</div>

								<!-- LAYER NR. 2 -->
								<div class="tp-caption alc-hero-slider__label tp-resizeme rs-parallaxlevel-11"
									id="slide3-layer2" data-x="['left','left','left','left']"
									data-hoffset="['194','146','110','82']" data-y="['top','top','top','top']"
									data-voffset="['120','130','100','78']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="button" data-basealign="slide"
									data-responsive_offset="on"
									data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"y:-50px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 10;">
									<!-- <span class="label posts__cat-label posts__cat-label--category-2"></span> -->
								</div>

								<!-- LAYER NR. 3 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h2 rs-parallaxlevel-10"
									id="slide3-layer3" data-x="['left','left','left','left']"
									data-hoffset="['128','80','40','20']" data-y="['top','top','top','top']"
									data-voffset="['160','160','130','105']" data-fontsize="['58','46','34','24']"
									data-lineheight="['58','46','34','24']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"x:-200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 6;">
									Join
								</div>

								<!-- LAYER NR. 4 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h2 rs-parallaxlevel-10"
									id="slide3-layer4" data-x="['left','left','left','left']"
									data-hoffset="['128','80','40','20']" data-y="['top','top','top','top']"
									data-voffset="['210','200','157','125']" data-fontsize="['58','46','34','24']"
									data-lineheight="['58','46','34','24']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:-200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 6;">
									The biggers
								</div>

								<!-- LAYER NR. 5 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h2 rs-parallaxlevel-10"
									id="slide3-layer5" data-x="['left','left','left','left']"
									data-hoffset="['128','80','40','20']" data-y="['top','top','top','top']"
									data-voffset="['262','238','185','145']" data-fontsize="['58','46','34','24']"
									data-lineheight="['58','46','34','24']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
									data-frames='[{"delay":700,"speed":1000,"frame":"0","from":"x:-200px;sX:1;sY:1;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":650,"frame":"999","to":"x:-200px;opacity:0;","ease":"Power4.easeIn"}]'
									style="z-index: 6;">
									Swiss eSport family
								</div>

								<!-- LAYER NR. 6 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__author-avatar rs-parallaxlevel-11"
									id="slide1-layer6" data-x="['left','left','left','left']"
									data-hoffset="['125','80','40','20']" data-y="['top','top','top','top']"
									data-voffset="['341','300','230','180']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="image" data-basealign="slide"
									data-responsive_offset="on"
									data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"y:50px;z:0;rX:45deg;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-10px;opacity:0;","ease":"Power3.easeInOut"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;">

									<img src="assets/images/samples/avatar-12-xs.jpg" alt="" class="rounded-circle"
										data-ww="['24px','24px','18px','15px']" data-hh="['24px','24px','18px','15px']"
										width="24" height="24" data-no-retina>
								</div>

								<!-- LAYER NR. 7 -->
								<div class="tp-caption tp-resizeme alc-hero-slider__h alc-hero-slider__h--h6 rs-parallaxlevel-11"
									id="slide3-layer7" data-x="['left','left','left','left']"
									data-hoffset="['157','110','65','43']" data-y="['top','top','top','top']"
									data-voffset="['345','303','232','181']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="text"
									data-frames='[{"delay":700,"speed":1000,"frame":"0","from":"y:50px;z:0;rX:45deg;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"y:-10px;opacity:0;","ease":"Power3.easeInOut"}]'
									style="z-index: 8;">
									Grillad, activité, afterwork, evenement, communoté
								</div>

								<!-- LAYER NR. 8 -->
								<div class="tp-caption tp-resizeme rs-parallaxlevel-10" id="slide3-layer8"
									data-x="['left','left','left','left']" data-hoffset="['125','80','40','20']"
									data-y="['bottom','bottom','bottom','bottom']"
									data-voffset="['163','160','135','120']" data-width="none" data-height="none"
									data-whitespace="nowrap" data-type="button" data-basealign="slide"
									data-responsive_offset="on"
									data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"rX:90deg;sX:1;sY:1;opacity:0;","to":"o:1;tO:50% 0%;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;"}]'
									style="z-index: 10;">
									<a href="_esports_blog-post-3.html" class="btn btn-primary-inverse btn-icon-right">
										Join the family
										full story <i class="fa fa-angle-right"></i></a>
								</div>

							</li>
							<!-- Slide #3 / End -->
						</ul>
					</div>
				</div>
				<!-- END REVOLUTION SLIDER -->
			</div>
		</div>
		<?php echo  $this->Session->flash(); ?>
		<div class="container">
			<?php echo $content_for_layout ?>
		</div>
	
	</div>
	<?php include(Router::root('view/includes/footer.php'));?>
	<?php include(Router::root('view/includes/script.php'));?>
	<script src="<?php echo Router::webroot('js/scipt.js');?>"></script>
</body>

</html>
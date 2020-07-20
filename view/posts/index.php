	<!-- Content
		================================================== -->
	<div class="site-content">
		<div class="container">

			<div class="row">
				<!-- Content -->
				<div class="content col-lg-8">

					<!-- Posts Area #1 -->
					<!-- Posts Grid -->
					<div class="posts posts--cards post-grid post-grid--2cols row">
						<?php foreach($postCardIndex as $k=>$v) :?>
						<div class="post-grid__item col-sm-6">
							<div
								style="background-color: <?php $v->color;?>" class="posts__item posts__item--card custom_post posts__item--category-1 posts__item--<?php echo str_replace(" ", "", $v->categories) ;?>  card">
								<figure class="posts__thumb card-top">
									<div class="posts__cat">
										<span
										style="background-color: <?php $v->color;?>" class="label posts__cat-label posts__cat-label--<?php echo str_replace(" ", "", $v->categories) ;?>"><?php echo $v->categories ;?></span>
									</div>
									<a href="<?php echo Router::url('posts/view/id:'.$v->id.'/slug:'.$v->slug); ?>"><img
											src="<?php echo Router::webroot('img/' .  str_replace(" ", "", $v->categories)) . '.png'; ?>"
											alt=""></a>
								</figure>
								<div class="posts__inner card__content card-center">
									<a href="<?php echo Router::url('posts/view/id:'.$v->id.'/slug:'.$v->slug); ?>"
										class="posts__cta"></a>
									<time datetime="2018-08-23" class="posts__date"><?php echo $v->created ;?></time>
									<h1 style="font-size: 1.5vw;" class="posts__title posts__title--color-hover"><a
											href="<?php echo Router::url('posts/view/id:'.$v->id.'/slug:'.$v->slug); ?>"><?php echo $v->name ;?></a>
									</h1>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<!-- Post Grid / End -->
					<!-- Posts Area #1 / End -->


					<div class="post-grid__item col-sm-12 containerinsta">
						<div class="card ">

							<div class="posts__inner card__content insta">
								<!-- LightWidget WIDGET -->
								<script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe
									src="//lightwidget.com/widgets/39a08a9b557455659e6394af351202fd.html" scrolling="no"
									allowtransparency="true" class="lightwidget-widget"
									style="width:100%;border:0;overflow:hidden;"></iframe>
							</div>

						</div>
					</div>


				</div>
				<!-- Content / End -->

				<!-- Sidebar -->
				<div id="sidebar" class="sidebar col-lg-4">



					<!-- Widget: Event Result -->
					<aside class="widget card widget--sidebar widget-game-result">
						<div class="widget__title card__header card__header--has-btn">
							<h4>Last Game Result</h4>
							<a href="#" class="btn btn-default btn-xs card-header__button">See All Results</a>
						</div>
						<div class="widget__content card__content">
							<!-- Game Score -->
							<div class="widget-game-result__section">
								<div class="widget-game-result__section-inner">

									<header
										class="widget-game-result__header widget-game-result__header--alt widget-game-result__header--alt-compact mb-4">
										<h3 class="widget-game-result__title"><?php echo $LastResult->name; ?></h3>
										<time class="widget-game-result__date"
											datetime="2018-04-26"><?php echo $LastResult->created; ?></time>
									</header>

									<header class="widget-game-result__header">
										<h3 class="widget-game-result__title"><?php echo $LastResult->competionName; ?>
										</h3>
									</header>

									<div class="widget-game-result__main">
										<!-- 1st Team -->
										<div class="widget-game-result__team widget-game-result__team--first">
											<figure class="widget-game-result__team-logo">
												<a href="#"><img src="<?php echo router::webroot('img/3.png');?>"
														alt=""></a>
											</figure>
											<div class="widget-game-result__team-info"">
													<h6 class=" widget-game-result__team-name res-wrap">
												<?php echo (isset($LastResult->alliance)) ?  $LastResult->alliance : 'E-LVETS';?>
												</h6>
												<div class="widget-game-result__team-desc res-wrap">
													<?php echo $LastResult->Nickname; ?></div>
											</div>
										</div>
										<!-- 1st Team / End -->

										<div class="widget-game-result__score-wrap">
											<div class="widget-game-result__score">
												<span
													class="widget-game-result__score-result widget-game-result__score-result--winner"><?php echo $LastResult->butHome; ?></span>
												<span
													class="widget-game-result__score-result widget-game-result__score-result--winner">-
												</span><span class="widget-game-result__score-dash"></span> <span
													class="widget-game-result__score-result widget-game-result__score-result--loser"><?php echo $LastResult->butOpp; ?></span>
											</div>
										</div>

										<!-- 2nd Team -->
										<div class="widget-game-result__team widget-game-result__team--second ">
											<figure class="widget-game-result__team-logo">
												<a href="#"><img class="imgTeams"
														src="<?php echo router::webroot($LastResult->imgPath);?>"
														alt=""></a>
											</figure>
											<div class="widget-game-result__team-info">
												<h6 class="widget-game-result__team-name res-wrap">
													<?php echo $LastResult->opponents; ?></h6>
												<div class="widget-game-result__team-desc res-wrap">
													<?php echo $LastResult->AdditionName; ?></div>
											</div>
										</div>
										<!-- 2nd Team / End -->
									</div>
								</div>
							</div>
							<!-- Game Score / End -->

						</div>
					</aside>
					<!-- Widget: Event Result end -->



					<!-- Widget: Trending News -->

					<aside class="widget widget--sidebar card widget-popular-posts">
						<div class="widget__title card__header">
							<h4>Popular News</h4>
						</div>
						<?php foreach($postCardIndex as $k=>$v) :?>
						<div class="widget__content card__content">

							<ul class="posts posts--simple-list posts--simple-list-numbered">
								<li class="posts__item posts__item--category-1">
									<div class="posts__inner">
										<div class="posts__cat"><span
												class="label posts__cat-label posts__cat-label--<?php echo str_replace(" ", "", $v->categories) ;?>"><?php echo $v->categories;?></span>
										</div>
										<h6 class="posts__title"><a href="#"><?php echo $v->name;?></a></h6><time
											datetime="2017-09-22" class="posts__date"><?php echo $v->created;?></time>
									</div>
								</li>
							</ul>
						</div>
						<?php endforeach; ?>
					</aside>

					<!-- Widget: Trending News / End -->

				</div>
				<!-- Sidebar / End -->
			</div>

		</div>
	</div>

	<!-- Content / End -->



	</div>


	<script type="text/javascript">
		var revapi, tpj;
		(function () {
			if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",
				onLoad);
			else onLoad();

			function onLoad() {
				if (tpj === undefined) {
					tpj = jQuery;
					if ("off" == "on") {
						tpj.noConflict();
					}
				}
				if (tpj("#hero-revslider").revolution == undefined) {
					revslider_showDoubleJqueryError("#hero-revslider");
				} else {
					revapi = tpj("#hero-revslider").show().revolution({
						sliderType: "standard",
						jsFileLocation: "revolution/js/",
						sliderLayout: "auto",
						dottedOverlay: "fourxfour",
						delay: 9000,
						revealer: {
							direction: "tlbr_skew",
							color: "#1d1429",
							duration: "1500",
							delay: "0",
							easing: "Power3.easeOut",
							spinner: "2",
							spinnerColor: "rgba(0,0,0,",
						},
						navigation: {
							keyboardNavigation: "off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation: "off",
							mouseScrollReverse: "default",
							onHoverStop: "off",
							arrows: {
								style: "metis",
								enable: true,
								hide_onmobile: false,
								hide_onleave: false,
								tmp: '',
								left: {
									container: "layergrid",
									h_align: "right",
									v_align: "bottom",
									h_offset: 72,
									v_offset: 0
								},
								right: {
									container: "layergrid",
									h_align: "right",
									v_align: "bottom",
									h_offset: 12,
									v_offset: 0
								}
							}
						},
						responsiveLevels: [1200, 992, 768, 576],
						visibilityLevels: [1200, 992, 768, 576],
						gridwidth: [1420, 992, 768, 576],
						gridheight: [620, 580, 460, 400],
						lazyType: "none",
						parallax: {
							type: "scroll",
							origo: "slidercenter",
							speed: 400,
							speedbg: 0,
							speedls: 0,
							levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, -10, -15, -20, -25, 50, 51, 55],
						},
						shadow: 0,
						spinner: "spinner5",
						stopLoop: "off",
						stopAfterLoops: -1,
						stopAtSlide: -1,
						shuffle: "off",
						autoHeight: "off",
						hideThumbsOnMobile: "off",
						hideSliderAtLimit: 0,
						hideCaptionAtLimit: 0,
						hideAllCaptionAtLilmit: 0,
						debugMode: false,
						fallbacks: {
							simplifyAll: "off",
							nextSlideOnWindowFocus: "off",
							disableFocusListener: false,
						}
					});
				}; /* END OF revapi call */

				RsRevealerAddOn(tpj, revapi,
					"<div class='rsaddon-revealer-spinner rsaddon-revealer-spinner-2'><div class='rsaddon-revealer-2' style='border-top-color: 0.65); border-bottom-color: 0.15); border-left-color: 0.65); border-right-color: 0.15)'><\/div><\/div>"
				);
				RsTypewriterAddOn(tpj, revapi);

			}; /* END OF ON LOAD FUNCTION */
		}()); /* END OF WRAPPING FUNCTION */
	</script>

	<!-- Template JS -->
	<script src="<?php router::webroot('assets/js/init.js');?>"></script>
	<script src="<?php router::webroot('assets/js/custom.js');?>"></script>

	</body>

	</html>
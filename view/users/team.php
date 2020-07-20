
<!-- bannier  ================================================== -->
<div class="page-heading page-heading--horizontal effect-duotone effect-duotone--primary">
	<div class="effect-duotone__layer">
		<div class="effect-duotone__layer-inner"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col align-self-start"> 
				<h1 class="page-heading__title">Team <span class="highlight"><?php echo str_replace('-', ' ' ,$slug) ; ?></span></h1>
			</div>
		</div>
	</div>
</div>
<!-- bannier / End ================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- navbar ================================================== -->
<nav class="content-filter content-filter--boxed content-filter--highlight-side content-filter--label-left">
	<div class="container">
		<div class="content-filter__inner"><a href="#" class="content-filter__toggle"></a>
			<ul id="navUL" class="content-filter__list">
				<li  class="content-filter__item content-filter__item-"><a class="navAjax content-filter__link" href="<?php echo Router::url('users/team/id:'.$id.'/slug:'.$slug ); ?>">Team Roster</a></li>
				<li class="content-filter__item"><a   class="navAjax content-filter__link" href="<?php echo Router::url('users/teamCup'); ?>">Team cup</a></li>
				<li class="content-filter__item"><a   class="navAjax content-filter__link"href="<?php echo Router::url('users/teamLastResults'); ?>">Latest Results</a></li>
				<li   class="content-filter__item "><a  class="navAjax content-filter__link" href="<?php echo Router::url('users/teamOldPlayers/'.$id); ?>">Older Players</a></li>
			</ul>
		</div>
	</div>

</nav>

<!-- navbar / End ================================================== -->

<!-- Content ================================================== -->
<div class="site-content containerajax">

	<div class="container">
		<div id="contentForAjax">
			<!-- Team Roster Navigation -->
			<div class="team-roster-nav js-team-roster-nav">
				<?php foreach($playersInfoLite as $k=>$v) :?>
				<div class="team-roster-nav__item ">
					<div class="team-roster-nav__hexagon ">
						<figure class="team-roster-nav__img">
							<img style="width: 108px; height: 152px;" src="<?php echo Router::webroot($v->avatarPath)?>"
								alt="">
							<span class="team-roster-nav__triangle"></span>
							<span class="team-roster-nav__triangle-border"></span>
							<span class="team-roster-nav__icon">
								<svg role="img" class="df-icon df-icon--fire">
									<use xlink:href="assets/images/esports/icons-esports.svg#fire" />
								</svg>
							</span>
						</figure>
					</div>
					<div class="team-roster-nav__meta">
						<h5 class="team-roster-nav__nickname"><?php echo $v->name?><span class="highlight"></span></h5>
					</div>
				</div>
				<?php endforeach; ?>

			</div>
			<!-- Team Roster Navigation / End -->

			<!-- Team Roster - Card -->
			<div class=" team-roster team-roster--card team-roster--slider-with-nav js-team-roster--slider-with-nav mb-0 pb-0"
				data-slick='{"autoplay": true, "autoplaySpeed": 6000}'>

				<!-- Player -->
				<?php foreach($playersInfoLite as $k=>$v) :?>
				<div class="team-roster__item card card--no-paddings mb-0 ">
				<!-- pb-0 slick-initialized slick-slider" -->
					<div class="card__content ">
						<div class="team-roster__content-wrapper ">

							<!-- Player Photo -->
							<figure class="team-roster__player-img">
								<div
									class="team-roster__player-shape team-roster__player-shape--bg1 effect-duotone effect-duotone--primary">
								</div>
								<img src="assets/images/esports/samples/team-player1-lg.png" alt="">
							</figure>
							<!-- Player Photo / End-->

							<!-- Player Content -->
							<div class="team-roster__content ">

								<!-- Player Details -->
								<div class="team-roster__player-details ">
									<div class="team-roster__player-info">
										<h5 class="team-roster__player-realname">
											<?php echo $v->firstname . '  '.  $v->lastname; ?></h5>
										<h3 class="team-roster__player-nickname"><?php echo $v->name?><span
												class="highlight"></span>
										</h3>
									</div>
								</div>
								<!-- Player Details / End -->

								<!-- Player Excerpt -->
								<div class="team-roster__player-excerpt">
									<?php echo $v->content ?>
								</div>
								<!-- Player Excerpt / End -->

								<!-- Player Details - Common -->
								<div class="team-roster__player-details-common">
									<div class="team-roster__player-metrics">
										<div class="team-roster__player-metrics-item">
											<h6 class="team-roster__player-metrics-item-label">Born In:</h6>
											<div class="team-roster__player-metrics-item-value"><?php echo $v->born ?></div>
										</div>
										<div class="team-roster__player-metrics-item">
											<h6 class="team-roster__player-metrics-item-label">Age:</h6>
											<div class="team-roster__player-metrics-item-value"><?php echo $v->age ?></div>
										</div>
									</div>
									<ul class="team-roster__player-social social-links social-links--circle-filled">
										<?php if(isset($v->facebook) || $v->facebook != NULL) :?>
										<li class="social-links__item">
											<a href="<?php echo $v->facebook;?>" class=""><i style="color:#3b5998"
													class="fab fa-facebook-f fa-4x"></i></a>
										</li>
										<?php endif; ?>
										<?php if(isset($v->twitter) || $v->twitter != NULL) :?>
										<li class="social-links__item">
											<a href="<?php echo $v->twitter;?>" class=""><i style="color:#00acee"
													class="fab fa-twitter fa-4x"></i></a>
										</li>
										<?php endif; ?>
										<?php if(isset($v->twitch) || $v->twitch != NULL) :?>
										<li class="social-links__item">
											<a href="<?php echo $v->twitch;?>" class=""><i style="color:#6441a5"
													class="fab fa-twitch fa-4x"></i></a>
										</li>
										<?php endif; ?>
										<?php if(isset($v->instagram) || $v->instagram != NULL) :?>
										<li class="social-links__item">
											<a href="<?php echo $v->instagram;?>" class=""><i style="color:#8a3ab9"
													class="fab fa-instagram fa-4x"></i></a>
										</li>
										<?php endif; ?>
									</ul>
								</div>
								<!-- Player Details - Common / End -->

							</div>
							<!-- Player Content / End -->

							<!-- Player Meta Info -->
							<aside class="team-roster__meta">
								<div class="team-roster__meta-item">
									<div class="team-roster__meta-icon">
										<svg role="img" class="df-icon df-icon--fire">
											<use xlink:href="assets/images/esports/icons-esports.svg#fire" />
										</svg>
									</div>
									<div class="team-roster__meta-label"><?php echo $v->position ?></div>
								</div>
								<div class="team-roster__meta-item">
									<a
										href="<?php echo Router::url('users/player/id:'.$v->id.'/slug:'.str_replace(" ", "", strtolower($v->name)).'/name:'.str_replace(" ", "", strtolower($v->gameName)));?>">
										<div class="team-roster__meta-icon team-roster__meta-icon--more">
											<i class="fa fa-ellipsis-h"></i>
										</div>
										<div class="team-roster__meta-label">More Info</div>
									</a>
								</div>
							</aside>
							<!-- Player Meta Info / End -->

						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<!-- Player / End -->
			
			</div>
			<!-- Team Roster - Card / End -->
		</div>
	</div>
</div>
<!-- Content / End -->

<script>
$(document).ready(function () {

	function slickCarousel() {
		$('.js-team-roster-nav').not('.slick-initialized').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			variableWidth: true,
			asNavFor: '.js-team-roster--slider-with-nav',
			focusOnSelect: true,
			arrows: false,
			rows: 0,
			responsive: [{
					breakpoint: 1200,
					settings: {
						slidesToShow: 5,
					}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 4,
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 540,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
					}
				}
			]
		});

		$('.team-roster--card-slider').slick({
					slidesToShow: 1,
					arrows: true,
					dots: false,
					rows: 0,
					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
							}
						}
					]
				});

				$('.js-team-roster--slider-with-nav').slick({
					slidesToShow: 1,
					arrows: true,
					dots: false,
					speed: 300,
					rows: 0,
					cssEase: 'cubic-bezier(0.23, 1, 0.32, 1)',
					asNavFor: '.js-team-roster-nav',
					responsive: [
						{
							breakpoint: 992,
							settings: {
								arrows: false,
							}
						}


						
					]
				});
	}


	$(".navAjax").on('click',  function (event) {

		var req = $(this).attr("href");
		console.log(req)
		$.ajax({
			type: "POST",
			url: req,
			data: 'old',
			dataType: "html",
			success: function (data) {
				var lll = $(data).find(".containerajax");      
				var dd = lll.contents();
				$(".site-content").html(dd);
				slickCarousel()
			},
			error: function (msg, string) {
				alert("Error !: " + string);
			},
		});
		event.preventDefault();
	});


})
</script>
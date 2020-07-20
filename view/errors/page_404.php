
		
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
				<!-- Error 404 -->
				<div class="error-404">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<figure class="error-404__figure">
								<img src="assets/images/icon-ghost.svg" alt="">
							</figure>
							<header class="error__header">
								<h2 class="error__title"><?php echo '<h1>'.$message.'</h1>'; ?> </h2>
								<h3 class="error__subtitle">Seems that we have a problem!</h3>
							</header>
							<div class="error__description">
								The page you are looking for has been moved or doesn’t exist anymore, if you like you can return to our homepage. If the problem persists, please send us an email to <a href="info@elvets.gg">info@elvets.gg</a>
							</div>
							<footer class="error__cta">
								<a href=" <?= router::url('posts/index');?>" class="btn btn-primary">Return to Home</a>
								<a href="#" class="btn btn-primary-inverse">Keep Browsing</a>
							</footer>
						</div>
					</div>
				</div>
				<!-- Error 404 / End -->
		
			</div>
		</div>
		
		<!-- Content / End -->
		


		<footer id="footer" class="footer">
		
		
			<!-- Sponsors -->
			<div class="sponsors-wrapper">
				<div class="container">
					<div class="sponsors">
						<ul class="sponsors-logos">
							<li class="sponsors__item">
								<a href="http://www.darkgamestudios.com" target="_blank"><img src="assets/images/esports/sponsor-darkgame.png" alt="Dark Game"></a>
							</li>
							<li class="sponsors__item">
								<a href="http://www.thegeniusgeek.com" target="_blank"><img src="assets/images/esports/sponsor-geniusgeek.png" alt="GeniusGeek"></a>
							</li>
							<li class="sponsors__item">
								<a href="http://www.ghostgamess.com" target="_blank"><img src="assets/images/esports/sponsor-ghostgames.png" alt="GhostGames"></a>
							</li>
							<li class="sponsors__item">
								<a href="http://www.gamechatapp.com" target="_blank"><img src="assets/images/esports/sponsor-gamechat.png" alt="GameChat"></a>
							</li>
							<li class="sponsors__item">
								<a href="http://www.elite-s-productions.com" target="_blank"><img src="assets/images/esports/sponsor-elitesound.png" alt="eliteSound"></a>
							</li>
							<li class="sponsors__item">
								<a href="http://www.dragonfireagency.com" target="_blank"><img src="assets/images/esports/sponsor-dragonfire.png" alt="DragonFire"></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Sponsors / End -->
		
		
	

	</div>

	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/jquery/jquery-migrate.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/core.js"></script>
	
	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	<script src="assets/vendor/jquery-duotone/jquery.duotone.min.js"></script>
	
	
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>

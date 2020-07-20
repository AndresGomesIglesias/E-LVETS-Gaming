	<!-- Main Navigation -->
    <nav id="navhide" class="main-nav navhide2">
							<ul class="main-nav__list">
								<li class=""><a href="<?php echo Router::url('posts/blog/'); ?>">News</a></li>
								<li class=""><a  style="color: #fff;">Teams</a>
									<!-- Mega Menu -->
									<div class="main-nav__megamenu main-nav__megamenu--no-paddings ">
										<div class="row">
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-1">
													<a  class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Section</span>
														<span class="main-nav-banner__title">Elite</span>
													</a>
												</li>
												<?php $pagesMenu = $this->request('Pages','getMenu'); ?>
												<?php foreach($pagesMenu['pageElite'] as $p) :?>
												<li><a href="<?php echo Router::url('users/team/id:'.$p->id.'/slug:'.$p->slug); ?>" title="<?php echo $p->teamName; ?>"><?php echo $p->teamName; ?></a></li> 
												<?php endforeach; ?>
											</ul>
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-2">
													<a href="#" class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Section</span>
														<span class="main-nav-banner__title">Challenger</span>
													</a>
												</li>
												<?php foreach($pagesMenu['pageChall'] as $p) :?>
												<li><a href="<?php echo Router::url('users/team/id:'.$p->id.'/slug:'.$p->slug); ?>" title="<?php echo $p->name; ?>"><?php echo $p->name; ?></a></li> 
												<?php endforeach; ?>
											</ul>
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-3">
													<a  class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Section</span>
														<span class="main-nav-banner__title">Academie</span>
													</a>
												</li>
												<?php foreach($pagesMenu['pageAca'] as $p) :?>
												<li><a href="<?php echo Router::url('users/team/id:'.$p->id.'/slug:'.$p->slug); ?>" title="<?php echo $p->name; ?>"><?php echo $p->name; ?></a></li> 
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
									<!-- Mega Menu / End -->
								</li>
                                <li class=""><a style="color: #fff;">club</a>
									<!-- Mega Menu -->
									<div class="main-nav__megamenu main-nav__megamenu--no-paddings ">
										<div class="row">
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-1">
													<a  class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Performance</span>
														<span class="main-nav-banner__title">Performance</span>
													</a>
												</li>
												<li><a href="<?php echo Router::url('results/index');?>">Resultat</a></li>
												<li><a href="_esports_event-overview-1b.html">palmares</a></li>
												
											</ul>
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-2">
													<a  class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">membres</span>
														<span class="main-nav-banner__title">Association</span>
													</a>
												</li>
												<li><a href="<?php echo Router::url('users/member'); ?>">Membres</a></li>
												<li><a href="_esports_event-overview-1b.html">Evenement</a></li>
												<li><a href="_esports_event-overview-1b.html">join as member</a></li>
										
											</ul>
											<ul class="col-lg-4 col-md-4 col-12 main-nav__ul main-nav__ul-2cols">
												<li class="main-nav__title main-nav-banner  main-nav-banner--img-3">
													<a  class="main-nav-banner__link">
														<span class="main-nav-banner__subtitle">Academie</span>
														<span class="main-nav-banner__title">Academie</span>
													</a>
												</li>
												<li><a href="_esports_event-overview-1a.html">Informations</a></li>
												<li><a href="_esports_event-overview-1b.html">Join academie!</a></li>
												<li><a href="_esports_event-overview-1c.html">plan</a></li>												
											</ul>
										</div>
									</div>
									<!-- Mega Menu / End -->
								</li>
								<li class=""><a href="<?php echo Router::url('pages/partner/')?>">Partner</a></li>
								<li class=""><a href="">more</a>
                                <ul class="main-nav__sub">
                                    <li><a href="<?php echo Router::url('pages/about/')?>">About</a></li>
                                    <li><a href="<?php echo  Router::url('pages/chartgraphique/');?>">Chart graphique</a></li>
									<li><a href="<?php echo  Router::url('pages/contact/');?>">contact</a></li>
								</ul>
								</li>
							</ul>
						</nav>
						<!-- Main Navigation / End -->
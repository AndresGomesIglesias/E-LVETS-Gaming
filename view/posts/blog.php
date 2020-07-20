<div class="post-filter post-filter--boxed">
	<div class="container">
		<form action="" class="post-filter__form">
			<div class="post-filter__select test">
				<label class="post-filter__label">Category</label>
				<!-- ----------------------------------------------------------------------------------------------------------------------- -->
				<div  class="cs-select cs-skin-border selectItems" tabindex="0">
					<select name="selectName" id="test" class="cs-select cs-skin-border ">
						<option value="" disabled="" selected="">All Articles</option>
						<?php foreach($categories as $k=>$v) :?>
						<option id="valsel" class="tt" data-card="<?php echo str_replace(" ", "", $v->categories) ;?>"
							value="<?php echo $v->categories?>"><?php echo $v->categories?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<!-- ----------------------------------------------------------------------------------------------------------------------- -->
			<!-- <div class="post-filter__select">
				<label class="post-filter__label">Filter By</label>

				<div class="cs-select cs-skin-border" tabindex="0">
					<div class="cs-options">
						<ul>
							<li data-option="" data-value="date"><span>Article Date</span></li>
							<li data-option="" data-value="id"><span>Article ID</span></li>
							<li data-option="" data-value="comments"><span>Last Comments</span></li>
							<li data-option="" data-value="random"><span>Random</span></li>
						</ul>
					</div>
					<select id="sel" class="cs-select cs-skin-border ">
						<option value="" disabled="" selected="">Article Date</option>
						<option value="date">Article Date</option>
						<option value="id">Article ID</option>
						<option value="comments">Last Comments</option>
						<option value="random">Random</option>
					</select>
				</div>
			</div>
			<div class="post-filter__select">
				<label class="post-filter__label">Order</label> -->
<!-- 
				<div class="cs-select cs-skin-border" tabindex="0">
					<div class="cs-options">
						<ul>
							<li data-option="" data-value="ascending"><span>Ascending</span></li>
							<li data-option="" data-value="descending"><span>Descending</span></li>
						</ul>
					</div><select class="cs-select cs-skin-border">
						<option value="" disabled="" selected="">Ascending</option>
						<option value="ascending">Ascending</option>
						<option value="descending">Descending</option>
					</select>
				</div>
			</div> -->

			<div class="post-filter__submit">
				<button id="allArticles" type="submit" class="btn btn-primary btn-block">All Articles</button>
			</div>
		</form>
	</div>
</div>

<div id="tout_les_post" class="site-content">
	<div class="container">
		<div class="row">

			<!-- Content -->
			<div class="content col-lg-12">
			<!-- style="background-color: <?php echo $v->color;?>;" -->
				<!-- Posts Grid -->
				<div id="post-grid" class="posts posts--tile posts--tile-alt post-grid post-grid--masonry row" style="height: 100%;">
					<?php foreach($datacarteAll as $k=>$v) :?>
					<div   data-target="<?php echo  trim($v->categories) ;?>" class="main-id-card post-grid__item col-sm-4 custom_post">
						<div   class=" one-card posts__item posts__item--card custom_item posts__item--category-1 posts__item--<?php echo str_replace(" ", "", $v->categories) ;?>  card ">
							<figure
								class="posts__thumb card-top backgroup<?php echo $v->categories ;?>">
								<div id="parentColor" class=" posts__cat"><span
									data-color="<?php echo $v->color;?>"class="js_label label "><?php echo $v->categories ;?></span>
								</div>
								<a href="<?php echo Router::url('posts/view/id:'.$v->id.'/slug:'.lcfirst ($v->slug));?>">
									<img src="<?php echo Router::webroot('img/' .  str_replace(" ", "", $v->minature));?>" alt="">
								</a>
							</figure>
							<div class="posts__inner card__content card-center ">
								<a data-color="<?php echo $v->color;?>" href="<?php echo Router::url('posts/view/id:'.$v->id.'/slug:'.lcfirst ($v->slug));?>" class="js_posts__cta posts__cta"></a>
								<div>
									<time datetime="2018-08-23" class="posts__date"><?php echo $v->created ;?></time>
								</div>
								<div>
								<!-- class=" posts__title posts__title--color-hover" -->
									<h6 style="font-size: 1.5vw;"><a
									onmouseenter="enter(this)" onmouseout="leave(this)" class="js_hover" data-color="<?php echo $v->color;?>" data-color="<?php echo $v->color;?>"   href="<?php echo Router::url('posts/view/id:'.$v->id.'/slug:'.lcfirst ($v->slug));?>"><?php echo $v->name ;?></a>
									</h6>
								</div>
							</div>
						<!-- <footer class="posts__footer card__footer cardfooter">
								<div class="post-author">
									<figure class="post-author__avatar"><img
											src="assets/images/samples/avatar-12-xs.jpg" alt="Post Author Avatar">
									</figure>
									<div class="post-author__info">
										<h4 class="post-author__name">Erick Rodgers</h4>
									</div>
								</div>
						
							</footer> -->
						</div>
					</div>
					<?php endforeach; ?>
				<!-- Post Grid / End -->
				</div>
			<!-- Content / End -->

			<!-- pagination -->
			<nav id="ancre" class="post-pagination" aria-label="Blog navigation">
				<ul class="pagination pagination--circle justify-content-center">
					<?php for($i=1; $i <= $page; $i++): ?>
					<li href="" <?php if($i==$this->request->page) echo 'class="page-item  active"'; ?>><a
							class="page-link" href="?page=<?php echo $i; ?>#tout_les_post"><?php echo $i; ?></a></li>
					<?php endfor; ?>
				</ul>
			</nav>
			<!-- pagination End-->
		</div>
	</div>
</div>

<script>

changeColor('js_label');
changeColor('js_posts__cta');


//************************* */
// Permet de de changer le background-color de labels
//@ classColor:  string 
//***************************** */
function changeColor(classColor) {
	var labels = document.getElementsByClassName(classColor)
	var str = "";
	for (i = 0; i < labels.length; i++) {
		str += " - " + labels[i];
		color = labels[i].dataset.color
		labels[i].style.backgroundColor = color;
	}
}
//************************* */
// Fonction Hoverin pour changer le color du text
//***************************** */
function enter(d) {	
	colors = d.dataset.color
	d.style.color = colors
}
//************************* */
// Fonction Hoverout pour remettre la couleur a blanc
//***************************** */
function leave(d) {	
	d.style.color = 'white';
}


</script>
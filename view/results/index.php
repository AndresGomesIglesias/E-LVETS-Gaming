<div class="post-filter post-filter--boxed col-lg-12">
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
		

			<div class="post-filter__submit">
				<button id="allArticles" type="submit" class="btn btn-primary btn-block">All Articles</button>
			</div>
		</form>
	</div>
</div>

<div class="site-content">
    <div class="container ">



        <?php foreach($allResults as $k=>$v) :?>
        <div class=" alc-event-result-box card card--no-paddings">
            <!-- Header -->
            <header
                class="alc-event-result-box__header alc-event-result-box__header--center card__header card__header--no-highlight">
                <div class="alc-event-result-box__header-date"><?php echo $v->created; ?></div>
                <div class="alc-event-result-box__header-heading">
                    <h5 class="alc-event-result-box__header-title"><?php echo $v->competionName; ?></h5><span
                        class="alc-event-result-box__header-subtitle">Finals - Week 5</span>
                </div>
                <div class="alc-event-result-box__header-venue"></div>
            </header><!-- Header / End -->
            <!-- Team & Result -->
            <div class="alc-event-result-box__content card__content">
                <div class="alc-event-result-box__teams alc-event-result-box__teams--default">
                    <!-- Team #1 -->
                    <div class="alc-event-result-box__team alc-event-result-box__team--first">
                        <div class="alc-event-result-box__team-img effect-duotone effect-duotone--primary">
                            <div class="effect-duotone__layer">
                                <div class="effect-duotone__layer-inner"></div>
                            </div>
                        </div>
                        <div class="alc-event-result-box__team-body ">
                            <figure class="alc-event-result-box__team-logo "><img class="imgResultAjustement"
                                    src="<?php echo router::webroot('img/3.png');?>" alt=""></figure>
                            <div class="alc-event-result-box__team-meta">
                                <h5 class="alc-event-result-box__team-name">
                                    <?php echo (isset($v->alliance)) ?  $v->alliance : 'E-LVETS';?></h5><span
                                    class="alc-event-result-box__team-subtitle"><?php echo $v->Nickname; ?></span>
                            </div>
                        </div>
                    </div><!-- Team #1 / End -->
                    <!-- Score -->
                    <div class="alc-event-result-box__team-score"><span class="win"><?php echo $v->butHome; ?></span> -
                        <span class="loss"><?php echo $v->butOpp; ?></span></div><!-- Score / End -->
                    <!-- Team #2 -->
                    <div class="alc-event-result-box__team alc-event-result-box__team--second">
                        <div class="alc-event-result-box__team-img effect-duotone effect-duotone--info">
                            <div class="effect-duotone__layer">
                                <div class="effect-duotone__layer-inner"></div>
                            </div>
                        </div>
                        <div class="alc-event-result-box__team-body ">
                            <figure class="alc-event-result-box__team-logo imgTeams"><img
                                    class="imgTeams imgResultAjustement"
                                    src="<?php echo router::webroot($v->imgPath);?>" alt=""></figure>
                            <div class="alc-event-result-box__team-meta">
                                <h5 class="alc-event-result-box__team-name"><?php echo $v->opponent; ?></h5><span
                                    class="alc-event-result-box__team-subtitle"><?php echo $v->AdditionName; ?></span>
                            </div>
                        </div>
                    </div><!-- Team #2 / End -->
                </div>
            </div><!-- Team & Result / End -->
        </div>
        <?php endforeach; ?>
    </div>
</div>
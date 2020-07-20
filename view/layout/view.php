<div class="page-heading page-heading--post-bg page-heading--simple"></div>

<div class="site-content">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="content col-lg-8 offset-lg-3">
                <!-- Article -->
                <article class="post post--single">
                    <div class="post__category"> <span
                            class="label posts__cat-label posts__cat-label--<?php echo str_replace(" ", "", $data->categories) ;?>"><?php echo $data->categories ;?></span>
                    </div>
                    <header class="post__header">
                        <h2 class="post__title"><?php echo $data->name ;?></h2>
                        <ul class="post__meta meta">
                            <li class="meta__item meta__item--author"><img style="height: 35px;width: 35px;"
                                    src="<?php echo Router::webroot('img/me.jpg');?>" alt="Post Author Avatar"> by
                                <?php echo $data->firstName ;?> <?php echo '"' .$data->Nickname .'"';?>
                                <?php echo $data->lastName .'   '.$data->PostId ;?></li>
                            <li class="meta__item meta__item--date"><time
                                    datetime="2018-08-27"><?php echo $data->created ;?></time></li>
                        </ul>
                    </header>
                    <div class="post__content-wrapper">
                        <!-- Post Sharing Buttons -->
                        <div class="post-sharing-compact stacked">
                            <a href="https://www.facebook.com/elvetsgaming/?ref=bookmarks"
                                class="btn btn-default btn-sm btn-facebook btn-icon"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/elvetsgaming"
                                class="btn btn-default btn-sm btn-twitter btn-icon"><i class="fab fa-twitter"></i></a>
                        </div>
                        <!-- Post Sharing Buttons / End -->
                        <div class="post__content">
                            <div class="post__content--inner-left">
                                <?php echo $this->Session->flash() ?>
                                <?php echo $data->content ;?>
                            </div>
                        </div>
                </article>
                <!-- Article / End -->
            </div>
            <!-- Content / End -->
        </div>
    </div>
</div>

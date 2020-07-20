










<div class="col-md-3">

    <div>
        <form role="search" method="get"   action="<?=  BASE_URL.'/posts/index/';?>">
            <div>
                <label>Search </label>
                <input type="text"  name="s">
                <input type="submit" name='submit'>
            </div>
        </form>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Tags</h4>
            <a class="btn btn-light btn-sm mb-1" href="<?= BASE_URL.DS.'posts'.DS.'index';?>">ALL</a>
            <?php foreach($cate as $k=>$v) : ?>
            <a class="btn btn-light btn-sm mb-1" href="<?=  BASE_URL.'/posts/index/'. $v->categories ;?>"><?= $v->tags?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Last posts</h4>
            <?php foreach($lastposts as $k=>$v) : ?>
            <a href="<?php echo BASE_URL.'/posts/view/'.$v->id; ?>" class="d-inline-block">
                <h4 class="h6"><?= $v->name?></h4>
            </a>
            <br/>
            <time class="timeago" datetime="<?=  date("F j, Y", strtotime($v->created));?>" data-tid="7"><?=  date("m.d.y", strtotime($v->created));?></time>
            <br/>
            <?php endforeach; ?>
        </div>
    </div> 

</div>
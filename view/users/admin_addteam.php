<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <div class="col-md-11 form-panel">
    <div class="row ">
        <form action=" <?php echo Router::url('admin/users/addteam/'.$id); ?>" method="POST" class="form-group"
            style="width: 90%;">
            <?php echo $this->Form->input('id','hidden');?>

            <div class="custom-control custom-switch">
            <!-- teamName -->
                <?php echo $this->Form->input('teamName','Nom de l\' équipe?',array('placeholder' => 'Nom de l\'équipe' ,'class' =>'form-control')) ;?>
                <?php echo $this->Form->input('mainID','Nom du jeu ? &nbsp   (<a data-toggle="modal" data-target="#exampleModal" id="addGamesLinks" href="'. Router::url('admin/games/index').'"> ajouter un jeu à la liste </a>)',
                    array('txt' => 'choisir un jeu','options' => $gamelist,'class' => 'form-control'));?>
                <?php echo $this->Form->input('level','Niveau de l\' équipe ?',array('options2'=>$levelSelect,'class' =>'form-control'));?>
                <?php echo $this->Form->input('online','',array('type'=>'alchemists_checkbox', 'txt'=>'<b>Team active</b> &nbsp <small>(Si vous voulez que votre équipe soit visible sur le site il faut le rendre active)</small)'));?>
                <div id="containt_players_carts_in" class="col-md-12 containt_players_carts">
                <h3>Votre équipe</h3>
                    <div id="containt_players_carts_row_in" class="row toAddPlayers">
                        <?php foreach($player as $k=>$v) : ?>
                        <input id="player_<?php echo $v->id; ?>" type="hidden" name="toteam_<?php echo $v->id; ?>"
                            value="<?php echo $v->team; ?>">
                        <div  class="col-xl-2   player_cart" data-id="<?php echo $v->id; ?>">
                            <img id="img_label" class="allPlayers rounded alchemists_rounded float-left  playersHover"
                                src="<?php echo Router::webroot($v->avatarPath)?>">
                                
                                <label for="img_label"><?php echo $v->nickname;  ?><small> &nbsp <?php echo isset($v->role) ? '('.$v->role .')' : ' '; ?></small></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button id="sub" value='send' type="submit" class="btn btn-primary-inverse btn-sm btn btn-primary sub">Enregistrer</button>
                <button id="btn_add" value='' type="" class="btn btn-info btn-sm ">Champions</button>
        </form>

        <div id="containt_players_carts_out" class="col-md-12 containt_players_carts players_content_none">
            <h3>Ajouter un champion à votre équipe...</h3>
            <div id="containt_players_carts_row_out" class="row toAddPlayers containt_players_carts_row_bottom">
                <?php foreach($players as $k=>$v) : ?>
                <div  class="col-xl-2  player_cart" data-id="<?php echo $v->id; ?>">
                    <img id="img_labelout" class=" <?php echo ($v->team != 0 ) ? 'player_cart_opa' :''; ?> allPlayers rounded alchemists_rounded float-left border playersHover" src="<?php echo Router::webroot($v->avatarPath)?>">
                    <?php if($v->team != 0) :?>
                    <img id="crose" class="" src="/ELV/img/crose.png">
                    <?php endif; ?>
                    <label for="img_label"><?php echo $v->nickname;  ?><small> &nbsp <?php echo isset($v->role) ? '('.$v->role .')' : ' '; ?></small></label>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


 <div class="modal modaleMain"  tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un jeu</h5>
        </button>
      </div>
      <div id="modalBody" class="modal-body">
      </div>
      <div class="modal-footer">
      <button id="btnClose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
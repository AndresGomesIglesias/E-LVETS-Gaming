<?php if(empty($this->Game->errors)) : ?>
<div id="modaleForAddTeam"class="col-md-11 form-panel">
    <div class="row ">
        <form id='test' action=" <?php echo Router::url('admin/games/add/'.$id); ?>" method="POST" class="form-group" style="width: 90%;">
            <div class="custom-control custom-switch">
            <?php echo $this->Form->input('id','hidden');?>
            <?php echo $this->Form->input('name', 'Game name ?', array('placeholder' => 'Nom du jeu','class' =>'form-control')) ;?>
            <?php echo $this->Form->input('tags', 'tag name ?', array('placeholder' => 'Nom le tag','class' =>'form-control '));?>
            <?php echo $this->Form->input('type', 'type', array('placeholder' => 'Nom du type (MMO,combat, moba etc...)', 'class' =>'form-control'));?>
            <?php echo $this->Form->input('members','members',array('txt' => 'Choisir si groupe/solo','options'=>$levelSelect,'class' =>'form-control'));?>
            <button id="subGames" value='send' type="submit" class="btn btn-primary sub">Submit</button>
            </div>
        </form>
    </div>
    <?php else : ?>
       <?php 
        // $d['errors'] = $err; 
        // die(json_encode($d)); 
        
        ?>
    <?php endif ; ?>
 
<script src="<?php echo Router::webroot('js/scipt.js');?>"></script>

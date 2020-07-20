<form action=" <?php echo Router::url('admin/results/add/'.$id); ?>" method="POST" class="" style="width: 90%;">
  <h3 class="col-xl-12">Match</h3>
  <div id="Toclone" class="col-xl-12 form-panel row " style="margin-bottom: 20px; margin-top: 20px;">
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <div class="col-xl-4 ">
      <div class="form-row align-items-center horizontalCenter">
        <div class="col-auto my-1 width100">
          <h4>Team allier</h4>
          <div class="fileupload-new thumbnail">
            <?php echo $this->Form->input('id','hidden'); ?>
            <img style="width: 150px;height: auto;text-align: center;" src="<?php echo Router::webroot('img/3.png'); ?>"
              alt="">
          </div>
          <div class="control-group hideAtStart">
          <?php echo $this->Form->input('teamAllianceID',' ',array(
                                              'txt'     => '4 - Choisir un element',
                                              'options' =>  array(),
                                              'data-userid' => $data2[0]->userID,
                                              'data-allianceid' =>  $data2[0]->teamAllianceID,
                                              'class'   =>  'custom-select mr-sm-2 ajaxList'));?>
          </div>
          <?php echo $this->Form->input('butHome','',array('class'=>'form-control', 'placeholder'=>"--->Your score here"), true);?>
        </div>
      </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <div class="col-xl-4 ">
      <div class="form-row align-items-center horizontalCenter">
        <div class="col-auto my-1 width100">
          <h4>Team Opponents</h4>
            <div style="height: 150px;" class="fileupload-new thumbnail">
              <img class="imgTeams" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="">
            </div>
            <div class="control-group hideAtStart">
                <?php echo $this->Form->input('teamOpponentID','',array(
                                          'txt'     => '3 - Club eSport?',
                                          'options' => $opponent,
                                          'class'   => 'custom-select mr-sm-2 ajaxList'));?>
             <?php echo $this->Form->input('butOpp','',array('class'=>'form-control','placeholder'=>"--->Your score here"), true);?> 
              <?php echo $this->Form->input('AdditionName','',array('class'=>'form-control ajaxList', 'placeholder'=>"Addition informations"));?> 
            </div>
          
          
          </div>
        </div>
      </div>
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------------------------------------>
    <div class=" col-xl-4 control-group">
            <?php echo $this->Form->input('created','date',array('type'=> 'datepick'))?>
            <?php echo $this->Form->input('competionID',' ',array(
                                        'options' => $compet,
                                        'txt'     => '2 - Choisir la competition', 
                                        'data-compID' =>$data2[0]->competionID,
                                        'class'   => 'custom-select mr-sm-2'));?>
            <?php echo $this->Form->input('gameID',' ',array(
                                        'txt'     => '1 - Choisir le jeu',
                                        'options' => $games,
                                        'data-target' => 'teamAllianceID',
                                        'data-url'  => router::url('admin/results/addAjaxSelect'),
                                        'class'   => 'custom-select mr-sm-2 ajaxList'));?>
                                        
            <?php echo $this->Form->input('online','hidden',array('type'=>'checkbox'),true);?>
      </div>
          <!------------------------------------------------------------------------------------------------------------------------------------>
          <div class="btt col-xl-12" style="margin-left: 0px; margin-top: 20px">
  <button id="sub" value='send' type="submit" class="btn btn-primary sub">Submit</button>
  </div>
  </div>
</form>

<script>
  $('#datepicker').datepicker({
    format: 'yyyy/mm/dd',
    uiLibrary: 'bootstrap4',
  });
</script>

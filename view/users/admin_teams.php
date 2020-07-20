<div class="col-md-12">
  <div class="col-md-12 alchemist_div_addTeam">
    <button class="btn btn-primary btn-xs magbot" ><a
        href="<?php echo Router::url('huadminha/users/addteam/'); ?>"><i class="fas fa-plus"> Add team </i></a></button>
  </div>
  <div class="alchemists_card_header custom_title">
    <h4>Games List</h4>
  </div>
  <div class="content-panel alchemists_card">
    <table class="table table-striped table-advance table-hover ">
      <thead class="alchemists_card">
        <tr>
          <th>Team name</th>
          <th>Niveau</th>
          <th class="hidden-phone">game</th>
          <th class="hidden-phone">status</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($playersInfoLite as $k=>$v) : ?>
        <tr>
          <td>
            <?php echo $v->name;?>
          </td>
          <td>
            <?php  
            if($v->level == 0){echo 'Elite';}
            elseif($v->level == 1){echo 'Challenger';}
            elseif($v->level == 2){echo 'Academie';}
            ?>
          </td>
          <td>
            <?php echo $v->gamesName ?>
          </td>
          <td>
            <span id="badgeDue"
              <?php echo ($v->online == 1) ? 'class="playersHover badge badge-pill badge-primary">active' : 'class="playersHover badge badge-pill badge-secondary">Not Active';?></span>
              </td> <td>
              <button class="btn btn-primary btn-xs"><a style="color: #212529;"
                  href="<?php echo Router::url('huadminha/users/addteam/'.$v->id); ?>"><i
                    class="fa fa-pencil"></i></a></button>
              <button class="btn btn-danger btn-xs"><a
                  href="<?php echo Router::url('huadminha/users/delete/'.$v->id); ?>"><i
                    class="fa fa-trash-o "></i></a></button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
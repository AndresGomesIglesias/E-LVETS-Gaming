<div class="col-md-12">
  <div class="col-md-12" style="margin-bottom: 20px;">
    <button class="btn btn-primary btn-xs"><a style="color: white; "
        href="<?php echo Router::url('huadminha/results/add'); ?>">Add team</a></button>
  </div>
  <div class="alchemists_card_header custom_title">
    <h4>Games List</h4>
  </div>
  <div class="content-panel alchemists_card">
    <table class="table table-striped table-advance table-hover ">
      <thead class="alchemists_card">
        <tr>
          <th><i class="fa fa-bullhorn"></i> Match</th>
          <th><i class="fa fa-calendar-o "></i> games</th>
          <th><i class="fa fa-calendar-o "></i> date</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $k=>$v) :?>
        <tr>
          <td>
            <div id="result_match" class="row">
              <div class="result_alliance team">
                <?=  (empty($v->alliance)) ? ' E-LVETS  ' :$v->alliance ; ?><br>
                <p><?=  (empty($v->Nickname)) ? ' ' : ' Player: &nbsp' .$v->Nickname ;?></p>
              </div>
              <div class="result_score ">
                <?= '&nbsp &nbsp '. $v->butHome ?>&nbsp : &nbsp<?=$v->butOpp?>
              </div>
              <div class="opponents team">
                <?= '&nbsp  &nbsp'. $v->opponent ?><br>
                <p><?= (empty($v->AdditionName)) ? ' ' : '&nbsp &nbsp Player:  &nbsp' .$v->AdditionName ;?> </p>
              </div>
            </div>
          </td>
          <td class="hidden-phone"><?= $v->gameName;?></td>
          <td class="hidden-phone"><?= $v->created;?></td>
          <td>
            <button class="btn btn-primary btn-xs"><a class="fa fa-check"
                href="<?php echo Router::url('admin/results/add/'.$v->id); ?>"></a></button>
            <button class="btn btn-danger btn-xs"><a class="fa fa-trash-o"
                href="<?php echo Router::url('admin/results/delete/'.$v->id); ?>"></a></button>

          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
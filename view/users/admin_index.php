
<div class="col-md-12">
  <div class="content-panel">
    <h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
    <hr>
    <table class="table table-striped table-advance table-hover">


      <thead>
        <tr>
          <th><i class="fa fa-calendar-o "></i> NickName</th>
          <th><i class="fa fa-calendar-o "></i> lastName</th>
          <th><i class="fa fa-calendar-o "></i> Team</th>
          <th><i class="fa fa-calendar-o "></i> role</th>
          <th><i class="fa fa-calendar-o "></i> Grade</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($UserList as $k=>$v) : ;   ?>
     
        <tr>
          <td class="hidden-phone"><?= $v->nickname;?></td>
          <td class="hidden-phone"><?= $v->lastname;?></td>
          <td class="hidden-phone"><?= $v->TeamsName;?></td>
          <td class="hidden-phone"><?= $v->role;?></td>
          <td class="hidden-phone"> <?php echo $this->Form->input('name','',array('options' => $roles, 'class'   => ''));?></td>

         
          <td>
            <form action="" method='post'>
              <button class="btn btn-primary btn-xs"><a style="color: white;" class="fa fa-pencil"
                  href="<?php echo Router::url('huadminha/users/add/'.$v->UsersID); ?>"></a></button>
              <!-- <button class="btn btn-danger btn-xs" ><a class="fa fa-trash-o" href="<?php echo Router::url('admin/results/delete/'.$v->id); ?>"></a></button> -->

            </form>
          </td>

        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /content-panel -->
</div>
<!-- /col-md-12 -->

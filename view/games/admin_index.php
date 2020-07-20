<div class="col-md-12">
  <div class="col-md-12" style="margin-bottom: 20px;">
    <button class="btn btn-primary btn-xs"><a style="color: white; "
        href="<?php echo Router::url('huadminha/games/add'); ?>">Add team</a></button>
  </div>
  <div class="alchemists_card_header custom_title">
    <h4>Games List</h4>
  </div>
  <div class="content-panel alchemists_card">
    <table class="table table-striped table-advance table-hover ">
      <thead class="alchemists_card">
        <tr>
          <th>
            Name
          </th>
          <th>
            tags
          </th>
          <th>
            style
          </th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($Game as $k=>$v) : ?>
        <tr>
          <td>
            <?php echo $v->name ?>
          </td>
          <td>
            <?php echo $v->tags ?>
          </td>
          <td>
            <?php echo $v->members ?>
          </td>
          <td>
            <span><button class="btn btn-primary btn-xs"><a style="color: #212529;"
                  href="<?php echo Router::url('huadminha/games/add/'.$v->id); ?>"><i
                    class="fa fa-pencil"></i></a></button></span>
            <button class="btn btn-danger btn-xs"><a
                href="<?php echo Router::url('huadminha/games/delete/'.$v->id); ?>"><i
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
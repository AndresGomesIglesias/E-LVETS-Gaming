<div class="col-md-12">
  <div class="content-panel">
    <h4><i class="fa fa-angle-right"></i> Gestion des catégories</h4>
    <hr>
    <table class="table table-striped table-advance table-hover">


      <thead>
        <tr>
          <th><i class="fa fa-calendar-o "></i> categories</th>
          <th><i class="fa fa-calendar-o "></i> tags</th>
          <th><i class="fa fa-calendar-o "></i> color</th>
   
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($dataAll as $k=>$v) : ;?>
        <tr>

          <td class="hidden-phone"><?= $v->categories;?></td>
          <td class="hidden-phone"><?= $v->tags;?></td>
          <td class="hidden-phone"><?= $v->color;?></td>
          <td>
            <button class="btn btn-primary btn-xs"><a style="color: #212529;"
            href="<?php echo Router::url('huadminha/categories/views/'.$v->id); ?>"><i
                  class="fa fa-pencil"></i></a></button>
            <button class="btn btn-danger btn-xss"><a
                href="<?php echo Router::url('huadminha/categories/delete/'.$v->id); ?>"><i
                  class="fa fa-trash-o "></i></a></button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- /content-panel -->
</div>

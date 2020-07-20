<script type="text/javascript" src="<?= Router::webroot('js/ckeditor/ckeditor.js');?>"></script>

<div class="col-md-11 form-panel" style="background-color: #f5f5f5;">
  <div class="row">
    <form class="col-md-12 row" id="myform" action="<?php echo Router::url('huadminha/posts/add/'.$id.'/'.$data2->slug); ?>" method="post">
      <div class="col-md-9 ">
        <?php echo $this->Form->input('name','',array('noDiv' => 'bootstrap','class'=>'form-control',"aria-describedby"=>"inputGroup-sizing-lg", 'aria-label'=>"Sizing example input", "fontawesome" => 'fa fa-pencil')); ?>
        <?php echo $this->Form->input('userID','hidden',array('noDiv' => 'bootstrap','class'=>'form-control',"aria-describedby"=>"inputGroup-sizing-lg", 'aria-label'=>"Sizing example input", "fontawesome" => 'fa fa-user')); ?>
        <?php echo $this->Form->input('id','hidden'); ?>
        <?php echo $this->Form->input('content','',array('type'=>'textarea','target'=>'_blank','class'=>' form-control xxlarge wysiwyg')); ?>
      </div>
    <div class="col-md-3">
    <div class="form-panel  div_output" style=" margin-bottom: 20px; margin-top: 0px;">
        <h2>publication</h2>

        <?php  echo $this->Form->input('online', '', array(
          'options2' =>  $publication,
          'class'   => 'custom-select mr-sm-2',
        ));
          // dd($data2->slug);
          ?>
          <button  data-url="<?php echo Router::root('view/layout/view.php'); ?>" id="js_preview"  styled="height: 50px;"class="btn btn-success btn_ckeditor"> <a href="">Preview</a> </button>
          <button styled="height: 50px;"class="btn btn-primary btn_ckeditor"> SEND </button>
      </div>
      <div class="form-panel " style="margin: 0px;">
        <h2>Categories</h2>
        <?php  echo $this->Form->input('categories', '', array(
            'options' =>  $categorie,
            'class'   => 'custom-select mr-sm-2',
            'txt'     => 'choisir votre categorie'
          ))?>
          <div class="shadow-none p-3 bg-light rounded">
            <a data-toggle="modal" data-target="#add_data_Modal" class="text-decoration-none" href="">ajouter une catégorie</a>
          </div>
      </div>
      <div class="form-panel div_output" >
        <h2>Minature</h2>
        <div class="div_img">
          <img src="<?php echo Router::webroot('img/'. $data->minature) ; ?>" name ="mina" id="output">
          <?php echo $this->Form->input('minature', "", array('type' => 'file', 'class'=>"form-control-file" )); ?>
          </div>
      </div>
    </div>
    <div id="prev">
</div>
  </div>
  </form>
</div>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Ajouter une categories</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form"  action="<?php echo Router::url('huadminha/categories/addCategorie'); ?>" >
    <?php echo $this->Form->input('categorie','categorie',array('class'=>' form-control')); ?>
     <br />
     <?php echo $this->Form->input('tags','tags',array('class'=>' form-control', 'style' => 'margin-bottom: 20px')); ?>
     <?php echo $this->Form->input('id','hidden'); ?>
     <?php echo $this->Form->input('color','color', array('type' => 'color', 'class' => 'form-control', 'style' => 'height: 50px')); ?>
     <br />
     <br />
     <input  type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />
     <div class="shadow-none p-3 bg-light rounded">
            <a class="text-decoration-none" href="<?php echo Router::url('admin/categories/index'); ?>">gestion des catégories</a>
          </div>
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>



<script>












  // Permet de recuprer l'image et l'afficher dans une div
  file = document.getElementById('input_minature');
  console.log(file.val);
  file.addEventListener('change', function (e) {
    var reader = new FileReader
    reader.onload = function () {
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  })

  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
 var editor = CKEDITOR.replace('input_content', {
        height: ['500px'],
        filebrowserBrowseUrl: 'http://localhost:8090/ELV/webroot/js/ckeditor/plugins/kcfinder/ckfinder.html'
        // filebrowserUploadUrl: 'http://localhost:8090/ELV/webroot/js/ckeditor/upload.php',
  });
</script>
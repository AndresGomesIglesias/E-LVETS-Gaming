  
   <div class=" col-xl-8 mx-auto">
   <h4 class="">Ajouter une categories</h4>
    <form method="post" id="insert_form"  action="<?php echo Router::url('huadminha/categories/views/'. $dataFirst->id); ?>" >
    <?php echo $this->Form->input('categories','categorie',array('class'=>' form-control' )); ?>
     <br />
     <?php echo $this->Form->input('tags','tags',array('class'=>' form-control', 'style' => 'margin-bottom: 20px')); ?>
     <?php echo $this->Form->input('id','hidden'); ?>
     <?php echo $this->Form->input('color','color', array('type' => 'color', 'class' => 'form-control', 'style' => 'height: 50px')); ?>
     <br />
     <br />
     <button  style="height: 50px;"class="btn btn-primary btn_ckeditor"> SEND </button>
    
    </form>

    
   </div>
 
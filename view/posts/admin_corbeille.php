

     <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Corbeille</h4><hr><table class="table table-striped table-advance table-hover">
                
                
                <thead>
                  <tr>
                  <th><i class="fa fa-calendar-o "></i> Titre</th>
               <th><i class="fa fa-calendar-o "></i> editeur</th>
               <th><i class="fa fa-calendar-o "></i> Categorie</th>
               <th><i class="fa fa-calendar-o "></i> état</th>
               <th><i class="fa fa-calendar-o "></i> created</th>
               <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($data as $k=>$v) : ;?>
                  <tr>
                  
                <td class="hidden-phone"><?= $v->postName;?></td>
               <td class="hidden-phone"><?= $v->Nickname;?></td>
               <td class="hidden-phone"><?= $v->categories;?></td>
               <td id="js_idTd" class="hidden-phone">
               <span id="js_idspan" class="badge badge-danger">Corbeille</span>
                </td>
               <td class="hidden-phone"><?= $v->created;?></td>
                    <td>
                    <button   class="btn btn-primary btn-xs"><a style ="color: #212529;" href="<?php echo Router::url('huadminha/posts/add/'.$v->postID); ?>"><i class="fa fa-pencil" ></i></a></button>
                    <button   class="btn btn-danger btn-xss"><a href="<?php echo Router::url('huadminha/posts/delete/'.$v->postID); ?>"><i class="fa fa-trash-o " ></i></a></button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>

          <script>

    var select = document.getElementById('js_idTd');
    var span = document.getElementById('js_idspan');
    
   
     if(span.innerHTML === 2){
      $( "#js_idspan" ).addClass( "badge badge-pill badge-primary" );
     }






</script>
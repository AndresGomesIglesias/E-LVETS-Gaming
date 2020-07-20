// Add your custom JS code here



 


   
 
      document.querySelector(".selectItems").addEventListener("click", function(event) {
         var grid = document.getElementById('post-grid');
         var select = document.getElementById('test');
         var i = -1;
         do {
            i++
            if(select.value != ''){
                  if(grid.children[i].dataset.target === select.value){
                     $(grid).attr('style', 'height: auto');
                     $(grid.children[i]).show(150);
                     $(grid.children[i]).attr('style', 'position:static;');
                  }else{
                  $(grid.children[i]).hide();
               
               
               }
            }
         } while (i <=  grid.children.length);
      });

      document.querySelector("#allArticles").addEventListener("click", function(event) {
         event.preventDefault();
         var grid = document.getElementById('post-grid');
         $(grid.children).show(150);
         $(grid.children).attr('style', 'position:initial;');
        
        
      });


  


    


 




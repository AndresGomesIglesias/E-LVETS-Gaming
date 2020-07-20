<?php
class club extends Model{

 
    var $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message'=> 'Vous devez remplir le champ name'
        ),
        'tag' => array(
            'rule' => 'notEmpty',
            'message'=> 'Vous devez remplir le tags'
        ),
    );






    function saveSelect($request){
      $this->save(array(
                'id'            => $request->id,
                'name'          => $request->name,
                'tag'           => $request->tag,
                'slug'          => str_replace(' ', '-' ,strtolower($request->name)),
                'online'        => 1
            ));

        
}

    
}
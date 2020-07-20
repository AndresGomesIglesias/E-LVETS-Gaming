<?php
class Game extends Model{


    // var $validate = array(
    //     'name' => array(
    //         'rule' => 'notEmpty',
    //         'message'=> 'choisir un nom d\équipe'
    //     ),
    //     'tags' => array(
    //         'rule' => 'notEmpty',
    //         'message'=> 'choisir le tag'
    //     ),
    //     'type' => array(
    //         'rule' => 'notEmpty',
    //         'message'=> 'genre du jeu'
    //     ),
    //     'members' => array(
    //         'rule' => 'notEmpty',
    //         'message'=> 'type du jeu'
    //     ),
    // );






    function saveSelect($request){
        // dd($request);
      $this->save(array(
                'id'            => $request->id,
                'name'          => $request->name,
                'tags'          => $request->tags,
                'type'          => $request->type,
                'members'       => $request->members,
                'online'        => 1
            ));

        
}
    
}
<?php
class Team extends Model{

 




    // var $validate = array(
    //     'gamesName' => array(
    //         'rule' => 'notGames',
    //         'message'=> 'Le jeu que vous avez indiqué n est pas dans la liste veuillez le créer dans add Game'
    //     ),
    // );






    function saveSelect($request){
      $this->save(array(
                'id'            => $request->id,
                'name'          => $request->teamName,
                'gameID'        => $request->mainID,
                'slug'          => str_replace(' ', '-' ,strtolower($request->name)),
                'side'          => $request->side,
                'level'         => $request->level,
                'online'        => $request->online,
            ));

        
}

    
}
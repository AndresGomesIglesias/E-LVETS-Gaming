<?php
$table = 'results'; 
class Result extends Model{

     
    var $validate = array(
            'gameID' => array(
                'rule' => 'notEmpty',
                'message'=> 'Choisir une compétion'
            ),
            'competionID' => array(
                'rule' => 'notEmpty',
                'message'=> 'Choisir une compétion'
            ) ,
            'butHome' => array(
                'rule' => '([0-9\-]+)',
                'message'=> 'Seul les caratéres aphanumériques sont autoriser Home',
            ),
            'butOpp' => array(
                'rule' => '([0-9\-]+)',
                'message'=> 'Seul les caratéres aphanumériques sont autoriser Opp',
            ),
            'teamAllianceID' => array(
                'rule' => 'notEmpty',
                'message'=> 'Une équipe E-LVETS doit-être selectionné'
            ),        

            'teamOpponentID' => array(
                'rule' => 'notEmpty',
                'message'=> 'Une équipe advers doit-être selectionné'
            ),
            'created' => array(
                'rule' => 'notEmpty',
                'message'=> 'Choisir une une date'
            ),
        );
    

        function ifTeamsOrPlayers($request){
            // dd($request);
            if($request->gameID == 3 || $request->gameID == 4 || $request->gameID == 5){
                $this->save(array(
                        'id'            => $request->id,
                        'userID'      => $request->teamAllianceID,
                        'butHome'       => $request->butHome,
                        'teamOpponentID'  => $request->teamOpponentID,
                        'AdditionName'  => $request->AdditionName, 
                        'butOpp'        => $request->butOpp,
                        'created'       => $request->created,
                        'competionID' => $request->competionID,  
                        'gameID'      => $request->gameID,
                        'online'        => 1,
                    ));
                }else{
                    $this->save(array(
                        'id'            => $request->id,
                        'teamAllianceID'   => $request->teamAllianceID,
                        'butHome'       => $request->butHome,
                        'teamOpponentID'  => $request->teamOpponentID,
                        'AdditionName'  => $request->AdditionName, 
                        'butOpp'        => $request->butOpp,
                        'created'       => $request->created,
                        'competionID' => $request->competionID,  
                        'gameID'      => $request->gameID,
                        'online'        => 1,
                    ));
                }
        }

        

    
}
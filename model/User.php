<?php
class User extends Model{


   



    function saveSelect($request, $newID){
        $this->save(array(
                'id'                => $request->id,
                'firstname'         => $request->firstname,
                'lastname'          => $request->lastname,
                'nickname'          => $request->nickname,
                'age'               => $request->age,
                'content'           => $request->content,
                'mail'              => $request->mail,
                'grade'             => $request->grade,
                'team'              => $newID,
                'age'               => $request->age,
                'avatarPath'        => $request->avatarPath,
                'creaded'           => $request->creaded,
            ));
        
}







}
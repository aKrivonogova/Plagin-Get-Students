<?php

namespace block_get_students\output;
defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;
use user_picture;

class GetUsersThisCourse implements renderable, templatable
{
    private $countusers;
    private $usersList;  
    private $usersListOutput; 
    private $dataUsersOutPut;
    private $firstname; 
    private $lastname; 
    private $firstPicture; 
  public function __construct($groupId)
  {
    $usersList = groups_get_members($groupId);
    $this->countusers = count($usersList);
    foreach($usersList as $user){
        $itemUser['firstname'] = $user->firstname;
        $itemUser['lastname'] = $user->lastname;
        $itemUser['id'] = $user->id;
        $picture = $this->get_user_image($user);
        $itemUser['picture'] = $picture;
        $this->usersListOutput[] = $itemUser;
    };
    $this->firstPicture = $this->usersListOutput[0]['picture'];
    $this->firstname = $this->usersListOutput[0]['firstname'];
    $this->lastname = $this->usersListOutput[0]['lastname'];
  }

  private function get_user_image($user) {
    global $USER,$PAGE;
    $user_picture=new user_picture($user);
    $user_picture->size = 100; 
    if($user->picture){
        $src=$user_picture->get_url($PAGE);
    }
    else{
        $src=$user_picture->get_url($PAGE, null,  false);
    }
    return $src;
  }

  public function export_for_template(renderer_base $output)
  {
    if(count($this->usersListOutput)>0){
      $this->dataUsersOutPut['usersListOutput'] = $this->usersListOutput;
      $this->dataUsersOutPut['isUserListNotEmpty'] = true; 
      $this->dataUsersOutPut['firstname'] = $this->firstname;
      $this->dataUsersOutPut['lastname'] = $this->lastname;
      if($this->firstPicture!=''){
        $this->dataUsersOutPut['firstPicture'] = $this->firstPicture;
        $this->dataUsersOutPut['hasFirstPicture'] = true;
      }else{
        $this->dataUsersOutPut['hasFirstPicture'] = false;
      }
  }
   else{
      $this->dataUsersOutPut['isUserListNotEmpty'] = false;
  }
  return $this->dataUsersOutPut;
}

};

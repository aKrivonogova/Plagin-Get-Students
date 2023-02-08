<?php

namespace block_get_students\output;
defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;
use user_picture;

class GetItemUser implements renderable, templatable
{

 private $firstname; 
 private $lastname;
 private $user;
 private $picture;
 private $dataUserOutPut; 

   public function __construct($userid)
  {
    $user = \core_user::get_user($userid);
    $this->firstname = $user->firstname;
    $this->lastname = $user->lastname;
    $this->picture = $this->get_user_image($user);
  }

  public function export_for_template(renderer_base $output)
  {
    $this->dataUserOutPut['firstname'] = $this->firstname;
    $this->dataUserOutPut['lastname'] = $this->lastname;
    if($this->picture!=''){
      $this->dataUserOutPut['picture'] = $this->picture;
      $this->dataUserOutPut['hasUserImage'] = true;
    }else{
      $this->dataUserOutPut['hasUserImage'] = false;
    }
return $this->dataUserOutPut;
  }

  
  private function get_user_image($user) {
    global $USER,$PAGE;
    $user_picture=new user_picture($user, array('size' => 100));
    $user_picture->size = 100; 
    if($user->picture){
        $src=$user_picture->get_url($PAGE);
    }
    else{
        $src=$user_picture->get_url($PAGE, null,  false);
    }
    return $src;
  }

};

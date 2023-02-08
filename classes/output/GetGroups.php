<?php

namespace block_get_students\output;
defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

class GetGroups implements renderable, templatable
{
  private $groupsListData;
  private $groups; 
  private $countgroups;
  private $dataGroups;
  private $isGroupListNotEmpty = false; 
  public function __construct($courseId)
  {
    $groupsListData = groups_get_all_groups($courseId);
    $this->countgroups = count($groupsListData);
    foreach($groupsListData as $group){
        $itemGroup['name'] = $group->name; 
        $itemGroup['id'] = $group->id; 
        $this->groups[] = $itemGroup;
    }
    if(count($groupsListData)>0){
      $this->isGroupListNotEmpty = true; 
    }
  }

  public function export_for_template(renderer_base $output)
  {
    return [
      'groups' => $this->groups,
      'isGroupListNotEmpty' => $this->isGroupListNotEmpty,
    ];
  }

};

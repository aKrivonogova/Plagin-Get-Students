<?php
namespace block_get_students\output;
defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;
class renderer extends plugin_renderer_base {
  public function renderInitState(InitState $InitState){
    return $this->render_from_template('block_get_students/MainTemplate', $InitState->export_for_template($this));
  }
  public function renderGetGroups(GetGroups $GetGroups){
    return $this->render_from_template('block_get_students/GetGroups', $GetGroups->export_for_template($this));
  }
  public function renderGetUsersThisCourse(GetUsersThisCourse $GetUsersThisCourse){
    return $this->render_from_template('block_get_students/GetStudentsThisCourse', $GetUsersThisCourse->export_for_template($this));
  }
  public function renderGetItemUser(GetItemUser $GetItemUser){
    return $this->render_from_template('block_get_students/GetItemStudents', $GetItemUser->export_for_template($this));
  }
}

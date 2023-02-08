<?php
require_once($CFG->libdir . "/externallib.php");

class ajax_getGroups_external extends external_api
{
  public static function getListGroupsByCourseId($id)
  {
    global $PAGE;
    $renderer = $PAGE->get_renderer("block_get_students");
    $templateData = new \block_get_students\output\GetGroups($id);
    return $renderer->renderGetGroups($templateData);
  }

  public static function getListGroupsByCourseId_parameters()
  {
    return new external_function_parameters(
      array("id" => new external_value(PARAM_RAW, 'id'))
    );
  }

  public static function getListGroupsByCourseId_returns()
  {
    return new external_value(PARAM_RAW, 'get groups array by id course');
  }

}

class ajax_getStudents_external extends external_api
{
  public static function getStudentsByIdGroup($id)
  {
    global $PAGE;
    $renderer = $PAGE->get_renderer("block_get_students");
    $templateData = new \block_get_students\output\GetUsersThisCourse($id);
    return $renderer->renderGetUsersThisCourse($templateData);
  }

  public static function getStudentsByIdGroup_parameters()
  {
    return new external_function_parameters(
      array("id" => new external_value(PARAM_RAW, 'id'))
    );
  }

  public static function getStudentsByIdGroup_returns()
  {
    return new external_value(PARAM_RAW, 'get groups array by id group');
  }

}


class ajax_getItemStudent_external extends external_api
{
  public static function getItemStudentById($id)
  {
    global $PAGE;
    $renderer = $PAGE->get_renderer("block_get_students");
    $templateData = new \block_get_students\output\GetItemUser($id);
    return $renderer->renderGetItemUser($templateData);
  }

  public static function getItemStudentById_parameters()
  {
    return new external_function_parameters(
      array("id" => new external_value(PARAM_RAW, 'id'))
    );
  }

  public static function getItemStudentById_returns()
  {
    return new external_value(PARAM_RAW, 'get user by id');
  }

}

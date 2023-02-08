<?php

$functions = array(
  'getGroupsFromBackend' => array(
    'classname' => 'ajax_getGroups_external',
    'methodname' => 'getListGroupsByCourseId',
    'classpath' => 'blocks/get_students/externallib.php',
    'description' => '',
    'type' => 'read',
    'ajax' => true,
    'capabilities' => '',
    'loginrequired' => true
  ),
  'getStudentsGroupFromBackend' => array(
    'classname' => 'ajax_getStudents_external',
    'methodname' => 'getStudentsByIdGroup',
    'classpath' => 'blocks/get_students/externallib.php',
    'description' => '',
    'type' => 'read',
    'ajax' => true,
    'capabilities' => '',
    'loginrequired' => true
  ),
  'getStudentFromBackEnd' => array(
    'classname' => 'ajax_getItemStudent_external',
    'methodname' => 'getItemStudentById',
    'classpath' => 'blocks/get_students/externallib.php',
    'description' => '',
    'type' => 'read',
    'ajax' => true,
    'capabilities' => '',
    'loginrequired' => true
  )

  
);

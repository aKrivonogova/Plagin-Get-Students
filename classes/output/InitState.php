<?php

namespace block_get_students\output;
defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

class InitState implements renderable, templatable
{
  private $coursesListData;  
  private $isCourseListNotEmpty = false;

  public function __construct($coursesList)
  {
    foreach ($coursesList as $course) {
      $itemCourse['fullname'] = $course->fullname;
      $itemCourse['id'] = $course->id;
      $imgSrc = \core_course\external\course_summary_exporter::get_course_image($course);
      if($imgSrc!=''){
        $itemCourse['imgSrc'] = $imgSrc;
        $itemCourse['hasImageCourse'] = true;
      }else{
        $itemCourse['hasImageCourse'] = false;
      }  
      $this->coursesListData[] = $itemCourse;
    }
    if(count($coursesList)>0){
      $this->isCourseListNotEmpty = true;
    }
  }

  public function export_for_template(renderer_base $output)
  {
    return [
      'coursesListData' => $this->coursesListData,
      'isCourseListNotEmpty' => $this->isCourseListNotEmpty,
    ];
  }

};

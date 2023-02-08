<?php
defined('MOODLE_INTERNAL') || die();

class block_get_students extends block_base
{

    function hide_header(): bool
    {
        return true;
    }

    function allow_multiple(): bool
    {
        return false;
    }

    /**
     * @throws coding_exception
     */
    function init()
    {
        $this->title = get_string('pluginname', 'block_get_students');
    }

    /**
     * @throws coding_exception
     */
    function get_content()
    {
        if ($this->content !== NULL) {
            return $this->content;
        }
        $this->content = new stdClass;
        $this->content->text = '';
        $pluginData = get_string('pluginname', 'block_get_students');
        //$test = get_string('somekey', 'block_incrmenter');

        $coursseList = enrol_get_my_courses(); 

        $this->page->requires->css('/blocks/get_students/style.css');
        $this->page->requires->js('/blocks/get_students/assets/javascript.js');

        $renderer = $this->page->get_renderer("block_get_students");
        $template_data = new \block_get_students\output\InitState($coursseList);

        $this->content->text .= $renderer->renderInitState($template_data);
        return $this->content;

    }
}
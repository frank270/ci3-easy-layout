<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class MY_Controller extends CI_Controller
{
    /**
     * [$data description]
     * @var array
     */
    protected $data = array();
    /**
     * [$template description]
     * @var string
     */
    protected $template = 'master_view';
    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
        //$this->data['pagetitle'] = 'My CodeIgniter App';
    }
    /**
     * [render description]
     * @param  [type]  $the_view [description]
     * @param  [type]  $data     [description]
     * @param  boolean $return   [description]
     * @return [type]            [description]
     */
    protected function render($the_view = null, $data = null, $return = false)
    {
        $layout_data = $data;
        if (is_null($this->template)) {
            if ($return) {
                return $this->load->view($the_view, $data, true);
            } else {
                $this->load->view($the_view, $data);
            }
        } else {
            if ($return) {
                $layout_data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $data, true);
                $output = $this->load->view($this->template, $layout_data, true);
                return $output;
            } else {
                $layout_data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $data, true);
                $this->load->view( $this->template, $layout_data);
            }
        }
    }
    /**
     * [setLayout description]
     * @param [type] $layout [description]
     */
    protected function setLayout($layout)
    {
        $this->template = $layout;
    }
    /**
     * [dd description]
     * @param  [type] $obj [description]
     * @return [type]      [description]
     */
    protected function dd($obj)
    {
        echo "<pre>";
        print_r($obj);
        echo "</pre>";
    }
}

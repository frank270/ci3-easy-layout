<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data = array();
    protected $template = 'master_view';
    public function __construct()
    {
        parent::__construct();
        $this->data['pagetitle'] = 'My CodeIgniter App';
    }

    protected function render($the_view = null, $data = null, $return = false)
    {
        if (is_null($this->template)) {
            if ($return) {
                return $this->load->view($the_view, $data, true);
            } else {
                $this->load->view($the_view, $data);
            }
        } else {
            if ($return) {
                $data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $data, true);
                $output = $this->load->view('templates/' . $this->template . '_view', $data, true);
                return $output;
            } else {
                $data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $data, true);
                $this->load->view('templates/' . $this->template, $data);
            }
        }
    }
    protected function setLayout($layout)
    {
        $this->template = $layout;
    }
}

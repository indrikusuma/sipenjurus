<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class layout {
	public $layout = 'layout';
	public $title = 'Rumah Sakit dr. Etty Asharto';
	
    public function render($view, $data = [])
    {
		$CI =& get_instance();
		$data['content'] = $CI->load->view($view, $data, true);
		$data['title']   = $this->title;
		return $CI->load->view($this->layout, $data);
    }
	
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}
}
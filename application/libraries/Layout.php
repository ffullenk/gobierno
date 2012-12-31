<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    
    var $obj;
    var $layout;
	var $mark;
    
    function Layout($layout = "layout_main")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return=false)
    {	
		
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);
		
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
			$this->obj->load->view($this->layout, $loadedData, false);
        }
		
    }
	
	 function load_js($file=null)
    {
        if(is_array($file)){
            foreach($file as $f)
                $this->js[] = $f;
        }else $this->js[] = $file;
    }

    function js()
    {
        $stream = "";
		if ( isset($this->js) ) {
			foreach($this->js as $js)
				$stream .= '<script src="'.$this->js_base().$js.'" type="text/javascript"></script>' . "\n";
        }
        return $stream;
    }

    function load_css($file=null)
    {
        if(is_array($file)){
            foreach($file as $f)
                $this->css[] = $f;
        }else $this->css[] = $file;
    }

    function css()
    {
        $stream = "";
		if ( isset($this->css) ) {
			foreach($this->css as $css){
				$stream .= '<link href="'. $this->css_base() . $css .'" rel="stylesheet" type="text/css"/>' . "\n";
			}
		}

        return $stream;
    }
	
	function placeholder($key, $value=null){
        if($value==null)
            return $this->placeholder[$key];
        else
            $this->placeholder[$key] = $value;        
    }
	
	function js_base() {
		return base_url().'js/';
	}
	function css_base() {
		return base_url().'css/';
	}
	
	function set_mark($mark) {
		$this->mark  = $mark;
	}
	
	function mark() {
		return $this->mark;
	}

	
	
}
?>  

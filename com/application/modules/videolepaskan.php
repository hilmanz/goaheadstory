<?php
class videolepaskan extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		if(strip_tags($this->_g('page'))=='videolepaskan') $this->log('surf','videolepaskan');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/video-lepaskan.html');
	}
	
}
?>
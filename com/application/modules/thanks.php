<?php
class thanks extends App{
	
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);		
		$this->assign('locale', $LOCALE[1]);
		
	}
	
	function main(){
		if(strip_tags($this->_g('page'))=='thanks') $this->log('surf','thanks');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/thanks2.html');
	}
	
}
?>
<?php
class goahead_gallery_list {
	
	/*function __construct($apps=null){
		global $LOCALE,$CONFIG;
		
		$this->apps = $apps;
		$this->apps->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->apps->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->apps->assign('locale',$LOCALE[$this->apps->lid]);
		$this->apps->assign('user',$this->apps->user);
	}

	function main(){
		$articlelist = $this->apps->contentHelper->getArticleContent();
		
		$this->apps->assign('start',intval($this->apps->_request('start')));
		$this->apps->assign('cid',intval($this->apps->_request('cid')));
		
		$this->apps->assign('total',intval($articlelist['total']));
		$this->apps->assign('article',$articlelist['result']);
		return $this->apps->View->toString(TEMPLATE_DOMAIN_WEB ."widgets/goahead-gallery.html");
	}*/
	
	function __construct($apps=null){
		global $LOCALE,$CONFIG;
		
		$this->apps = $apps;
		$this->apps->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->apps->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->apps->assign('locale',$LOCALE[$this->apps->lid]);
		$this->apps->assign('user',$this->apps->user);
	}

	function main(){
		$aspiration = $this->apps->traviaHelper->aspirationAll();
	
		$this->apps->assign('start',intval($this->apps->_request('start')));
		$this->apps->assign('cid',intval($this->apps->_request('cid')));
		
		$this->apps->assign('total',intval($aspiration['total']));
		$this->apps->assign('aspiration',$aspiration['aspiration']);
		return $this->apps->View->toString(TEMPLATE_DOMAIN_WEB ."widgets/goahead-gallery.html");
	}
}
?>
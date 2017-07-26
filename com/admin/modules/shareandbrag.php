<?php
class shareandbrag extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		 
		$this->sharebragHelper = $this->useHelper('sharebragHelper');
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data);
		
		 
	}
	
	function main(){
				
		$sharebragList = $this->sharebragHelper->sharebragList($start=null,$limit=10);
		$time['time'] = '%H:%M:%S';
		// pr($sharebragList);
		$this->assign('total',intval($sharebragList['total']));
		$this->assign('list',$sharebragList['result']);
		$this->assign('resEvent',$sharebragList['resEvent']);
		$this->assign('time',$time);
		$this->assign('winner',intval($this->_p('winner')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','notification');
				
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','home');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/share-and-brag.html');		
	}
}
?>
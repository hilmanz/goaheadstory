<?php
class aspiration extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->aspirationHelper = $this->useHelper('aspirationHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	function main(){
		$userList = $this->aspirationHelper->userList($start=null,$limit=10);
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',intval($userList['total']));
		$this->assign('list',$userList['result']);
		$this->assign('time',$time);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->log('surf','list_user');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/aspiration-list.html');
	}
	
	function ajaxconfirmed()
	{
		
		$ajax = $this->aspirationHelper->ajax();
		// var_dump($ajax);
		
		if ($ajax){ 
			print json_encode(array('status'=>false));
		}else{ 
			print json_encode(array('status'=>true));
		}
		
		exit;
	}
	
}
?>
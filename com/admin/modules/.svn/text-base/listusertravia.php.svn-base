<?php
class listusertravia extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->usertraviaHelper = $this->useHelper('usertraviaHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	function main(){
	$start = $this->_g('start')-1;
	$limit =2;
	$no = $limit + $start;
	$next = $this->_g('start')+1;
	if(!$this->_g('start'))
	{
		$start = 0;
		$no =1;
	}
	
		$userList = $this->usertraviaHelper->userAll($start,$limit);
		
		$total_pages = ceil($userList['total']['total'] / 1);
	
		$time['time'] = '%H:%M:%S';
		$this->assign('total',$total_pages+1);
		$this->assign('list',$userList['result']);
		$this->assign('time',$time);
		$this->assign('no',$no);
		$this->assign('next',$next);
		$this->assign('start',$start);
		$this->assign('notiftype',intval($this->_p('notiftype')));
		$this->assign('publishedtype',intval($this->_p('publishedtype')));
		$this->assign('search',strip_tags($this->_p('search')));
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->assign('totalPage',$total_pages);
		
		$this->log('surf','list_user');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/list-user-travia.html');
	}
	
	function ajaxconfirmed()
	{
		
		$ajax = $this->listuserHelper->ajax();
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
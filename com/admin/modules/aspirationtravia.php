<?php
class aspirationtravia extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->aspirationtraviaHelper = $this->useHelper('aspirationtraviaHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	function main(){
		$start = $this->_g('start'); 
		$limit =2;
		   
		$offset=$start*$limit;
		
		$next = $this->_g('start')+1;
		if(!$this->_g('start'))
		{
			$start = 0;
			$no =1;
		}
		else
		{
		
			$no = $offset+1;
		}
	
	
		$userList = $this->aspirationtraviaHelper->aspirationAll($offset,$limit);
		
		$time['time'] = '%H:%M:%S';
		$total_pages = ceil($userList['total']['total'] / $limit);
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
		$this->log('surf','list_user');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/aspiration-travia-list.html');
	}
	function view(){

		
		
		if($this->_g('aspiratonid')=='')
		{sendRedirect(ADMIN_DOMAIN."aspirationtravia");exit;}
		$aspiration = $this->aspirationtraviaHelper->getAspirationid($this->_g('aspiratonid'));
		
		$this->assign('aspiration',$aspiration);
	
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/aspirationtraviaview.html');
	}
	function prosesupdate(){
		global $CONFIG;
		
		$text=$this->_p("aspirationartis");
		
		$images='';
		if($_FILES['aspirationImagesNew']['name']!='')
		{
			$path = $CONFIG['UPLOAD_ASSET'].'gallery/';
			$data = $this->uploadHelper->uploadThisFile($_FILES['aspirationImagesNew'],$path);
			$images=$CONFIG['UPLOAD_ASSET'].'gallery/'.$data['arrFile']['filename'];
			
			$imageswater=$CONFIG['UPLOAD_ASSET'].'gallery/logo2.jpg';
			$images = $this->uploadHelper->copymergeimages($images,$imageswater);
		}
		
		//$images = $this->uploadHelper->copymergetextimages($images,$text);
		$baground=$CONFIG['UPLOAD_ASSET'].'gallery/'.$data['arrFile']['filename'];
		$this->aspirationtraviaHelper->updateAspiration($images,$baground);
	
		sendRedirect($CONFIG['ADMIN_DOMAIN']."aspirationtravia");
		
		 return $this->out(TEMPLATE_DOMAIN_ADMIN . '/login_message.html');
	}
	function hapus(){
			global $CONFIG;
		$result = $this->aspirationtraviaHelper->deleteAspiration();
		if($result) {
			sendRedirect($CONFIG['ADMIN_DOMAIN']."aspirationtravia");
			exit;
		}
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
	function test(){
		global $CONFIG;
		//$data = $this->uploadHelper->uploadThisFile($_FILES['aspirationImagesNew'],$path);
		$images=$CONFIG['UPLOAD_ASSET'].'gallery/logo2.jpg';
		$imageswater=$CONFIG['UPLOAD_ASSET'].'gallery/laut.jpg';
		$this->uploadHelper->copymergeimages($images,$imageswater);
	}
}
?>
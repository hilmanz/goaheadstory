<?php 
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Mobile_Detect.php";
class usertraviaHelper {
	var $uid;
	var $osDetect;
	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->config = $CONFIG;
		$this->apps = $apps;
		if($this->apps->isUserOnline())  {
			if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
			// if(is_object($this->apps->page)) $this->pageid = intval($this->apps->page->id);
			
		}
		
		if(isset($_SESSION['lid'])) $this->lid = intval($_SESSION['lid']);
		else $this->lid = 1;
		if($this->lid=='')$this->lid=1;
		$this->server = intval($CONFIG['VIEW_ON']);
		$this->osDetect = new Mobile_Detect;
		
		$this->moderation = $CONFIG['MODERATION'];
		$this->dbshema = "gstory";
	}
	
	function checkuser($userEmail) {
			$sql="SELECT * FROM {$this->dbshema}.user WHERE user_email='$userEmail'";
			
			$qData = $this->apps->fetch($sql);
			if($qData) return $qData;
			else return false;
		}
	function userAll($start=0,$limit=10) {
		
			
			
			
			$search = strip_tags($this->apps->_p('search'));
			if($search)
			{
				$sql="SELECT * FROM {$this->dbshema}.user where user_name like '%{$search}%' or user_email like '%{$search}%'  limit $start,$limit";
		
				$qData['result'] = $this->apps->fetch($sql,1);
				
				$sql="SELECT count(*) as total FROM {$this->dbshema}.user  where user_name like '%{$search}%' or user_email like '%{$search}%'";
				
				$qData['total'] = $this->apps->fetch($sql);
			
			}
			else
			{	
				$sql="SELECT * FROM {$this->dbshema}.user limit $start,$limit";
			
				$qData['result'] = $this->apps->fetch($sql,1);
				
				$sql="SELECT count(*) as total FROM {$this->dbshema}.user ";
				
				$qData['total'] = $this->apps->fetch($sql);
			
			}
			
			
			if($qData) return $qData;
			else return false;
		}
	function checkUserTravia($userid) {
			$sql="SELECT * FROM {$this->dbshema}.user_travia WHERE user_id ='$userid'";
	
			$qData = $this->apps->fetch($sql,1);
			
			if($qData) return $qData;
			else return false;
		}
	function insertUser($email) {
			$userName='wahyu';
			$userEmail=$email;
			$userImages='';
			$userStatus='1';
			
			$sql="INSERT  INTO {$this->dbshema}.user (user_name,user_email,user_images,user_status) values('$userName','$userEmail','$userImages','$userStatus')";
			$this->apps->query($sql);
		}
	
}
?>
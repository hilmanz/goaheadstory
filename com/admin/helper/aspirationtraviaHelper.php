<?php 
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Mobile_Detect.php";
class aspirationtraviaHelper {
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
	

	function aspirationAll($start=null,$limit=10)
	{
	
		$search = strip_tags($this->apps->_p('search'));
			if($search)
			{
				if($this->apps->user->id=='226'||$this->apps->user->id=='218')
				{
					$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE  aspirasi_username like '%{$search}%' or aspirasi_user like '%{$search}%' and aspirasi_status!='4'  order by aspirasi_id limit $start,$limit ";
				}
				else
				{
					$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE  aspirasi_username like '%{$search}%' or aspirasi_user like '%{$search}%' and aspirasi_status!='4' and (artist_id = '{$this->apps->user->id}' or artist_id is null or artist_id ='' or artist_id ='0' ) order by aspirasi_id limit $start,$limit ";
				}
			$qData = $this->apps->fetch($sql,1);
				$offset = 0;
				if($this->apps->user->id=='226'||$this->apps->user->id=='218')
				{
					$sql = "SELECT count(*) total FROM {$this->dbshema}.aspirasi WHERE aspirasi_username like '%{$search}%' or aspirasi_user like '%{$search}%'  and aspirasi_status!='4' order by aspirasi_id limit $offset,10";
				
				}
				else
				{
					$sql = "SELECT count(*) total FROM {$this->dbshema}.aspirasi WHERE aspirasi_username like '%{$search}%' or aspirasi_user like '%{$search}%'  and aspirasi_status!='4'and (artist_id = '{$this->apps->user->id}' or artist_id is null or artist_id ='' or artist_id ='0' ) order by aspirasi_id limit $offset,10";
				
				}
				$total = $this->apps->fetch($sql);
				$result['total']= 	intval($total);
				$result['result'] = $qData;
			}
			else
			{
				if($this->apps->user->id=='226'||$this->apps->user->id=='218')
				{
					$sql="SELECT * FROM {$this->dbshema}.aspirasi where aspirasi_status!='4' order by aspirasi_id   limit $start,$limit ";
	 
				}
				else
				{
					$sql="SELECT * FROM {$this->dbshema}.aspirasi where aspirasi_status!='4' and (artist_id = '{$this->apps->user->id}' or artist_id is null or artist_id ='' or artist_id ='0' ) order by aspirasi_id   limit $start,$limit ";
	 
				}
				
				$qData = $this->apps->fetch($sql,1);
				$offset = 0;
				if($this->apps->user->id=='226'||$this->apps->user->id=='218')
				{		
					$sql = "SELECT count(*) total FROM {$this->dbshema}.aspirasi WHERE  aspirasi_status!='4' order by aspirasi_id limit $offset,10";
				
				}
				else
				{
				
					$sql = "SELECT count(*) total FROM {$this->dbshema}.aspirasi WHERE  aspirasi_status!='4' and (artist_id = '{$this->apps->user->id}' or artist_id is null or artist_id ='' or artist_id ='0' ) order by aspirasi_id limit $offset,10";
				
				}
				
				$total = $this->apps->fetch($sql);
			
				$result['total']= 	$total['total'];
				$result['result'] = $qData;
				
			}
		
			return $result;
	
	}
	function getAspiration($email)
	{
		$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE user_aspiration_email='{$email}'";
		$qData = $this->apps->fetch($sql);
		
		$result= $qData;
			return $result;
	
	}
	function getAspirationid($idAspiration)
	{
		$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE aspirasi_id='{$idAspiration}'";
		$qData = $this->apps->fetch($sql);
		
		$result= $qData;
			return $result;
	
	}
	
	function setSession(){
	//global $logger,$CONFIG;
		$rs['email']=$this->apps->_g('email');
		
			$this->apps->session->setSession($this->config['SESSION_NAME'],"test",$rs);
	
	}
	function getSession(){
	//global $logger,$CONFIG;
		return $this->apps->session->getSession($this->config['SESSION_NAME'],"test");
	
	}
	
	function updateAspiration($images,$baground){
	
		$aspiration_id = $this->apps->_p("aspirationId");
		$uasername = $this->apps->_p("aspirationusername");
		if($images==''){
			$gambaraspirasiartist = $this->apps->_p("gambaraspirasiartist");
		
		}
		else
		{
			$gambaraspirasiartist = $images;
			
		}
		
		//$aspiration = $this->apps->_p("aspiration");
		$aspiration_status = $this->apps->_p("aspirasistatus");
		$aspirationartis = $this->apps->_p("aspirationartis");
		$hastags ='';
		if(preg_match("/#goahead_rasakan/", $aspirationartis))
		{
			$hastags ='#goahead_rasakan';
		
		}
		if(preg_match("/#goahead_lepaskan/", $aspirationartis))
		{
		
				$hastags ='#goahead_lepaskan';
			
		}
		
		if($hastags=='0')
		{
			$hastags ='';
		}
		
		if($gambaraspirasiartist!='')
		{
			$aspiration_status='3';
		}
		else
		{
			$aspiration_status=$this->apps->_p("aspirasistatus");
		}
		if($this->apps->_p("artisId"))
		{
			$artist_id = $this->apps->_p("artisId");
		}
		else
		{
			if($this->apps->user->id=='226'||$this->apps->user->id=='218' )
			{
				$artist_id ='';
			}
			else
			{
				$artist_id = $this->apps->user->id;
			}
		}
		$data['status']=0;
		$sql=" 
				UPDATE {$this->dbshema}.aspirasi SET 
				
				username='{$uasername}',
				artist_id='{$this->apps->user->id}',
				username_artist='{$this->apps->user->nickname}',
				aspirasi_artist='{$aspirationartis}',
				gambar_aspirasi_artist='{$gambaraspirasiartist}',
				hastags_artist='{$hastags}',
				aspirasi_status ='{$aspiration_status}' 
				where aspirasi_id='{$aspiration_id}'";

		if($this->apps->query($sql))
			{
						$data['status']=1;
						$data['msg'] = 'anda berhasil mengisi Aspiration';
			}
		else
			{
				$data['status']=0;
				$data['msg'] = 'proses gagal coba ulangi lagi';
			
			}
			
	}
	function deleteAspiration(){
		$cid = $this->apps->_request("id");
		
		
		$data['status']=0;
		$sql=" 
			UPDATE {$this->dbshema}.user_aspiration SET user_aspiration_status='3' where user_aspiration_id='$cid '";
		
		if($this->apps->query($sql))
			{
						$data['status']=1;
						$data['msg'] = 'anda berhasil mengisi Aspiration';
			}
		else
			{
				$data['status']=0;
				$data['msg'] = 'proses gagal coba ulangi lagi';
			
			}
		return $data;
	}
	function countAspirationUser()
	{
	
		$sql = "
						SELECT count(*) total 
						FROM {$this->dbshema}.aspiration_view ";
			
				$qData = $this->apps->fetch($sql);
		return $qData['total'];
	}
}
?>
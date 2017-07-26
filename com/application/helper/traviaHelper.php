<?php 
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Mobile_Detect.php";
class traviaHelper {
	var $uid;
	var $osDetect;
	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->config = $CONFIG;
		$this->apps = $apps;
		if($this->apps->isUserOnline())  {
			if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
		
		}
		
		if(isset($_SESSION['lid'])) $this->lid = intval($_SESSION['lid']);
		else $this->lid = 1;
		if($this->lid=='')$this->lid=1;
		$this->server = intval($CONFIG['VIEW_ON']);
		$this->osDetect = new Mobile_Detect;
		
		$this->moderation = $CONFIG['MODERATION'];
		$this->dbshema = "gstory";
	}
	
	function checkuser($user_id) {
			$sql="SELECT * FROM {$this->dbshema}.user WHERE user_id_goahead='$user_id'";
			
			$qData = $this->apps->fetch($sql);
		
			if($qData) return $qData;
			else return false;
		}
	function checkUserTravia($userid) {
			$sql="SELECT * FROM {$this->dbshema}.user_travia WHERE user_id ='$userid' and user_travia_status='1'";
	
			$qData = $this->apps->fetch($sql);
			
			if($qData) return $qData;
			else return false;
		}
	function insertUser($re) {
			$userName=$re['username'];
			$userEmail=$re['userid'];
			$userImages='';
			$userStatus='1';
			
			$sql="INSERT  INTO {$this->dbshema}.user (user_name,user_id_goahead,user_images,user_status) values('$userName','$userEmail','$userImages','$userStatus')";
			$this->apps->query($sql);
		}
	
	function result($persentase,$kode) {
			$sql="SELECT * FROM {$this->dbshema}.travia_result WHERE persentase ='$persentase'  AND  kode='$kode'";
		
			$qData = $this->apps->fetch($sql);
			if($qData) return $qData;
			else return false;
		}
	
	function aspirationAll($winner='',$start='',$limit='')
	{
		$srch = '';
		if($this->apps->_p("srch"))
		{
			$username = $this->apps->_p("srch");
			
			if($username!='')
			{
				$panjang = strlen($username);
				if($panjang>=3)
				{
					$srch = "and username like '%{$username}%'";
				}
			}
		}
		if($limit=='')
		{
			$limit='';
		}else
		{
			if($start!='')
			{
				$limit='limit '.$start.','.$limit;
			}
			else
			{
				$limit='limit '.$limit;
			}
		}	
		if($winner=='ok')
		{
			
			$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE aspirasi_status='3' {$srch}   order by aspirasi_id DESC {$limit}";
			
			$sqlcount = "SELECT count(*) total FROM {$this->dbshema}.aspirasi WHERE aspirasi_status='3' {$srch}";
		}
		else
		{
			$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE aspirasi_status!='4'{$srch}  order by aspirasi_id DESC {$limit}"; 
			
			$sqlcount = "SELECT count(*) total FROM {$this->dbshema}.aspirasi WHERE aspirasi_status!='4' {$srch}";
			
		}
		
		$qData = $this->apps->fetch($sql,1);
		$total = $this->apps->fetch($sqlcount);
		$result['total']= 	$total;
		$result['aspiration'] = $qData;
			return $result;
	
	}
	function getAspiration($email)
	{
		$sql="SELECT * FROM {$this->dbshema}.user_aspiration WHERE user_aspiration_email='{$email}'";
		$qData = $this->apps->fetch($sql);
		
		$result= $qData;
			return $result;
	
	}
	function gettraviafullinerId($traviaId)
	{
		$sql="SELECT * FROM {$this->dbshema}.travia
				inner join user on travia.user_id =user.user_id
				inner join travia_result on travia.result_id =travia_result.resut_id
		WHERE travia.travia_id='{$traviaId}'";
		
		$qData = $this->apps->fetch($sql);
		
		$result= $qData;
			return $result;
	
	}
	function getTravia($email)
	{
		$sql="SELECT * FROM {$this->dbshema}.travia
				inner join user on travia.user_id =user.user_id
				inner join travia_result on travia.result_id =travia_result.resut_id
		WHERE user.user_email='{$email}'";
		pr($sql);
		$qData = $this->apps->fetch($sql);
		
		$result= $qData;
			return $result;
	
	}
	function getAspirationTag($hastags)
	{
		$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE hastags like '%{$hastags}%' and aspirasi_status='3' limit 5";
		
		$qData = $this->apps->fetch($sql,1);
		
		$result= $qData;
			return $result;
	
	}
	function getAspirationTag2($hastags)
	{
		$sql="SELECT * FROM {$this->dbshema}.aspirasi WHERE hastags like '%{$hastags}%' and aspirasi_status='3' limit 5";
		pr($sql);
		$qData = $this->apps->fetch($sql,1);
		
		$result= $qData;
			return $result;
	
	}
	function insertImageTravia($userID){
	
		$imagesid = '';
		$KodeE = 0;
		$KodeL =0;
		$jumlahGambar = count($_POST['imgTravia']);
		$i=0;
		foreach($_POST['imgTravia'] as $imgid)
				{
					
					$i++;
					if($i==1)
					{
						$imagesid .=$imgid['imagesId'];
					}
					else
					{
						$imagesid .=','.$imgid['imagesId'];
					}
					if($imgid['Kode']=='E')
					{
						$KodeE=$KodeE+1;
					}
					else
					{
						$KodeL=$KodeL+1;
					}
				}
			$sql = "INSERT INTO {$this->dbshema}.user_travia (images_id, user_id,count_E,count_L,user_travia_status) 
					VALUES ('{$imagesid}', '{$userID}', '{$KodeE}','{$KodeL}','1')";
					$res = $this->apps->query($sql);
	}
	function addLike(){
		
		$cid = intval($this->apps->_p("cid"));
		$counLike = intval($this->apps->_p("cLike") +1 );
		$data['status']=0;
		if($cid==0) return $data;
		$sql = "
		SELECT count(*) total 
		FROM {$this->dbshema}.aspiration_view
		WHERE user_email='wahyu_bunyu_jogja@yahoo.co.id' AND user_aspiration_id={$cid} LIMIT 1";
		
		$qData = $this->apps->fetch($sql);
		
		if($qData['total']>0) return $data;	
		
		$sql=" 
				INSERT INTO 
				{$this->dbshema}.aspiration_view 	(user_email ,	user_aspiration_id 	,aspiration_view_date, aspiration_view_status  ) 
				VALUES ('wahyu_bunyu_jogja@yahoo.co.id',{$cid},NOW(),1)
				";
		
		
		
		if($this->apps->query($sql))
		{
				$sql=" 
				UPDATE {$this->dbshema}.user_aspiration SET user_aspiration_like='$counLike' where user_aspiration_id='$cid '
				";
				$this->apps->query($sql);
			$data['status']=1;
			$data['counLike']=$counLike;
			return $data;
		}
		else
		{
			$data['status']=0;
			
			return $data;
		}
	}
	
	
	function addView(){
		
		$cid = intval($this->apps->_p("cid"));
		$counView = intval($this->apps->_p("cview") +1 );
		
		if($cid==0) return false;
		
		
		
		$sql=" 
			UPDATE {$this->dbshema}.user_aspiration SET user_aspiration_view='$counView' where user_aspiration_id='$cid '
			";
		
		if($this->apps->query($sql))
		{
			$sql = "
			SELECT *
			FROM {$this->dbshema}.user_aspiration
			WHERE  user_aspiration_id={$cid} LIMIT 1";
			
			$qData = $this->apps->fetch($sql);
			$qData['status']=1;
			$qData['counView']=$counView;
			return $qData;
		}
		else
		{
			return false;
		}
	}
	function setSession(){
		$rs['email']=$this->apps->_g('email');
		
			$this->apps->session->setSession($this->config['SESSION_NAME'],"test",$rs);
	
	}
	function getSession(){
			return $this->apps->session->getSession($this->config['SESSION_NAME'],"test");
	
	}
	function addComent(){
		
		$cid = intval($this->apps->_p("cid"));
		$cComent = intval($this->apps->_p("cComent") +1 );
		$Coment = $aspirasi= mysql_real_escape_string($this->apps->_p("Coment"));
		
		if($cid==0) return false;
		
		$sql=" 
				INSERT INTO 
				{$this->dbshema}user_aspiration_comment 	(user_aspiration_id  ,user_aspiration_email,user_aspiration_comment,user_aspiration_comment_date, user_aspiration_comment_status  ) 
				VALUES ({$cid},'wahyu_bunyu_jogja@yahoo.co.id',{$Coment},NOW(),1)
				";
		
		
		
		if($this->apps->query($sql))
		{
				$sql=" 
				UPDATE {$this->dbshema}user_aspiration SET user_aspiration_comment='$cComent' where user_aspiration_id='$cid '
				";
				$this->apps->query($sql);
			return true;
		}
		else
		{
			return false;
		}
	}
	function  commentar (){
			$cid = intval($this->apps->_p("cid"));
			$qData['status']=1;
			$sql = "
								SELECT *,DATE_FORMAT(aspiration_comment.aspiration_comment_date, '%d %M %Y')as aspiration_comment_date2
								FROM {$this->dbshema}.aspiration_comment inner join user on aspiration_comment.user_id = user.user_id
								WHERE  aspiration_comment.user_aspiration_id={$cid} order by aspiration_comment.aspiration_comment_id DESC";
			
			$Data= $this->apps->fetch($sql,1);
			
			if($Data)
			{
					$qData['status']=1;
					$qData['query']=$Data;
					return $qData;	
			
			}
			else
			{
				$qData['status']=0;
				return $qData;		
			}
	}
	function countGalery($user)
	{
		$cid = intval($this->apps->_p("cid"));
		$count = intval($this->apps->_p("cCount") +1 );
		//$sSession = $this->apps->session->getSession($this->config['SESSION_NAME'],"ahead");
		
		$sSession = $user;
		
		$data['status']=0;
		if($cid==0) return $data;
		
		$caption = $this->apps->_p("caption");
		if($caption == 'like')
			{
				
				if($sSession['user_id_goahead'] =='')
				{
					$data['msg'] = 'anda harus login dulu';
					return $data;
				}
				$sql = "
						SELECT count(*) total 
						FROM {$this->dbshema}.aspiration_view
						WHERE user_email='{$sSession['user_name']}' AND user_aspiration_id={$cid} LIMIT 1";
				$qData = $this->apps->fetch($sql);
				
				$data['msg'] = 'anda sudah pernah mengklik content ini';
				if($qData['total']>0) return $data;	
				$sql=" 
						INSERT INTO 
						{$this->dbshema}.aspiration_view 	(user_email ,	user_aspiration_id 	,aspiration_view_date, aspiration_view_status  ) 
						VALUES ('{$sSession['user_name']}',{$cid},NOW(),1)";
					
				if($this->apps->query($sql))
					{
							$sql=" 
									UPDATE {$this->dbshema}.aspirasi SET aspirasi_like=aspirasi_like+1 where aspirasi_id='$cid '";
									$this->apps->query($sql);
							$sql = "
								SELECT *
								FROM {$this->dbshema}.aspirasi
								WHERE  aspirasi_id={$cid} LIMIT 1";
						
							$data = $this->apps->fetch($sql);
							
							$data['status']=1;
							$data['cCount']=$data['aspirasi_like'];
							$data['msg'] = 'anda berhasil menyukai content ini';
							return $data;
					}
				else
					{
						$data['msg'] = 'gagal coba ulangi lagi';
						return $data;
					}
			}
		else if($caption == 'view')
			{
				$sql=" 
						UPDATE {$this->dbshema}.aspirasi SET aspirasi_view=aspirasi_view+1 where aspirasi_id='$cid '";
		
				if($this->apps->query($sql))
					{
						$sql = "
								SELECT *
								FROM {$this->dbshema}.aspirasi
								WHERE  aspirasi_id={$cid} LIMIT 1";
						
						$data = $this->apps->fetch($sql);
						$sql = "
						SELECT count(*) total 
						FROM {$this->dbshema}.aspiration_view
						WHERE user_email='{$sSession['user_name']}' AND user_aspiration_id={$cid} LIMIT 1";
						$qData = $this->apps->fetch($sql);
						if($qData['total']>0)
						{
							$data['statusLike']=1;
						}
						else
						{
							$data['statusLike']=0;
						
						}
						$data['status']=1;
						$data['cCount']=$data['aspirasi_view'];
						$data['msg'] = 'anda akan melihat content';
						return $data;
					}
				else
					{
						$data['msg'] = 'proses gagal coba ulangi lagi';
						return $data;
					}
			
			}
		else if($caption == 'comment')
			{
				$Coment = mysql_real_escape_string($this->apps->_p("Coment"));
				$sql=" 
						INSERT INTO 
						{$this->dbshema}.aspiration_comment 	(user_aspiration_id  ,user_email,aspiration_comment,aspiration_comment_date, aspiration_comment_status,	user_id ) 
						VALUES ({$cid},'{$sSession['user_name']}','{$Coment}',NOW(),1,'{$sSession['user_id']}')";
		
				
		
				if($this->apps->query($sql))
					{
							$sql = "
								SELECT *
								FROM {$this->dbshema}.aspirasi
								WHERE  aspirasi_id={$cid} LIMIT 1";
							$dataComen = $this->apps->fetch($sql);
							$countComen = intval($dataComen['aspirasi_comment']);
							$count = intval($countComen +1);
							$sql=" 
									UPDATE {$this->dbshema}.aspirasi SET aspirasi_comment='{$count}' where aspirasi_id='$cid '";
							$this->apps->query($sql);
							$sql = "
								SELECT *,DATE_FORMAT(aspiration_comment.aspiration_comment_date, '%d %M %Y')as aspiration_comment_date2
								FROM {$this->dbshema}.aspiration_comment inner join user on aspiration_comment.user_id = user.user_id
								WHERE  aspiration_comment.user_aspiration_id={$cid} order by aspiration_comment.aspiration_comment_id DESC ";
			
							$qData= $this->apps->fetch($sql,1);
							$data['query']=$qData;
							$data['status']=1;
							$data['cCount']=$count;
							$data['msg'] = 'anda berhasil mengisi comentar';
							return $data;
					}
				else
					{
							$data['msg'] = 'proses gagal coba ulangi lagi';
							return $data;
					}
			
			}
		
	}
	/*function insertAspiration($pathImages='',$email='',$aspirationTravia='',$baground='',$userid='',$resultid=''){
		if($pathImages)
		{
			
			$email =$email;
			$images = $pathImages;
			$aspirationTravia=$aspirationTravia;
			$baground=$baground;
			
		}
		else
		{
		
			$email = $this->apps->_p("email");
			$images = $this->apps->_p("images");
			$aspirationTravia=$aspirationTravia;
		}
		
		$date = date('Y-m-d H:i:s');
		$status=1;
		$data['status']=0;
		$sql=" INSERT INTO 
				{$this->dbshema}.user_aspiration 	
				(user_id,result_id,user_aspiration_email,user_aspiration_images_travia_bagorund,user_aspiration_images_travia,aspiration_travia,user_aspiration_status,user_aspiration_date ) 
				VALUES ('{$userid}','{$resultid}','{$email}','{$baground}','{$images}','{$aspirationTravia}',1,'{$date}')";
		if($this->apps->query($sql))
			{
						$data['status']=1;
						$data['msg'] = 'anda berhasil mengisi comentar';
			}
		else
			{
				$data['status']=0;
				$data['msg'] = 'proses gagal coba ulangi lagi';
			
			}
		return $data;
	}*/
	function insertTravia($pathImages='',$baground='',$userid='',$resultid='',$usertraviaid=''){
			
			
			$images = $pathImages;
		
			$baground=$baground;
			
		
		$date = date('Y-m-d H:i:s');
		$status=1;
		$data['status']=0;
		$sql=" INSERT INTO 
				{$this->dbshema}.travia	
				(user_id,user_travia_id,travia_images,travia_baground,result_id,travia_date,travia_status) 
				VALUES ('{$userid}','{$usertraviaid}','{$images}','{$baground}','{$resultid}','{$date}','1')";
		if($this->apps->query($sql))
			{
						$data['idtravia']= mysql_insert_id();
						$data['status']=1;
						$data['msg'] = 'anda berhasil mengisi comentar';
			}
		else
			{
				$data['status']=0;
				$data['msg'] = 'proses gagal coba ulangi lagi';
			
			}
		return $data;
	}
	function insertAspiration($user){
		
		$date = date('Y-m-d H:i:s');
		$userid=$user['user_id'];
		$user_name=$user['user_name'];
		$aspirasi=  mb_convert_encoding($this->apps->_p("aspiration"), 'UTF-8');
		$aspirasi= str_replace('Atilde;','',$aspirasi);
		$aspirasi= mysql_real_escape_string($aspirasi);
		$hastags= $this->apps->_p("hastag");
		$data['status']=0;
			$sqlCheck = "
					SELECT *
					FROM {$this->dbshema}.aspirasi
					WHERE  aspirasi_user='{$aspirasi}' and user_id='{$userid}'"; 
			
			if($this->apps->query($sqlCheck))
			{
				$data['status']=1;
				$data['msg'] = 'anda berhasil mengisi aspirasi';
				return $data;
			}
		$sql=" INSERT INTO 
				{$this->dbshema}.aspirasi	
				(user_id,username,aspirasi_user,hastags,aspirasi_date,aspirasi_status) 
				VALUES ('{$userid}','{$user_name}','{$aspirasi}','{$hastags}','{$date}','1')";
		
		if($this->apps->query($sql))
			{
					$data['status']=1;
						$data['msg'] = 'anda berhasil mengisi aspirasi';
			}
		else
			{
				$data['status']=0;
				$data['msg'] = 'proses gagal coba ulangi lagi';
			
			}
		return $data;
	}
	function updateUserTravia($userid){
			$sql=" 
					UPDATE {$this->dbshema}.user_travia SET user_travia_status='0' where user_id='$userid'";
			$this->apps->query($sql);	
		
	}
	function updateAspiration($email='')
	{
		$data['status']=0;
			$data['msg'] = 'proses gagal coba ulangi lagi';
		if($this->apps->_p("aspiration"))
			{
				$aspiration = $this->apps->_p("aspiration");
				$hastags = $this->apps->_p("hastag");
				$status = '1';
				$sql=" 
					UPDATE {$this->dbshema}.user_aspiration SET user_aspiration='$aspiration',hastags_user_aspiration='$hastags' where user_aspiration_email='$email'";
				
				if($this->apps->query($sql))
					{
								$data['status']=1;
								$data['msg'] = 'anda berhasil mengisi aspiration';
					}
				else
					{
						$data['status']=0;
						$data['msg'] = 'proses gagal coba ulangi lagi';
					
					}
			}
		else
			{
				
				$sql=" 
					UPDATE {$this->dbshema}.user_aspiration SET user_aspiration_status='2' where user_aspiration_email='$email'";
				$this->apps->query($sql);
				if($this->apps->query($sql))
					{
								$data['status']=1;
								$data['msg'] = 'anda berhasil menyimpan myartwork';
					}
				else
					{
						$data['status']=0;
						$data['msg'] = 'proses gagal coba ulangi lagi';
					
					}
			}
		return $data;
	}
	function saveMyart()
	{
			$data['status']=0;
			$data['msg'] = 'proses gagal coba ulangi lagi';
		if($this->apps->_p("traviaid"))
			{
				$traviaid = $this->apps->_p("traviaid");
				$sqltrv = "
								SELECT *
								FROM {$this->dbshema}.travia
								WHERE  travia_id='{$traviaid}' and  travia_status='1'  LIMIT 1";
				
				if($this->apps->fetch($sqltrv))
				{
					$data['status']=0;
					$data['msg'] = 'artwork travia tidak di temukan';    
					return $data;
				}
				$sql=" 
					UPDATE {$this->dbshema}.travia SET travia_status='2' where travia_id='$traviaid'";
				
				if($this->apps->query($sql))
					{
								$data['status']=1;
								$data['msg'] = 'anda berhasil save  travia';
					}
				else
					{
						$data['status']=0;
						$data['msg'] = 'proses gagal coba ulangi lagi';
						return $data;
					}
			}
		
		return $data;
	}
	function saveImageUser()
	{
				$userId = $this->apps->_p("uid");
				$images = $this->apps->_p("uimage");
				if($images=='https://www.goaheadpeople.com/')
				{
					$images='https://www.goaheadpeople.com/asset_public/images/img_default.png';
				}
				$sql=" 
					UPDATE {$this->dbshema}.user SET user_images='$images' where user_id='$userId'";
			
				if($this->apps->query($sql))
					{
								$data['status']=1;
								$data['msg'] = 'anda berhasil save  travia';
								return $data;
					}
				else
					{
						$data['status']=0;
						$data['msg'] = 'proses gagal coba ulangi lagi';
						return $data;
					}
	}
}
?>
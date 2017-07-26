<?php
class goahead extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		
		$this->traviaHelper = $this->useHelper('traviaHelper');
		$this->aspirationHelper = $this->useHelper('aspirationHelper');
		$this->usertraviaHelper = $this->useHelper('usertraviaHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('keywords', strip_tags($this->_p('q')));
	}
	
	function main(){

		$this->assign('main', 'default');
		if(!$this->getUsetSession()) {
			echo "anda mesti login  dulu";die;
		}
		
		$gorasakan = $this->traviaHelper->getAspirationTag('#goahead_rasakan');
		$golepaskan = $this->traviaHelper->getAspirationTag('#goahead_lepaskan');
		$aspiration = array();
		
		for($i=0;$i<=5;$i++)
		{
		
			if(isset($gorasakan[$i]['aspirasi_user']) && isset($golepaskan[$i]['aspirasi_user']))
			{
				if(isset($gorasakan[$i]['aspirasi_user']))
				{
					$aspiration[$i][] = array("aspiration"=>$gorasakan[$i]['aspirasi_user'],
															"username"=>$gorasakan[$i]['username'],
															"gambar"=>$gorasakan[$i]['gambar_aspirasi_artist']
															);
				}
				else
				{
					$aspiration[$i][] = array("aspiration"=>'',
															"username"=>'',
															"gambar"=>''
															);
				}
				if($golepaskan[$i]['aspirasi_user'])
				{
					$aspiration[$i][] = array("aspiration"=>$golepaskan[$i]['aspirasi_user'],
												"username"=>$golepaskan[$i]['username'],
												"gambar"=>$golepaskan[$i]['gambar_aspirasi_artist'],
					
															);
				}
				else
				{
					$aspiration[$i][] = array("aspiration"=>'',
												"username"=>'',
												"gambar"=>''
											);
				}
			}
		}
		//pr($aspiration);die;
		$this->View->assign('aspiration',$aspiration);
		//$this->View->assign('aspiration',$aspiration['aspiration']);
		$arraynih =array('0','1','2','3','4','5','6');
		
		
		
		
		
		$re = $this->getUsetSession();
		
		if(!isset($re['userid']))  
		{
			sendRedirect("https://{$_SERVER['HTTP_HOST']}");exit;
		}
		$userGmbr='';
		if(!$this->traviaHelper->checkuser($re['userid']))
			{
				
				$this->traviaHelper->insertUser($re);
				$userGmbr=$this->traviaHelper->checkuser($re['userid']);
			}
		else
			{
					$userGmbr=$this->traviaHelper->checkuser($re['userid']);
			
			}
		if($userGmbr['user_images'])
		{
			$imgStatus ='1';
		}
		else
		{
				$imgStatus ='0';
		}
		//$sSession = $this->getUsetSession();
		$this->assign('imgStatus',@$imgStatus);
		$this->assign('imgStatus',@$imgStatus);
		$this->assign('session',@$re['username']);
		$this->assign('arraynih',@$arraynih);
		$this->View->assign('registerid',@$re['registerid']);   
		$this->View->assign('userid',@$userGmbr['user_id']);   		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/home.html');
		
		
	}
	function saveImageUser(){

			$data = $this->traviaHelper->saveImageUser();
			print json_encode($data);exit;
	}
	function getUsetSession()
	{
		global $CONFIG,$logger;
		
		/*
		$cisession = @$_COOKIE['ci_session'];
		$sessioncookie = array();
		if(!$cisession){
			return array(
						'status'=>false,
						'msg'=>'your cookie not found', 
						'sessionid'=>-1
						);
		}
		$serial = preg_replace('/\\\"/i','"',$cisession);
		if($serial)	$sessioncookie = unserialize($serial);
		if(array_key_exists('user_id',$sessioncookie)) $userid= $sessioncookie['user_id'];
		if(array_key_exists('registrationid',$sessioncookie)) $registerid= $sessioncookie['registrationid'];
		if(array_key_exists('username',$sessioncookie)) $username= $sessioncookie['username'];
		*/
		
		/* check ci session on session , hahhaha.. ini uda di pasang skrg yu.. aman2.. bye bummi 
		pr($_SESSION);
		Array
			(
				[user_id] => 4589
				[session_id] => 1F9F1FD5-CCFA-4448-BA1D-313A45EE28B77E97-8658-4824
				[user_name] => Bummi D Putera
			)
		pr($cisession); 
		*/
		$cisession = @$_SESSION['session_id'];
		if(!$cisession){
			return array(
						'status'=>false,
						'msg'=>'your cookie not found', 
						'sessionid'=>-1
						);
		}
		
		$userid = @$_SESSION['user_id'];
		if(@$_SESSION['registrationid'])
		{
				$registerid = @$_SESSION['registrationid'];
		
		}
		else
		{
				$registerid = @$_SESSION['session_id'];
		
		}
	
		$username = @$_SESSION['user_name'];
		
		if(! $userid) {
		 
		
			return array(
						'status'=>false,
						'msg'=>'your session userid not found', 
						'sessionid'=>-1
						);
			}
		if(! $registerid) {	
			
				return array(
						'status'=>false,
						'msg'=>'your session registerid not found', 
						'sessionid'=>-1
						);
		}				
	 
			$encrypteddata = urlencode64(serialize(array(
			'status'=>true,
			'msg'=>'logged in',
			'userid'=>$userid,	 
			'registerid'=>$registerid,
			'username'=>$username
			)));
			
			$base64 = urldecode64($encrypteddata);
			$content = unserialize($base64);
		// pr($content);die;
			return $content;
			
			
			 
			
	}
	function termCondition(){
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/terms.html');
		
		
	}
	function artist(){
	$this->assign('main', 'artist');
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/artist.html');
		
		
	}
	function gallery(){
	global $CONFIG;
		$sSession = $this->getUsetSession();
		if(@$sSession['userid']=='')
		{
			sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
		}
		$limit=16;
		$aspiration = $this->traviaHelper->aspirationAll('','',$limit);
		$total_pages = ceil($aspiration['total']['total'] / $limit);
		$this->assign('totalpage',$total_pages);
		$this->assign('aspiration',$aspiration['aspiration']);
		$this->View->assign('registerid',$sSession['registerid']);
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/gallery.html');
		
		
	}
	function getAspiration(){
		if(!$this->_p('start'))
		{
			$start = 0;
			
		}
		else
		{
			$start = $this->_p('start');
		}
		$limit=16;
		$offset=$start*$limit;
		$winner='';
		if($this->_p('winner'))
		{
			$winner='ok';
		}
		$limit =16;
		$data = $this->traviaHelper->aspirationAll($winner,$offset,$limit);
		
		$total_pages = ceil($data['total']['total'] / $limit);
		$data['start'] = $start;
		$data['totalpage'] = $total_pages;
	
		print json_encode($data);exit;
	}
	function winner(){
		$sSession = $this->getUsetSession();
		if($sSession['userid']=='')
		{
			sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
		}
		$limit=8;
		$aspiration = $this->traviaHelper->aspirationAll($winner='ok',$limit);
		$total_pages = ceil($aspiration['total']['total'] / $limit);
		$this->assign('totalpage',$total_pages);
		$this->assign('aspiration',$aspiration['aspiration']);
		$this->View->assign('registerid',$sSession['registerid']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/winner.html');
		
		
	}
	function join(){
	$data['status'] = 0;
	
		if($this->session->getSession($this->config['SESSION_NAME'],"ahead")!='')
		{
			$sSession = $this->session->getSession($this->config['SESSION_NAME'],"ahead");
			
			if($sSession->email=='')
			{
				$data['status'] = 0;	
						print json_encode($data);exit;
				
			}
			if($this->traviaHelper->checkuser($sSession->email))
			{
				
				$user = $this->traviaHelper->checkuser($sSession->email);
			
				if($user=='') 
				{
						$data['status'] = 0;	
						print json_encode($data);exit;
				}
				
			
			}
			else
			{
				$this->traviaHelper->insertUser($sSession->email);
			}
			$data['status'] = 1;
			print json_encode($data);exit;
		}
		else
		{
			$data['status'] = 0;	
			print json_encode($data);exit;
		}
	}
	function submitImg()
	{
			
			if(isset($_POST['imgTravia']))
			{
					$re = $this->getUsetSession();
					
					$data['status']=0;
					
					if($re['userid']=='') 
					{
						$data['status']=2;
						
						print json_encode($data);exit;
					}
					
					$checkUser = $this->traviaHelper->checkuser($re['userid']);
					
					if(!$checkUser)
					{
						$data['status']=2;
						print json_encode($data);exit;
					}
					
				/*	if(!$this->traviaHelper->checkUserTravia($checkUser['user_id']))
					{*/
					
						
						$this->traviaHelper->insertImageTravia($checkUser['user_id']);
						$data['status']=1;
					
						print json_encode($data);exit;
				/*	}
					else
					{
					pr('aa');die;
					$data['status']=0;
						print json_encode($data);exit;
					
					}*/
				
			}
			else
			{
				$data['status']=2;
				print json_encode($data);exit;
			}
	}
	/*function result(){
		global $CONFIG;
		
		$this->View->assign('main','aspiration');
		$sSession = $this->session->getSession($this->config['SESSION_NAME'],"ahead");
		if($sSession->email=='')
		{
			sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
		}
		$bagrnd = array ('gallery/laut.jpg','gallery/trivia-result.jpg'); 
		$bagrndRandom  =$bagrnd[array_rand($bagrnd,1)];
		$aspiration = $this->traviaHelper->getAspiration($sSession->email);
		$user = $this->traviaHelper->checkuser($sSession->email);
		
			$userid=$user['user_id'];
			$user = $this->traviaHelper->checkUserTravia($userid);
			
			if($user=='')
				{
					sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
				}
				if($user['count_E'] > $user['count_L'])
				{
					$persentase = $user['count_E'] / 5 *100;
					if($persentase < 80)
					{
						$persentase = '<80';
						$kode = 'E';
					}
					else
					{
						$persentase = '>80';
						$kode = 'E';
					}
					
				}
				else
				{
					$persentase = $user['count_L'] / 5 *100;
					if($persentase < 80)
					{
						$persentase = '<80';
						$kode = 'L';
					}
					else
					{
						$persentase = '>80';
						$kode = 'L';
					}
					
				}
			
			$result = $this->traviaHelper->result($persentase,$kode);
			$watermark = $result['Deskripsi'];
			$title = $result['title'];
		
		
		
		if($aspiration)
		{
			
			$this->View->assign('images',$aspiration['user_aspiration_images_travia']);
			$this->View->assign('aspiration',$aspiration['user_aspiration']);
			$this->View->assign('travia',$watermark);
			$this->View->assign('traviaTitel',$title);
			$this->View->assign('status',$aspiration['user_aspiration_status']);
			$this->View->assign('baground',$aspiration['user_aspiration_images_travia_bagorund']);
			
		}
		else
		{
			
			$imagesResult = $this->uploadHelper->copymergetextimages($bagrndRandom,$watermark,$title);
			$this->View->assign('images',$imagesResult);
			$this->View->assign('aspiration','');
			$this->View->assign('travia',$watermark);
			$this->View->assign('traviaTitel',$title);
			$this->View->assign('status','0');
			$this->View->assign('baground',$bagrndRandom);
			
			$data = $this->traviaHelper->insertAspiration($imagesResult,$sSession->email,$watermark,$bagrndRandom,$userid,$result['resut_id']);
		
		}
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/trivia-result.html');
		
	}*/
	
	function result(){
		global $CONFIG;
		
		$this->View->assign('main','aspiration');
		$sSession = $this->getUsetSession();
		if($sSession['userid']=='')
		{
			sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
		}
		$user = $this->traviaHelper->checkuser($sSession['userid']);
		$userid=$user['user_id'];
		//cari user travia yang baru
		
		$usertravia = $this->traviaHelper->checkUserTravia($userid);
			
			if($usertravia=='')
				{
					sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
				}
				if($usertravia['count_E'] > $usertravia['count_L'])
				{
					$persentase = $usertravia['count_E'] / 5 *100;
					if($persentase < 80)
					{
						$persentase = '<80';
						$kode = 'E';
					}
					else
					{
						$persentase = '>80';
						$kode = 'E';
					}
					
				}
				else
				{
					$persentase = $usertravia['count_L'] / 5 *100;
					if($persentase < 80)
					{
						$persentase = '<80';
						$kode = 'L';
					}
					else
					{
						$persentase = '>80';
						$kode = 'L';
					}
					
				}
			
			$result = $this->traviaHelper->result($persentase,$kode);
			$watermark = $result['Deskripsi'];
			$title = $result['title'];
			//$bagrnd = array ('gallery/laut.jpg','gallery/trivia-result.jpg'); 
			//$bagrndRandom  =$bagrnd[array_rand($bagrnd,1)];
			if($result['resut_id']==1)
			{
				$bagrndRandom='gallery/action_seeker.jpg';
			
			}
			else if($result['resut_id']==2)
			{
				$bagrndRandom='gallery/escapist.jpg';
			
			}
			else if($result['resut_id']==3)
			{
				$bagrndRandom='gallery/explorer.jpg';
			
			}
			else if($result['resut_id']==4)
			{
				$bagrndRandom='gallery/seeker.jpg';
			
			}
			$imagesResult = $this->uploadHelper->copymergetextimages($bagrndRandom,$watermark,$title);
			$this->View->assign('images',$imagesResult);
			$this->View->assign('aspiration','');
			$this->View->assign('travia',$watermark);
			$this->View->assign('travianotags',str_replace( $result['hastags'], '', $watermark));
			$this->View->assign('hastags', $result['hastags']);
			$this->View->assign('traviaTitel',$title);
			$this->View->assign('status','0');
			$this->View->assign('baground',$bagrndRandom);
			$this->View->assign('registerid',$sSession['registerid']);
			
			$data = $this->traviaHelper->insertTravia($imagesResult,$bagrndRandom,$userid,$result['resut_id'],$usertravia['user_travia_id']);
			if($data)
			{
				
				 $this->View->assign('traviaid',$data['idtravia']);
				 $this->traviaHelper->updateUserTravia($userid);
			
			}
			
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/trivia-result.html');
	}
	function aspiration(){
		$gorasakan = $this->traviaHelper->getAspirationTag('#goahead_rasakan');
		$golepaskan = $this->traviaHelper->getAspirationTag('#goahead_lepaskan');
		$aspiration = array();
		
		for($i=0;$i<=5;$i++)
		{
		
			if(isset($gorasakan[$i]['aspirasi_user'])||isset($golepaskan[$i]['aspirasi_user']))
			{
				if(isset($gorasakan[$i]['aspirasi_user']))
				{
					$aspiration[$i][] = array("aspiration"=>$gorasakan[$i]['aspirasi_user'],
															"username"=>$gorasakan[$i]['username'],
															"gambar"=>$gorasakan[$i]['gambar_aspirasi_artist']
															);
				}
				else
				{
					$aspiration[$i][] = array("aspiration"=>'',
															"username"=>'',
															"gambar"=>''
															);
				}
				if($golepaskan[$i]['aspirasi_user'])
				{
					$aspiration[$i][] = array("aspiration"=>$golepaskan[$i]['aspirasi_user'],
												"username"=>$golepaskan[$i]['username'],
												"gambar"=>$golepaskan[$i]['gambar_aspirasi_artist'],
					
															);
				}
				else
				{
					$aspiration[$i][] = array("aspiration"=>'',
												"username"=>'',
												"gambar"=>''
											);
				}
			}
		}
		//pr($aspiration);die;
		$this->View->assign('aspiration',$aspiration);
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/submit-story.html');
	}
	function travia(){
		
		if(!$this->_g("traviaid"))
		{
			sendRedirect("https://{$_SERVER['HTTP_HOST']}/");exit;
		}
		$sSession = $this->getUsetSession();
		if($sSession['userid']=='')
		{
			sendRedirect("{$CONFIG['BASE_DOMAIN']}");die;
		}
		if(!$this->traviaHelper->gettraviafullinerId($this->_g("traviaid")))
		{
		
			sendRedirect("https://{$_SERVER['HTTP_HOST']}");exit;
		}
		$travia = $this->traviaHelper->gettraviafullinerId($this->_g("traviaid"));
		
			$this->View->assign('images',$travia['travia_images']);
			$this->View->assign('aspiration','');
			$this->View->assign('travia',$travia['Deskripsi']);
			$this->View->assign('traviaTitel',$travia['title']);
			$this->View->assign('status',$travia['travia_status']);
			$this->View->assign('baground',$travia['travia_baground']);
			 $this->View->assign('traviaid',$travia['travia_id']);
			 $this->View->assign('registerid',$sSession['registerid']);
			return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/trivia-result.html');
		
	}
	function thanks(){
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'/apps/thanks.html');
	}
	function saveAspiration(){
		$sSession = $this->getUsetSession();
		$user = $this->traviaHelper->checkuser($sSession['userid']);
		
		$data = $this->traviaHelper->insertAspiration($user);
		print json_encode($data);exit;
	}
	function saveMyart(){
	global $CONFIG;
		/* $sSession = $this->getUsetSession();
		if(isset($this->_p("traviaid")))
		{
		
			$data['status']=0;
			$data['msg'] = 'proses gagal coba ulangi lagi';
			print json_encode($data);exit;
		}
		if(!$this->traviaHelper->gettraviafullinerId($this->_p("traviaid")))
		{
		
			$data['status']=0;
			$data['msg'] = 'proses gagal coba ulangi lagi';
			print json_encode($data);exit;
		}
		$travia = $this->traviaHelper->gettraviafullinerId($this->_p("traviaid"));
		
		$parameter = array("registration_id" =>$sSession['registerid'],
							"title" => $travia['title'],
							"desc"=>$travia['Deskripsi'],
							"content"=>$CONFIG['UPLOAD_ASSET'].$travia['travia_images']
		
		
				);
		
		$url = "https:/people.com/api/artwork_insert";
		curlPOST($url,$parameter,$timeout=35);
		*/
		$data = $this->traviaHelper->saveMyart();
		print json_encode($data);exit;
	}
	function countGallery()
	{
		$sSession = $this->getUsetSession();
		if ($sSession['userid'])
		{
			$user = $this->traviaHelper->checkuser($sSession['userid']);
			$data = $this->traviaHelper->countGalery($user);
		}
		else
		{
			$data['status']=2;
			$data['msg'] = 'session anda telah habis ,silahkan login dulu ';
		}
		
		print json_encode($data);exit;
	
	}
	function commentGalerry(){
		$data = $this->traviaHelper->commentar();
		
		print json_encode($data);exit;
	}
	function haha()
	{
		global $CONFIG;
		$sSession = $this->getUsetSession();
		
		pr($sSession);die;
		 $gorasakan = $this->traviaHelper->getAspirationTag('#goahead_rasakan');
		$golepaskan = $this->traviaHelper->getAspirationTag('#goahead_lepaskan');
		$aspiration = array();
		
		for($i=0;$i<=5;$i++)
		{
		
			if(isset($gorasakan[$i]['aspirasi_user']) && isset($golepaskan[$i]['aspirasi_user']))
			{
				if(isset($gorasakan[$i]['aspirasi_user']))
				{
					$aspiration[$i][] = array("aspiration"=>$gorasakan[$i]['aspirasi_user'],
															"username"=>$gorasakan[$i]['username'],
															"gambar"=>$gorasakan[$i]['gambar_aspirasi_artist']
															);
				}
				else
				{
					$aspiration[$i][] = array("aspiration"=>'',
															"username"=>'',
															"gambar"=>''
															);
				}
				if($golepaskan[$i]['aspirasi_user'])
				{
					$aspiration[$i][] = array("aspiration"=>$golepaskan[$i]['aspirasi_user'],
												"username"=>$golepaskan[$i]['username'],
												"gambar"=>$golepaskan[$i]['gambar_aspirasi_artist'],
					
															);
				}
				else
				{
					$aspiration[$i][] = array("aspiration"=>'',
												"username"=>'',
												"gambar"=>''
											);
				}
			}
		}
		pr($aspiration);
		die;
	}
	function teste()
	{
		$messages 	= array ( ) ;
		$status 	= true;
		if($_SERVER['REMOTE_ADDR'] == '117.54.1.92' || $_SERVER['REMOTE_ADDR']=='::1')
		{
			

			$mop_id 	= trim($_POST["registration_id"] ) ;
			$time 		= date('Y-m-d');
			$message 	= strip_tags($_POST["message"], '<a>') ;
			$type 		= "gat_win" ;
			$is_read 	= 0;

			
		}
		else
		{
			$status = false;
			$messages[] = "This function is restricted from " ;
		}

		echo json_encode ( array ( "status" => $status, "message" => $messages ) ) ;die;
	}

}
?>
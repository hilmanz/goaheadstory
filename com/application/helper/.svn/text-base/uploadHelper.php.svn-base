<?php 


class uploadHelper {
	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
	}
	
	function uploadThisImage($files=NULL,$path=NULL,$maxSize=1000,$resizeOriginal=false){
		global $CONFIG;
		include_once '../engines/Utility/phpthumb/ThumbLib.inc.php';
		$arrImageData['filename'] ="";
		if($files==NULL || $path==NULL) return false;
		//$filename = sha1(date('ymdhis').$files['name']);
		$type = explode('/',$files['type']);
		$filename = md5($files['name'].rand(1000,9999)).".".$type[1];
		try{
			$thumb = PhpThumbFactory::create( $files['tmp_name']);
		}catch (Exception $e){
			// handle error here however you'd like
			return false;
		}
		$typeAccepted = array("image/jpeg","image/jpg","image/png","image/pjpeg");
        if(in_array(strtolower($files['type']),$typeAccepted)) {
			$this->logger->log($path.$filename);
			if(move_uploaded_file($files['tmp_name'],$path.$filename)){
				chmod($path.$filename,0644);
				list($width, $height, $type, $attr) = getimagesize("{$path}{$filename}");
				$maxSize = $maxSize;
					if($resizeOriginal){
							if($width>=$maxSize){
							
								$subs = $width - $maxSize;
								$percentageSubs = $subs/$width;
										
							}else{
									$subs = $maxSize;
									$percentageSubs = $subs/$width;
							}
							
							if(isset($percentageSubs)) {
								if($width>=$maxSize){
									$width = $width - ($width * $percentageSubs);
									$height =  $height - ($height * $percentageSubs);
								}else{
									$width = $width * $percentageSubs;
									$height =  $height * $percentageSubs;
								}
							}
							
					}else{
						if($width>=$maxSize){
							if($width>=$height) {
								$subs = $width - $maxSize;
								$percentageSubs = $subs/$width;
							}
						}
						if($height>=$maxSize) {
							if($height>=$width) {
								$subs = $height - $maxSize;
								$percentageSubs = $subs/$height;
							}
						}
						if(isset($percentageSubs)) {
							$width = $width - ($width * $percentageSubs);
							$height =  $height - ($height * $percentageSubs);
						}
					}	
						$w_small = $width - ($width * 0.5);
						$h_small = $height - ($height * 0.5);
						$w_tiny = $width - ($width * 0.7);
						$h_tiny = $height - ($height * 0.7);
					
				//resize the image
				if($resizeOriginal){		
					$thumb->setOptions(array('resizeUp'=>true));
					$thumb->adaptiveResize($width,$height);
					$ori = $thumb->save($path.$filename);
					$original = $thumb->save($path."original_".$filename);
					
				}
				$thumb->adaptiveResize($width,$height);
				$big = $thumb->save("{$path}big_".$filename);
				$thumb->adaptiveResize($w_small,$h_small);
				$small = $thumb->save("{$path}small_".$filename);
				$thumb->adaptiveResize($w_tiny,$h_tiny);
				$tiny = $thumb->save("{$path}tiny_".$filename);
				
				$arrImageData['filename'] =$filename;
				$this->autoCropCenterArea($filename,$path,$width,$height);
				return array('result'=>true,'arrImage'=> $arrImageData);
			
			}
		}
		return array('result'=>false,'arrImage'=> false);
	}
	
	function uploadThisMusic($files=NULL,$path=NULL){
		$arrMusicData['filename'] ="";
		if($files==NULL || $path==NULL) return false;
		if ($files['error']==0) {
			//$type = explode('/',$files['type']);
			$type = explode('.',$files['name']); 	
			$checktotalcount = count($type);	
			if($type==1) $extentions="mp3";
			else $extentions=$type[$checktotalcount-1];
			$filename = md5($files['name'].rand(1000,9999)).".".$extentions;
		} else return false;
		if(move_uploaded_file($files['tmp_name'],$path.$filename)){
			$arrMusicData['filename'] = $filename;
			return array('result'=>true,'arrMusic'=> $arrMusicData);
		}else{
			return array('result'=>false,'arrMusic'=> false);
		}
	}
	
	function uploadThisVideo($files=NULL,$path=NULL){
		$arrVideoData['filename'] ="";
		if($files==NULL || $path==NULL) return false;
		list($name,$type) = explode('.',$files['name']);
		$filename = md5($files['name'].rand(1000,9999)).".".$type;
		
		if(move_uploaded_file($files['tmp_name'],$path.$filename)){
			$arrVideoData['filename'] =$filename;
			return array('result'=>true,'arrVideo'=> $arrVideoData);
		}else{
			return array('result'=>false,'arrVideo'=> false);
		}
	}
	
	function saveCropImage(){
		global $CONFIG;
		$files['source_file'] = $this->apps->_p("imageFilename");
		$files['url'] = $this->apps->_p("imageUrl");
		$files['real_url'] = $CONFIG['LOCAL_PUBLIC_ASSET'].'user/photo/';
		$arrFilename = explode('.',$files['source_file']);
		if($files==null) return false;
		$targ_w = $this->apps->_p('w');
		$targ_h =$this->apps->_p('h');
		$jpeg_quality = 90;
		
		if($files['source_file']=='') return false;
			
		//check is img have original char						
		$arrOriginal = explode("_",$files['source_file']);
		if(is_array($arrOriginal)){
			if($arrOriginal[0]=='original') {						
				$files['source_file'] = $arrOriginal[1];
				unlink($files['url'].$files['source_file']);
				copy($files['url']."original_".$files['source_file'],$files['url'].$files['source_file']);
			}
			
		}				
	
		$src = 	$files['url'].$files['source_file'];
		copy($src, $files['url']."original_".$files['source_file']);
		
		
		try{
			$img_r = false;
			$arrJpgFormat = array("jpg","jpeg","pjpeg");
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) $img_r = imagecreatefromjpeg($src);
			if($arrFilename[1]=='png' ) $img_r = imagecreatefrompng($src);
			if($arrFilename[1]=='gif' ) $img_r = imagecreatefromgif($src);
			if(!$img_r) return false;
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$this->apps->_p('x'),$this->apps->_p('y'),	$targ_w,$targ_h,$this->apps->_p('w'),$this->apps->_p('h'));

			// header('Content-type: image/jpeg');
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) imagejpeg($dst_r,$files['url'].$files['source_file'],$jpeg_quality);
			if($arrFilename[1]=='png' ) imagepng($dst_r,$files['url'].$files['source_file']);
			if($arrFilename[1]=='gif' ) imagegif($dst_r,$files['url'].$files['source_file']);
			
		}catch (Exception $e){
			return false;
		}
		include_once '../engines/Utility/phpthumb/ThumbLib.inc.php';
			
		try{
			$thumb = PhpThumbFactory::create($files['url'].$files['source_file']);
		}catch (Exception $e){
			// handle error here however you'd like
		}
		list($width, $height, $type, $attr) = getimagesize($files['url'].$files['source_file']);
		$maxSize = 680;
		if($width>=$maxSize){
			if($width>=$height) {
				$subs = $width - $maxSize;
				$percentageSubs = $subs/$width;
			}
		}
		if($height>=$maxSize) {
			if($height>=$width) {
				$subs = $height - $maxSize;
				$percentageSubs = $subs/$height;
			}
		}
		if(isset($percentageSubs)) {
		 $width = $width - ($width * $percentageSubs);
		 $height =  $height - ($height * $percentageSubs);
		}
		
		$w_small = $width - ($width * 0.5);
		$h_small = $height - ($height * 0.5);
		$w_tiny = $width - ($width * 0.7);
		$h_tiny = $height - ($height * 0.7);
		$thumb->setOptions(array('resizeUp'=>true));
		
		//resize the image
		$thumb->adaptiveResize($width,$height);
		$big = $thumb->save(  "{$files['url']}".$files['source_file']);
		$thumb->adaptiveResize($width,$height);
		$prev = $thumb->save(  "{$files['url']}prev_".$files['source_file']);
		$thumb->adaptiveResize($w_small,$h_small);
		$small = $thumb->save( "{$files['url']}small_".$files['source_file'] );
		$thumb->adaptiveResize($w_tiny,$h_tiny);
		$tiny = $thumb->save( "{$files['url']}tiny_".$files['source_file']);
		
		if(file_exists($files['url'].$files['source_file'])){
			//saveit
			$sql = "
			UPDATE social_member 
			SET  img = '{$files['source_file']}'
			WHERE id={$this->uid} LIMIT 1
			";
			$this->logger->log($sql);
			
			$qData = $this->apps->query($sql);
			if($qData){
					$sql = "
					SELECT id,name,nickname,email,register_date,sex,birthday,phone_number,fb_id,twitter_id,gplus_id,img
					FROM social_member 
					WHERE 
					n_status=1 AND id={$this->uid} LIMIT 1 ";
				$rs = $this->apps->fetch($sql);	
				if(!$rs)return false;
				$rs['img'] = $files['source_file'];
				$this->apps->session->set('user',urlencode64(json_encode($rs)));
				return "prev_".$files['source_file'];
			}else return false;			
		}else return false;
	}
	
	function autoCropCenterArea($imageFilename=null,$imageUrl=null,$width=0,$height=0){
		
		if($imageFilename==null||$imageUrl==null) return false;
		if($width==0||$height==0) return false;
		
		global $CONFIG;
		$files['source_file'] = $imageFilename;
		$files['url'] = $imageUrl;
		// $files['real_url'] = $CONFIG['LOCAL_PUBLIC_ASSET'];
		$arrFilename = explode('.',$files['source_file']);
		if($files==null) return false;
		
		$jpeg_quality = 90;
		
		//get x, y : phytagoras
		// to get center of view from image variants
		$phyt = sqrt($width*$width +  $height*$height);
		$x = ceil($phyt/4);
		$y = ceil($phyt/4);			
		//count view dimension, size same as x and y
		$targ_w = $x;
		$targ_h = $y;		
		//count image dimension, size progresize from targ_w
		$width  = $x;
		$height = $y;
		
		if($files['source_file']=='') return false;
		
		$src = 	$files['url'].$files['source_file'];
		try{
			$img_r = false;
			$arrJpgFormat = array("jpg","jpeg","pjpeg");
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) $img_r = imagecreatefromjpeg($src);
			if($arrFilename[1]=='png' ) $img_r = imagecreatefrompng($src);
			if($arrFilename[1]=='gif' ) $img_r = imagecreatefromgif($src);
			if(!$img_r) return false;
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$x,$y,	$targ_w,$targ_h,$width,$height);

			// header('Content-type: image/jpeg');
			$arrJpgFormat = array("jpg","jpeg","pjpeg");
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) imagejpeg($dst_r,$files['url']."square".$files['source_file'],$jpeg_quality);
			if($arrFilename[1]=='png' ) imagepng($dst_r,$files['url']."square".$files['source_file']);
			if($arrFilename[1]=='gif' ) imagegif($dst_r,$files['url']."square".$files['source_file']);
			
		}catch (Exception $e){
			return false;
		}
		include_once '../engines/Utility/phpthumb/ThumbLib.inc.php';
			
		try{
			$thumb = PhpThumbFactory::create($files['url']."square".$files['source_file']);
		}catch (Exception $e){
			// handle error here however you'd like
		}
		list($width, $height, $type, $attr) = getimagesize($files['url']."square".$files['source_file']);
		$maxSize = 600;
		if($width>=$maxSize){
			if($width>=$height) {
				$subs = $width - $maxSize;
				$percentageSubs = $subs/$width;
			}
		}
		if($height>=$maxSize) {
			if($height>=$width) {
				$subs = $height - $maxSize;
				$percentageSubs = $subs/$height;
			}
		}
		if(isset($percentageSubs)) {
		 $width = $width - ($width * $percentageSubs);
		 $height =  $height - ($height * $percentageSubs);
		}
		
		$w_small = $width - ($width * 0.5);
		$h_small = $height - ($height * 0.5);
		$w_tiny = $width - ($width * 0.7);
		$h_tiny = $height - ($height * 0.7);
		$thumb->setOptions(array('resizeUp'=>true));
		//resize the image
		$thumb->adaptiveResize($width,$height);
		$big = $thumb->save(  "{$files['url']}"."square_big_".$files['source_file']);
		$thumb->adaptiveResize($width,$height);
		$prev = $thumb->save(  "{$files['url']}prev_".$files['source_file']);
		$thumb->adaptiveResize($w_small,$h_small);
		$small = $thumb->save( "{$files['url']}square_small_".$files['source_file'] );
		$thumb->adaptiveResize($w_tiny,$h_tiny);
		$tiny = $thumb->save( "{$files['url']}square_tiny_".$files['source_file']);
		
		return $files['source_file'];
	}
	//buat gambat merger txt
	
	function copymergetextimages2($images,$text,$title){
		 
		global $CONFIG;
			
			//pr($CONFIG['UPLOAD_ASSET'].$images);die;
			list($width, $height) = getimagesize($CONFIG['UPLOAD_ASSET'].$images);
			//$dest = imagecreatefrompng($CONFIG['UPLOAD_ASSET'].'gallerybox.png');
			$ratio = $width/$height;
			$widthTarget = 1024;
			$heightTarget = $widthTarget/$ratio;
			
			$image = imagecreatetruecolor($widthTarget, $heightTarget);
			
			
			$sorce = imagecreatefromjpeg($CONFIG['UPLOAD_ASSET'].$images);
			imagecopyresized($image, $sorce, 0, 0, 0, 0, $widthTarget, $heightTarget, $width,$height);
		
		   $wihte = imagecolorallocate($image, 255, 255, 255);
		   $font = "../public_html/assets/fonts/MyriadPro.ttf";
			//$font = "http://themes.googleusercontent.com/static/fonts/opensans/v7/DXI1ORHCpsQm3Vp6mXoaTXhCUOGz7vYGh680lGh-uXM.woff";
		   $font_size = '18'; 
		  
		   $explod = explode(' ',$text);
		   $jumlahExplode = count($explod);
		 
		   $i=0;
		   $j=50;
		   
		   $textwtr='';
		   $setengahwidht = ceil($widthTarget/2 - 50);
		   $y = ceil($heightTarget/2 - 180);
		   $batas=10;
		   $bboz = imageftbbox(20, 0, $font, $title);
			$cord_z = (imagesx($image) - $bboz[4])/2; 
		   imagettftext($image, 16, 0, $cord_z-50, $y-40, $wihte, $font,'Gue adalah seorang :');
		   imagettftext($image, 30, 0, $cord_z-50, $y, $wihte, $font,$title);
		   if($jumlahExplode < $batas)
				{
					$x =  $setengahwidht - (strlen($text)* 5) ;
					$y = $y ;
					imagettftext($image, $font_size, 0, 	$x, $y, $wihte, $font,$text);
				}
				else
				{
				   foreach ( $explod as $extxt)
					{
						
						$i++;
						$textwtr .= $extxt.' ';
						
							if($i == $batas)
								{
									/*$x =  $setengahwidht - (strlen($textwtr)* 2);
									$x = ceil($x /10);
									$x = $x+$j;
											*/
									$y = $y + 30;
									$bbox = imageftbbox(18, 0, $font, $textwtr);
									$cord_x = (imagesx($image) - $bbox[4])/2; 	
									
									imagettftext($image, $font_size, 0, $cord_x+40, $y, $wihte, $font,$textwtr);
									$textwtr ='';
									$i=0;
									// $batas = ceil($batas - 1);
									$j=$j+20;
								}
						
					}
					
					$cord_z =$cord_z-60;
					$bbox = imageftbbox(18, 0, $font, $textwtr);
					$cord_x = (imagesx($image) - $bbox[4])/2; 	
					
					if($cord_x >  $cord_z)
					{
						$cord_x = $cord_x+10;
					}
					else
					{
						$cord_x = $cord_x+40;
					}
					
				
					imagettftext($image, $font_size, 0, $cord_x, $y+30, $wihte, $font,$textwtr);
				}
		   $rand= rand(3,99);
			$date=date('ymd');
			$filename = $rand.'_'.$date.'.jpg';
			//$savePath = $CONFIG['UPLOAD_ASSET'].'gallery/travia/'.$filename;
			$savePath = $CONFIG['UPLOAD_ASSET'].'gallery/travia/'.$filename;
			imagejpeg ($image, $savePath, 100); 
		 
		   imagedestroy($image); 
		  
		   return 'gallery/travia/'.$filename;
	}
	function copymergetextimages($images,$text,$title){
		 
		global $CONFIG;
		list($width, $height) = getimagesize($CONFIG['UPLOAD_ASSET'].$images);
		$ratio = $width/$height;
		$widthTarget = 1024;
		$heightTarget = $widthTarget/$ratio;
			
		$image = imagecreatetruecolor($widthTarget, $heightTarget);
		$sorce = imagecreatefromjpeg($CONFIG['UPLOAD_ASSET'].$images);
		imagecopyresized($image, $sorce, 0, 0, 0, 0, $widthTarget, $heightTarget, $width,$height);
		
	    $wihte = imagecolorallocate($image, 255, 255, 255);
		$font = "../public_html/assets/fonts/MyriadPro.ttf";
		$font_size = '14'; 
		$bbotitel = imageftbbox(20, 0, $font, $title);
		$cord_xtitle = (imagesx($image) - $bbotitel[4])/2; 
		$cord_ytitle = (imagesy($image) - $bbotitel[5])/2 + 100; 
		$cordHastagx = $widthTarget/2  - $bbotitel[4]/2;
		imagettftext($image, 16, 0, $cordHastagx-50, $cord_ytitle-150, $wihte, $font,'Gue adalah seorang:');
		//simagettftext($image, 16, 0, $cord_xtitle-74, $cord_ytitle-150, $wihte, $font,'Gue adalah seorang:');
		//imagettftext($image, 30, 0, $cord_xtitle-95, $cord_ytitle-100, $wihte, $font,$title); 
		imagettftext($image, 30, 0, $cordHastagx-20, $cord_ytitle-100, $wihte, $font,$title);
		$cord_ytitle =$cord_ytitle-100;
		$explod = explode(' ',$text);
		$textwtr='';
		/*foreach ( $explod as $extxt)
			{ 
				$textwtr .= $extxt.' ';
				$bboextxt = imageftbbox(20, 0, $font, $textwtr);
				$cord_xextxt = (imagesx($image) - $bboextxt[4])/2; 
				$cord_yextxt = (imagesy($image) - $bboextxt[5])/2 + 100; 
				$cord_yextxt = $cord_yextxt-70;
				if($cord_xextxt < -75)
					{
						$cord_ytitle =$cord_ytitle + 30;
							if($cord_xextxt < -100)
								{
									imagettftext($image, $font_size, 0, 75, $cord_ytitle, $wihte, $font,$textwtr);
								}
							else
								{
									
									imagettftext($image, $font_size, 0, $cord_xextxt+170, $cord_ytitle, $wihte, $font,$textwtr);
								}
						
						$textwtr = '';
					}
				
				
				
		 
			}
		if($cord_xextxt <100)
			{
				imagettftext($image, $font_size, 0, 30, $cord_ytitle+30, $wihte, $font,$textwtr);
			 }
		 else
			 {
				imagettftext($image, $font_size, 0,  $cord_xextxt, $cord_ytitle+30, $wihte, $font,$textwtr);
			 }*/
		$textwtr = 'Kalo lo? Cari tau lo tipe goahead yang mana';
		$textwtrgo = 'di goaheadpeople.com';
		$bboextxt = imageftbbox(20, 0, $font, $textwtr);
		$cord_xextxt = (imagesx($image) - $bboextxt[4])/2; 
		$cord_yextxt = (imagesy($image) - $bboextxt[5])/2 + 100; 
		$cord_yextxt = $cord_yextxt-70;
		
		imagettftext($image, $font_size, 0, $cord_xextxt+70, $cord_ytitle+30, $wihte, $font,$textwtr);
		imagettftext($image, $font_size, 0, $cord_xextxt+150, $cord_ytitle+60, $wihte, $font,$textwtrgo);
		  $rand= rand(3,99);
			$date=date('ymd');
			$filename = $rand.'_'.$date.'.jpg';
			//$savePath = $CONFIG['UPLOAD_ASSET'].'gallery/travia/'.$filename;
			$savePath = $CONFIG['UPLOAD_ASSET'].'gallery/travia/'.$filename;
		
		imagejpeg ($image, $savePath, 100); 
		 
		   imagedestroy($image); 
		  
		   return 'gallery/travia/'.$filename;	
	}
}
?>
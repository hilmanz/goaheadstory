<?php

class webActivityHelper {

	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);

		$this->dbshema = "athreesix";	
		$this->week = 7;
		$week = intval($this->apps->_request('week'));
		if($week!=0) $this->week = $week;
		
		$this->startweekcampaign = "2013-04-25";
		// pr($this->apps->_request('week'));
		
	}
	
	function top10UserActivity(){
		$top10user = false;
		$sql = "
		SELECT *,SUM(num) num FROM usr_activity_subculture 
		WHERE 
		WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))  
		GROUP BY action_id,type 
		ORDER BY num DESC ";
		// pr($sql);
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		if($qData){
			
			foreach($qData  as $val){
					$top10user[$val['type']][] = $val;
			}
		}
		// pr($top10user);
		if($top10user)		return $top10user;
		else return false;
		
	}

	/* Top 10 (per user activity) Like */
	function topUserActLike(){
		$sql = "SELECT *,SUM(num) num 
		FROM usr_activity_like WHERE 
		WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))    
		GROUP BY user_id
		ORDER BY num DESC LIMIT 10";
		// pr($sql);

		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
		
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
				}
				// pr($qData);
			}
			return $qData;
		}
		return false;
	}
	
	function topUserActComment(){
		$sql = "SELECT *,SUM(num) num  FROM usr_activity_comment  
		WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))    
		GROUP BY user_id ORDER BY num  DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topUserActUpload(){
		$sql = "SELECT *,SUM(num) num FROM usr_activity_upload  WHERE 
		WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))    
		GROUP BY user_id  ORDER BY num  DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topUserActDownload(){
		$sql = "SELECT *,SUM(num) num FROM usr_activity_download  WHERE 
		WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))    
		GROUP BY user_id   ORDER BY num  DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	
	/* End of User Activities Tab */
	
	/* --------------------------- */

	/* Top Users Tab */
	
	function topViewMostTime(){
		$sql = "SELECT *,SUM(num) num FROM usr_most_view  WHERE 
		WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))    
		AND name IS NOT NULL AND name <> ''
		GROUP BY name  
		ORDER BY num DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		// pr($sql);
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['action_value']] = $val['action_value'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['action_value'],$social)) $qData[$key]['img'] = $social[$val['action_value']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			// pr($qData);
			return $qData;
		}
		return false;
	}
	
	
	
	function topTenSuperUser(){
		$sql = "SELECT  *,SUM(num) num FROM user_monthly  WHERE 
		WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
		AND name IS NOT NULL AND name <> ''		
		GROUP BY userid
		ORDER BY num  DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);

		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['userid']] = $val['userid'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$social)) $qData[$key]['img'] = $social[$val['userid']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topTenUserWeekly(){
		$sql = "SELECT *,sum(num) num,user_id userid FROM user_weekly 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))  
				AND name IS NOT NULL AND name <> ''
				GROUP BY action_value
				ORDER BY num  DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['action_value']] = $val['action_value'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['action_value'],$social)) $qData[$key]['img'] = $social[$val['action_value']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
		
	}
	
	function topTenBasedNumFriend(){
		$sql = "SELECT *,sum(num) num FROM usr_based_on  WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))
				AND name IS NOT NULL AND name <> ''
				GROUP BY userid
				ORDER BY num  DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['userid']] = $val['userid'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$social)) $qData[$key]['img'] = $social[$val['userid']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
		
	}
	
	/* End of Top User Tab */
	
	/* --------------------------- */
	
	/* Top Visited Page */
	
		
	function topTenVisitedPage(){
		$sql = "SELECT sum(num) num, user_id ,action_value page 
				FROM  top_visited_page as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))    			
				GROUP BY action_value 
				ORDER BY num DESC LIMIT 10";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topThreeVisitMusic(){
		$sql = "SELECT sum(num) num ,action_value page , user_id ,type
				FROM  top_visited_page_subculture as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND type = 'music'
				GROUP BY action_value 
				ORDER BY num DESC LIMIT 3";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topThreeVisitDJ(){
		$sql = "SELECT sum(num) num ,action_value page  ,user_id ,type
				FROM  top_visited_page_subculture as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND type = 'dj'
				GROUP BY action_value 
				ORDER BY num  DESC LIMIT 3";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topThreeVisitVisualart(){
	$sql = "SELECT sum(num) num ,action_value page ,user_id ,type
				FROM  top_visited_page_subculture as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND type = 'visualart'
				GROUP BY action_value 
				ORDER BY num  DESC LIMIT 3";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topThreeVisitFashion(){
		$sql = "SELECT sum(num) num ,action_value page ,user_id ,type
				FROM  top_visited_page_subculture as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND type = 'style'
				GROUP BY action_value 
				ORDER BY num  DESC LIMIT 3";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topThreeVisitPhotography(){
		$sql = "SELECT sum(num) num ,action_value page  ,user_id ,type
				FROM  top_visited_page_subculture as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND type = 'photography'
				GROUP BY action_value 
				ORDER BY num  DESC LIMIT 3";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['user_id']] = $val['user_id'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['user_id'],$social)) $qData[$key]['img'] = $social[$val['user_id']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	/* End of Top Visited Page */
	
	/* --------------------------- */
	
	/* Top Content Page */
	function topContent(){
	
		$sql = "SELECT sum(num) num , type, activityName, userid, title
				FROM  most_viewed_artist as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))  
				GROUP BY title ,action_id
				ORDER BY num  DESC LIMIT 5";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['userid']] = $val['userid'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$social)) $qData[$key]['img'] = $social[$val['userid']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topFiveLiked() {
		$sql = "SELECT sum(num) num , type, activityName, userid,title
				FROM  most_viewed_artist as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND action_id = 11
				GROUP BY title 
				ORDER BY num  DESC LIMIT 5";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['userid']] = $val['userid'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$social)) $qData[$key]['img'] = $social[$val['userid']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function topFiveCommented() {
		$sql = "SELECT sum(num) num , type, activityName, userid, title
				FROM   most_viewed_artist as a 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND action_id = 10
				GROUP BY title 
				ORDER BY num  DESC LIMIT 5";
		$this->apps->open(1);
	$qData = $this->apps->fetch($sql,1);
		
		if($qData){
		
			foreach($qData as $val){
				$arruserid[$val['userid']] = $val['userid'];
			}
			
			$struserid = implode(',',$arruserid);
			$social = $this->getsocial($struserid);
			
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$social)) $qData[$key]['img'] = $social[$val['userid']]['img'];
						else  $qData[$key]['img'] = "";
				}
			
			}
			return $qData;
		}
		return false;
	}
	
	function basedOnKeyWord(){
		$sql = "SELECT *,SUM(num) num FROM top_content_search 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
				AND action_value IS NOT NULL AND action_value <> ''
				GROUP BY action_value ORDER BY num DESC ";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		return $qData;
		
		
	}
	
	function basedOnContent() {
		$sql = "SELECT *,SUM(num) num FROM based_on_content 
				WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY ))  
				GROUP BY type ORDER BY num DESC";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		return $qData;
		
	}
	
	/* End of Top Content Page */
	
	/* --------------------------- */	
	
	/* Top Most Viewed Artist */
	
	function mostViewedArtist($type='music') {
		if($type=='music'){
			$sqlMusic = "SELECT sum(num) num, names ,gender ,userid FROM most_viewed_artist  
						 WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
						 AND type='music' AND names IS NOT NULL AND names <> ''
						 AND gender IS NOT NULL AND gender <> 'U'
						 GROUP BY names ORDER BY num DESC LIMIT 10";
			$this->apps->open(1);
			$qData = $this->apps->fetch($sqlMusic,1);
		}
		
		if($type=='dj'){
			$sqlDJ = "SELECT sum(num) num, names ,gender ,userid  FROM most_viewed_artist  
					  WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
					  AND type='dj' AND names IS NOT NULL AND names <> ''
					  AND gender IS NOT NULL AND gender <> 'U'
					  GROUP BY names ORDER BY num DESC LIMIT 10";
			$this->apps->open(1);
			$qData = $this->apps->fetch($sqlDJ,1);
		}
		// pr($sqlDJ);
		
		if($type=='visual'){
			$sqlVisArt = "SELECT sum(num) num, names ,gender ,userid  FROM most_viewed_artist  
						  WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
						  AND type='visualart' AND names IS NOT NULL AND names <> ''
						  AND gender IS NOT NULL AND gender <> 'U'
						  GROUP BY names ORDER BY num DESC LIMIT 10";
			$this->apps->open(1);
			$qData = $this->apps->fetch($sqlVisArt,1);
		}
		
		if($type=='style'){
			$sqlFashion = "SELECT sum(num) num, names ,gender ,userid  FROM most_viewed_artist 
						   WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
						   AND type='style' AND names IS NOT NULL AND names <> ''
						   AND gender IS NOT NULL AND gender <> 'U'
						   GROUP BY names ORDER BY num DESC LIMIT 10";
			$this->apps->open(1);
			$qData = $this->apps->fetch($sqlFashion,1);
		}
		
		if($type=='photography'){
			$sqlFashion = "SELECT sum(num) num, names ,gender ,userid  FROM most_viewed_artist 
						   WHERE WEEK(dateday) = WEEK(DATE_ADD('{$this->startweekcampaign}', INTERVAL {$this->week} DAY )) 
						   AND type='photography' AND names IS NOT NULL AND names <> ''
						   AND gender IS NOT NULL AND gender <> 'U'
						   GROUP BY names ORDER BY num DESC LIMIT 10";
			$this->apps->open(1);
			$qData = $this->apps->fetch($sqlFashion,1);
		}
		if($qData){
			$socialarr = array("M","F");
			$pagesarr = array("UB");
			$arruserid = false;
			$arrpageid = false;
			$social = false;
			$pages = false;
			foreach($qData as $val){
				if(in_array($val['gender'],$socialarr)) $arruserid[$val['userid']] = $val['userid'];
				if(in_array($val['gender'],$pagesarr)) $arrpageid[$val['userid']] = $val['userid'];
			}
			if($arruserid){
				$struserid = implode(',',$arruserid);
				$social = $this->getsocial($struserid);
			}
			if($arrpageid){
				$strpageid = implode(',',$arrpageid);
				$pages = $this->getPages($strpageid);
			}
			if($social){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$social)) $qData[$key]['img'] = $social[$val['userid']]['img'];
				}
			
			}
			
			if($pages){
				foreach($qData as $key => $val){
						if(array_key_exists($val['userid'],$pages)) $qData[$key]['img'] = $pages[$val['userid']]['img'];
				}
			
			}
			
			
				foreach($qData as $key => $val){
						if($val['gender']=="U") $qData[$key]['img'] = "default.jpg";
				}
		
			
			
			return $qData;
		}
		return $qData;
	}
	/* ------------------------------------ */
	
	function getWeek(){
		
		$sqlGetWeek = "SELECT ceil( abs( DATEDIFF( '".date('Y-m-d')."', '{$this->startweekcampaign}' ) ) /7 ) AS week";
		$resGetWeek = $this->apps->fetch($sqlGetWeek);

		if ($resGetWeek['week']){
			$num = 7;
			for ($i = 1; $i<=$resGetWeek['week']; $i++){
					$data['weekevent'][$i] = $num;
					$num = $num+7;
			}
		}
		return $data;
	}
	
	function getsocial($struserid=null){
			if($struserid==null) return false;
			
		
			$sql ="SELECT img,id FROM social_member WHERE id IN ( {$struserid} ) ";	
			$this->apps->close();
			$this->apps->open(0);
			$qData = $this->apps->fetch($sql,1);
			$this->apps->close();
			$this->apps->open(1);
		
		if($qData){
			
			$arrData = false;
			
			foreach($qData as $val){
				$arrData[$val['id']] = $val;
			}	
			return $arrData;
		}
		
		return false;
	}
	
	function getPages($struserid=null){
			if($struserid==null) return false;
			
		
			$sql ="SELECT img,id FROM my_pages WHERE id IN ( {$struserid} ) ";	
			$this->apps->close();
			$this->apps->open(0);
			$qData = $this->apps->fetch($sql,1);
			$this->apps->close();
			$this->apps->open(1);
		
		if($qData){
			
			$arrData = false;
			
			foreach($qData as $val){
				$arrData[$val['id']] = $val;
			}	
			return $arrData;
		}
		
		return false;
	}
	
}

?>
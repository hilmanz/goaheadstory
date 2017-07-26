<?php

class demographyHelper {

	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);

		$this->dbshema = "athreesix";	
	}
	
	function provinceData() {
		$sql = "SELECT num, provinceName FROM tbl_province WHERE provinceName IS NOT NULL AND provinceName <> ''  ORDER BY num DESC LIMIT 7 ";
			$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);

		// pr($qData);
		return $qData;
		
	}
	
	function cityData() {
		$sql = "SELECT num, city FROM tbl_city WHERE city IS NOT NULL AND city <> '' ORDER BY num DESC LIMIT 7 ";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);

		return $qData;
		
	}
	
	function genderData (){
				
		$sql = "SELECT num, sex FROM tbl_gender WHERE sex <> 'unknown' GROUP BY sex ";
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		$data = false;
		foreach($qData as $val){
			$data[$val['sex']] = $val['num'];
		}
	
		return $data;
		
	}
		
	
	
	function ageData (){
				
		$sql = "SELECT  num,  age FROM tbl_age WHERE age <> 0 GROUP by age";
			$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		
		// 18 - 20  youth
		// 21 - 26
		// 27 - 30++
	
		$data['18 - 20']= 0;
		$data['21 - 26']= 0;
		$data['27 - 30++']= 0;
		foreach( $qData as $val ){
			if($val['age']==null ) $data['null']+= $val['num'];
			else{
			if($val['age']<=24 ) $data['18 - 20'] += $val['num']; 
			if($val['age']>=25 && $val['age']<=28 ) $data['21 - 26'] += $val['num'];
			if($val['age']>=29 ) $data['27 - 30++']+= $val['num'];
			}
			
		}
		
		
		// pr($val);
		return $data;
	}
	
	function brandPreference() {
		$brandDataArr = false;
		
		$arrBrand = array('0053','0004','0067','0027',"'00AV'",'0028','0011','0054','0029','0044',"'00AM'",'0017','0018','0024','0060','0066','0039','0040','0041');
		
		$strArrBrand = implode(',',$arrBrand);
		
		
		$sql = "SELECT num, Brand1_ID, sex
				FROM brand_preference	
				WHERE  Brand1_ID IN ({$strArrBrand})	
				GROUP BY Brand1_ID
				ORDER BY num DESC";
				
		$this->apps->open(1);
		$qData = $this->apps->fetch($sql,1);
		$data = false;
		// pr($sql);
		if(!$qData) return false;
		
			foreach($qData as $val){
				
				$data[trim($val['Brand1_ID'])][$val['sex']] = $val['num'];
				$arrBrandprefCode[trim($val['Brand1_ID'])] = "'{$val['Brand1_ID']}'";
				
			}
		if($arrBrandprefCode){	
		$strBrandPref = implode(",",$arrBrandprefCode);
		$sql = "SELECT code,brand_name
				FROM tbl_brand_preferences_references				
				WHERE
				code IN ( {$strBrandPref} )
				AND n_status = 1				
				";
		$this->apps->close(); 
		$this->apps->open(0);
		$brandData = $this->apps->fetch($sql,1);
			if($brandData){
				foreach($brandData as $val){
					$brandDataArr["{$val['code']}"] = $val['brand_name'];
				}
			}
		
		}
		// pr($brandData);
		if(!$data) return false;
		
		foreach($data as $key => $brands){
		
				
				$data[$key]['max']= 0;
				if($brandDataArr){
					if(array_key_exists($key,$brandDataArr)){
						$data[$key]['brandname'] = $brandDataArr[$key];
					}else $data[$key]['brandname'] = $key;
				}
					foreach($brands as $val){
						$data[$key]['max'] += $val;
						
					}
				
			
		}
		// pr($data);
		return $data;
	}
	

}

?>
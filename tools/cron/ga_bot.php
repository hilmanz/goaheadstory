<?php
include_once "db.php";include_once"gapi/gapi.class.php";
class ga_bot extends db{
	var $gaData;	var $ga_email;	var $ga_password;	var $ga_profile;
	function __construct(){		$this->ga_email = 'kana.digital@gmail.com';		$this->ga_password = 'tualatin9i8u';		$this->ga_profile = '81611187';		$this->init_ga();
	}

	function init_ga(){		$ga = new gapi($this->ga_email,$this->ga_password);		$ga->requestReportData($this->ga_profile,array('date'),array('timeOnSite','pageviews','timeOnPage','visits','bounces','exits','newVisits'), array('date'),null,				date('2014-01-30'), // Start Date				date("Y-m-d"), // End Date				1,  // Start Index				500 // Max results		);	
		foreach ($ga->getResults() as $result){				$this->gaData[date('Y-m-d',strtotime($result->getDate()))] = array(				'page_views'=>$result->getPageviews(),				'visits'=>$result->getVisits(),				'visitDuration'=>$result->getTimeOnSite(),								'time_onPage'=>@round($result->getTimeOnPage()/($result->getPageviews() - $result->getExits())),				'bounce_rate'=>@round(($result->getBounces()/$result->getVisits()) *100),				'unique_visitor'=>($result->getNewVisits()),				'time_onSite'=>@round($result->getTimeOnSite()/$result->getVisits())				 );		}				// print_r($this->gaData);
		// exit;
	}

	function insertDataGa(){		$datas = $this->gaData;		if($datas){		$this->setSocketDB(1);			foreach($datas as $key => $val){						// tbl_ga_average_page_view_daily				$gaDataQuery = "				INSERT INTO rendra_athreesix_report_2013.ga_daily_data (page_views, visits, visitDuration, time_onPage, bounce_rate, unique_visitor, time_onSite,  date_d) VALUES ({$val['page_views']},{$val['visits']},{$val['visitDuration']},{$val['time_onPage']},{$val['bounce_rate']},{$val['unique_visitor']},{$val['time_onSite']},'{$key}') ON DUPLICATE KEY UPDATE page_views={$val['page_views']},visits={$val['visits']},visitDuration={$val['visitDuration']},time_onPage={$val['time_onPage']},bounce_rate={$val['bounce_rate']},unique_visitor={$val['unique_visitor']},time_onSite={$val['time_onSite']};				";				$gaData = $this->query($gaDataQuery);				// tbl_ga_time_on_site_daily num, date_d							if($gaData) $data['gaData'][] ="success";				else $data['gaData'][] ="fialed".$gaDataQuery;								$sql[] = $gaDataQuery;			}		}else $data='there is not left data of GA';		print_r('<pre>');print_r($data);		// print_r (array( 0 => implode("; ",$sql)));		// print "		// ";	}
}
$class = new ga_bot;$class->insertDataGa();die();

?>

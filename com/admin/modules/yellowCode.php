<?php
class yellowCode extends App{
	
	function beforeFilter(){
		global $LOCALE,$CONFIG;
		 
		$this->badgeHelper = $this->useHelper('badgeHelper');
		
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);		
		$this->assign('locale', $LOCALE[1]);
		$this->assign('user', $this->user);
		$this->assign('tokenize',gettokenize(5000*60,$this->user->id));
		$data = $this->userHelper->getUserProfile(); 	
		$this->View->assign('userprofile',$data);
		
		 
	}
	
	function main(){ 
		$this->assign('startdate',$this->_p('startdate'));
		$this->assign('enddate',$this->_p('enddate'));
		$this->assign('search',$this->_p('search'));
		
		
		$codelist = $this->badgeHelper->getgamescodelist();
		
		$this->assign('codelist',$codelist);
		
		if(strip_tags($this->_g('page'))=='home') $this->log('surf','generated games code');
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'apps/yellowcab-code.html');		
	}
	
	function doit(){
	
		print json_encode($this->badgeHelper->yellowCodeGenerator());
		exit;
	
	}
	
	function downloadit(){
		global $config;
		$filename = "Yellowcab_code_report".date('Ymd_gia').".xls";
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=$filename");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		// echo "Some Text"; //no ending ; here
		$resReport = $this->badgeHelper->downloadreportyellow();
		// $this->log->sendActivity("user printing trade monitoring report");
		// pr($resReport);	 	exit;	
		echo "<table border='1'>";	 	 		
		echo "<tr>"; 	
			echo "<th class='head0'>No</th>";
			echo "<th class='head1'>code</th>";
			echo "<th class='head1'>code type</th>";
			echo "<th class='head1'>code channel</th>";
			echo "<th class='head1'>code sub channel</th>";
			echo "<th class='head1'>created date</th>";
		echo "</tr>";
		
		foreach ($resReport['result'] as $key => $val){			
			echo "<tr>";
				echo "<td>$val[no]</td>";
				echo "<td>$val[code]</td>";
				echo "<td>$val[code_type]</td>";
				echo "<td>$val[code_channel]</td>";
				echo "<td>$val[code_sub_channel]</td>";
				echo "<td>$val[created_date]</td>";	
			echo "</tr>";
		}
		echo "</table>";
		
		
		exit;
	
	}
	
	
}
?>
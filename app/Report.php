<?php namespace App;

class ReportTemplate {
	public function __construct($title,$url){
		$this->title = $title;
		$this->url = $url;
	}
}

class Report {
	
	public $list = [];
	
	public function __construct(){
		$this->initialize();
	}
	
	public function initialize()
	  {
		
		$userContributions = new ReportTemplate('User Contributions','/accounting/reports/user-contributions');
		$cashRegister = new ReportTemplate('Cash Register','/accounting/reports/daily-balances/820');
		$missionsRegister = new ReportTemplate('Missions Register','/accounting/reports/daily-balances/818');
		$generalRegister = new ReportTemplate('General Register','/accounting/reports/daily-balances/816');
		$buildingFundRegister = new ReportTemplate('Building Fund Register','/accounting/reports/daily-balances/819');
		$discretionaryRegister = new ReportTemplate('Descretionary Register','/accounting/reports/daily-balances/817');
		
		$this->list = [$userContributions,$cashRegister,$generalRegister,$missionsRegister,$discretionaryRegister,$buildingFundRegister];
	  }
	
	public static function all(){
		$report = new Report;
		return $report->list;
	}
	
}
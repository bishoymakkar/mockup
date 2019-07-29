<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller
{

//////// controller for the chart task
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('parser');
		$this->load->model('chart_model','chart_instance',true);
		
	}

// this is the function that views annotation chart with line in deutsch
	function chartGraph()
	{	
		$this->load->view('areachart_view.php');
	}
// this is the annotation chart but using Combo line charts
	function showT()
	{	
		$this->load->view('chart_view.php');
	}

//this controller gets values from database to be used in charts
	function getVal()
	{


		$val = $this->chart_instance->getVal();
		$out = '';
		foreach ($val as $key => $value)
		 {
			//echo $value['date'];
			$dateArr = explode('.', $value['date']);
		   	$year = (int) $dateArr[2];
		   	$month = (int) $dateArr[1]-1;
		   	$day = (int) $dateArr[0];
            $v = (int) $value['value'];
		   	//$data = new DateTime($dateArr,0);
		  	$out .= '{"c":[{"v":"Date('.$year.','.$month.','.$day.')"},{"v": '.$value['value'].' },{"v": 100 }]}'.",";           
		  }
// echo $out;
$string = '{
  "cols": [
        {"label":"Date","type":"date"},
        {"label":"RealUnit Schweiz","type":"number"},
         {"label":"hline","type":"number"}
      ],
 "rows": [ ' .$out.']
  
}';

		echo $string;

}


}
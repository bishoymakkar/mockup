<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Chart_model extends CI_Model
{
	



	///function to get get categories from database

	function getVal()
	{
		$sql="SELECT * FROM wp_nav_data_Deutschland ";
		$query = $this->db->query($sql);
		return $query->result_array();

// 		$results = array(
// 'cols' => array (
    
//     array('label' => 'date', 'type' => 'date'),
//     array('label' => 'value', 'type' => 'number')
// ),
// 'rows' => array()
// );
// 	}



// while($row = mysqli_fetch_assoc($query))
// {

//    //date assumes "yyyy - mm -- dd" format
//    $dateArr = explode('.', $row['date']);
//    $day = (int) $dateArr[0];
//    $month = (int) $dateArr[1]; //subtract 1 to make compatible with javascript months
//    $year = (int) $dateArr[2];

   
//    $results['rows'][] = array('c' => array(
//       array('v' => "Date($day, $month, $year)"),
//       array('v' => $row['value'])
      
//    ));      
// }

// return $results;

	
}
}
<?php
	$data = array(
				array(
					"id" => 6,
					"name" => "Main Engine 1.6",
					"parent_id" => 1
				),
				array(
					"id" => 1,
					"name" => "Main Engine 1",
					"parent_id" => null
				),
				array(
					"id" => 2,
					"name" => "Main Engine 2",
					"parent_id" => null
				),
				array(
					"id" => 3,
					"name" => "Main Engine 2.3",
					"parent_id" => 2
				),
				array(
					"id" => 4,
					"name" => "Main Engine 2.3.4",
					"parent_id" => 3
				),
				array(
					"id" => 5,
					"name" => "Main Engine 2.4.3",
					"parent_id" => 4
				),
				array(
					"id" => 7,
					"name" => "Main Engine 2.7.1",
					"parent_id" => 1
				),
				array(
					"id" => 8,
					"name" => "Main Engine 2.7.1",
					"parent_id" => 2
				)
			);

	$structured = array();

	structureData(null);

 	function structureData( $parent_id )
	{
		if( is_null($parent_id) ) {
		foreach($GLOBALS['data'] as $row)
			{
				if(is_null($row['parent_id'])) {
					array_push($GLOBALS['structured'], $row);
					structureData($row['id']);
				}
			}
		} else {
			foreach($GLOBALS['data'] as $row)
			{
				if($row['parent_id'] == $parent_id) {
					array_push($GLOBALS['structured'], $row);
					structureData($row['id']);
				}
			}
		}
	}


	$structured = json_encode($structured);

	print_r($structured);


?>

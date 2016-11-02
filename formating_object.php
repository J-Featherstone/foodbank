<?php


class format {
	
	//put in a date with various different formats and this will convert it to a standard one.
	public function standardise_date($date_input) {
		$standard = strtotime($date_input);
		$date = date ("d-m-Y", $standard);
		return $date;
	}
	
	//I plan to iterate through the arrays in the multidimensional array and remove the
	//first values of each array and return them in a seperate array, then return the first
	//array with these values missing from them.
	public function category_array(&$category_product_weights) {
		$category_array = array();
		foreach ($category_product_weights as $key => $array) {
			$category_array[] = array_shift($array);
			$category_product_weights[$key] = $array;
		}
		return $category_array;
	}
	
	//ALWAYS run category_array() before this, or you will get the categories in the array.
	public function product_array(&$category_product_weights) {
		$product_array = array();
		foreach ($category_product_weights as $key => $array) {
			$product_array[] = array_shift($array);
			$category_product_weights[$key] = $array;
		}
		return $product_array;
	}
	
	//Always run after category_array() AND product_array(). Returns multidimensional array with
	//possible weights in them.
	public function weights_array($category_product_weights) {
		$weights_array = array();
		foreach ($category_product_weights as $array) {
			$unprocessed_string = array_shift($array);
			$processed_array = explode( ', ', $unprocessed_string);
			$weights_array[] = $processed_array; 
		}
		return $weights_array;
	}
	
	//process the array from the database object so it can be used by the 
	//interface object.
	public function process_mysqli_array($original){
		$new_array = array();
		foreach ($original as $inner_array) {
			$curr_cat = $inner_array["category"];
			$curr_pro = $inner_array["product_name"];
			$curr_wei = $inner_array["weights"];
			$new_array[$curr_cat][$curr_pro]=array($curr_wei);
		}
		return $new_array;
	}
	
	
}
?>

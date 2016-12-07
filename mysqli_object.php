<?php

class database extends mysqli {
	
	public function __construct($host, $username, $password, $database) {
		parent::init();
		if (!parent::real_connect($host, $username, $password, $database)) {
			echo "Failed to connect to MySQL: (" . $contacts->connect_errno . ") ".	parent::connect_error;
		} else {
			print "connected\n";
		}
	}
	
	//takes the input array and adds appropriate rows to the database
	public function add_to_db($input_array) {
		
		foreach ($input_array as $key=>$product) {
			array_unshift($product, $key);
			//print_r($product);
			$query = "INSERT INTO products Values (null, '$product[0]', '$product[1]', '$product[2]')";
			echo $query;
			if (!parent::real_query($query)) {
				echo "failed!!!!!";
			}
		}
	}
	
	//Takes the rows from list_for_menu and puts them into arrays contained in an object.
	public function get_categories($table_name) {
		$query = "SELECT category, product_name, weights FROM list_for_menu";
		$category_product_weights = array();
		if (!parent::real_query($query)) {
			self::error_check();
		} else {
			$result = parent::use_result();
			//print_r($result);
			while($row = $result->fetch_assoc()) {
				/*if (!in_array($row["category, product name, standard weight"], $categories)){
					$categories[] = $row["category, product name, standard weight"];
					$categories[] = $row["product name"];
					$categories[] = $row["standard weight"];*/
					$category_product_weights[] = $row;
			}
		}
		return $category_product_weights;
	}
	
	public function error_check() {
		die('Error (' . $this->errno . ') ' . $this->error);
	}
	
        //the column names are the keys in $row array and the values are the contents of the respective columns
	private function get_row ($row_array, $table_name) {
            $row = null;
            foreach ($row_array as $key=>$value) {
                if ($row == null) {
                    $row .= $key.' = "'.$value.'"';
                }else {
                    $row = ' and ' . $key . ' = "' . $value . '"';
                }
            }
            $sql = "SELECT * FROM ".$table_name. " where ". $row;
	}
	
       /* private function column_names_to_array($table_name) {
             $result = mysql_query("SHOW COLUMNS FROM " . $table_name);
                if (!$result) {
                    echo 'Could not run query: ' . mysql_error();
                    exit;
                }
            if (mysql_num_rows($result) > 0) {
                while ($row = mysql_fetch_assoc($result)) {
                print_r($row);
                }
            }
        }*/
}
?>

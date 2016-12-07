<?php

class layout {
	
	public function html_o() {
		echo "<html>";
	}
	
	public function html_c() {
		echo "</html>";
	}
	
	public function css_intro() {
		echo '<link rel="stylesheet" type="text/css" href="style.css">';
	}
	
	//takes an array and makes a menu
	//user pressess a button, value gets passed that is used by the file.
	public function menu($button_array) {
		echo "<form action='testing_mysqli.php' method='GET'>";
		foreach($button_array as $value) {
			echo "<button type='submit' name='choice' value='" . $value . "' class='button'>" . $value . "</button>";
		}
		echo "</form>";
	}
	
	public function menu_keys($button_array) {
		echo "<form action='testing_mysqli.php' method='GET'>";
		foreach($button_array as $key=>$value) {
			echo "<button type='submit' name='choice' value='" . $key . "' class='button'>" . $key . "</button>";
		}
		echo "</form>";
	}
	
	public function menu_2($level) {
		//$level = self::check_level($processed_array, $position_array);
		//print_r($level);
		echo "<form action='testing_mysqli.php' method='GET'>";
		foreach($level as $key=>$value) {
			echo "<button type='submit' name='choice' value='" . $key . "' class='button'>" . $key . "</button>";
		}
		echo "</form>";
	}


	//position_array is an array with the keys of the button array being inserted as a reference point
	public function check_level($position_array, $main_array) {
		$level = $main_array;
		$back = "back";
		foreach ($position_array as $value) {
			$level = $level[$value];
		}
		//$level[] = $back;
		return $level;

	}
	
	public function weights_menu($level) {
		echo "<form action='testing_mysqli.php' method='GET'>";
		foreach($level as $key=>$value) {
			echo "<button type='submit' name='choice' value='" . $value . "' class='button'>" . $value . "</button>";
		}
		echo "</form>";
	}
	
}

?>

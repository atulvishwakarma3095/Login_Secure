<?php
	function display_error($validation, $field){
		if($validation->hasError($field)){
			return $validation->getErrors($field);
		}else{
			return false;
		}
	}

?>
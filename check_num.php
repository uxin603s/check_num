<?php
function check_num($data,$check){
	$explode_or=explode("|",$data);
	if(count($explode_or)>1){
		
		foreach($explode_or as $val)
			if(check_num($val,$check))return true;
		
	}
	$explode_mod=explode(",",$data);
	if(count($explode_mod)>=2){
		foreach($explode_mod as $val)
			if(check_num($val,$check))return true;
	}
	$explode_mod=explode("&",$data);
	if(count($explode_mod)>=2){
		foreach($explode_mod as $val)
			if(!check_num($val,$check))return false;
	}
	$explode_between=explode("-",$data);
	if(count($explode_between)>=2){
		$min=$explode_between[0];
		$max=$explode_between[1];
		return ($check>=$min && $check <=$max);
	}
	
	$explode_mod=explode("%",$data);
	if(count($explode_mod)>=2){
		return $explode_mod[0] % $explode_mod[1]==0;
	}
	
	return ($data==$check);	
}

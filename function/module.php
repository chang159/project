<?php
	function modules($module,$action){
		 if(empty($module) AND empty($action)){
        	$module="home";
            $action="home_page";

        }else{
					// foder
				switch($module){
					case 1: $module="home";
					break;
					case 2: $module="users";
					break;
					case 3: $module="case";
					break;
					case 4: $module="schedule";
					break;
					case 404: $module="404";
					break;
					default: $module="404";
					break;
				}
					// file
				switch($action){
					case 1: $action="home_page"; //module file home
					break;
					case 2: $action="form_insert"; //module users
					break;
					case 3: $action="manage_uesr"; //module users
					break;
					case 4: $action="insert_member"; //module users
					break;
					case 5: $action="edit_user"; //module users
					break;
					case 6: $action="delete_user"; //module users
					break;
					case 7: $action="update_user"; //module users
					break;
					case 8: $action="edit_all"; //module users
					break;
					case 9: $action="update_userall"; //module users
					break;
					case 10: $action="deteil_user"; //module users
					break;
					case 11: $action="register_form"; //module users
					break;
					case 12: $action="form_case"; //module Case
					break;
					case 13: $action="insert_case"; //module Case
					break;
					case 14: $action="manage_sch"; //module Case
					break;
					case 404: $action="404";
					break;
					default: $action="404";
					break;
					
				}

				

		}
		if($module == "404" || $action == '404'){
			$module = '404';
			$action = '404';
			echo "<script>window.location = '$module/$action.html' </script>";
		}else{
			include("module/$module/$action".".php");
		}
		

		}


?>

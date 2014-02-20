<?php
	require_once("exec_cmd.php");
	$level2 = explode('"', $_POST['cli-exec']);
	$level = explode(" ", $level2[0]);
	$cmd = explode(" ", $_POST['cli-exec']);
	switch($cmd[0]){
		
		/*
		 * @TODO:
		 *
		 * - trigger the new command under exec_cmd.php
		 */
		case "new":
			if(isset($level[1])){$post_type = $level[1];}else{$post_type = "";}
			if(isset($level2[1])){$post_title = $level2[1];}else{$post_title = "";}
			Genie_Exec::new_command($post_type, $post_title);
			break;
		
		/*
		 * @TODO:
		 *
		 * - trigger the find command under exec_cmd.php
		 */
		case "find":
			if(isset($level[1])){$post_type = $level[1];}else{$post_type = "";}
			if(isset($level2[1])){$query = $level2[1];}else{$post_title = "";}
			Genie_Exec::find_command($post_type, $query);
			break;
		
		/*
		 * @TODO:
		 *
		 * - trigger the replace command under exec_cmd.php
		 */
		case "replace":
			$find = str_replace('"', '', $level2[1]);
			$replace = str_replace('"', '', $level2[3]);
			$field = "content";
			if($cmd[count($cmd)-2] == "content" || $cmd[count($cmd)-2] == "title"){
				$field = $cmd[count($cmd)-2]; 
			}else if($cmd[count($cmd)-1] == "content" || $cmd[count($cmd)-1] == "title"){
				$field = $cmd[count($cmd)-1];
			}
			$post_type = "*";
			if($cmd[count($cmd)-1] == "post" || $cmd[count($cmd)-1] == "page"){ $post_type = $cmd[count($cmd)-1]; }
			Genie_Exec::replace_command($find, $replace, $field, $post_type);
			break;
		
		/*
		 * @TODO:
		 *
		 * - trigger the backup command under exec_cmd.php
		 */
		case "backup":
			Genie_Exec::backup_command();
			break;
		
		/*
		 * @TODO:
		 *
		 * - trigger the clean command under exec_cmd.php
		 */
		case "clean":
			if(isset($cmd[1])){
				Genie_Exec::clean_command($cmd[1]);
			}else{
				Genie_Exec::clean_command();
			}
			break;
		
		default:
			Genie_Exec::error_message($level[0]);
			break;
	}
?>
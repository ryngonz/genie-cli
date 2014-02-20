<?php
	class Genie_Exec{
		
		/*
		 * @TODO:
		 *
		 * - function for new_command
		 * - params(string post_type, string post_title)
		 */
		function new_command($post_type, $post_title){
			if(!post_type_exists($post_type)){
				$msg = "Custom post type is not recognized. Please try again.";
				$err = "err";
				Genie_Exec::notice_message($msg, $err);
				return;
			}
			$post_title = stripslashes($post_title);
			header("location: ".admin_url('post-new.php?post_type='.$post_type.'&post_title='.$post_title));
		}
		
		/*
		 * @TODO:
		 *
		 * - function for find_command
		 * - params(string post_type, string query)
		 */
		function find_command($post_type, $query){
			if(!post_type_exists($post_type)){
				$msg = "Custom post type is not recognized. Please try again.";
				$err = "err";
				Genie_Exec::notice_message($msg, $err);
				return;
			}
			$query = stripslashes($query);
			header("location: ".admin_url('edit.php?s='.$query.'&post_type='.$post_type.'&post_status=all'));
		}
		
		/*
		 * @TODO:
		 *
		 * - function for replace_command
		 * - params(string find, string replace,string post_type)
		 */
		function replace_command($find, $replace, $field="content",$post_type="*"){
			$find = stripslashes($find);
			$replace = stripslashes($replace);
			
			if($post_type != '*'){
				if(!post_type_exists($post_type)){
					$msg = "Custom post type is not recognized. Please try again.";
					$err = "err";
					Genie_Exec::notice_message($msg, $err);
					return;
				}
				$pt_query = " WHERE post_type='".$post_type."'";
			}else{
				$pt_query = "";
			}

			if(mysql_query("UPDATE wp_posts SET post_".$field." = REPLACE (post_".$field.",'$find','$replace')".$pt_query)){ 
				$msg = "Records successfully updated.";
				$err = "notice";
			}else{
				$msg = "There was an error while we update your record. Please try again.";
				$err = "err";
			}
			
			Genie_Exec::notice_message($msg, $err);
		}
		
		/*
		 * @TODO:
		 *
		 * - function for clean_command
		 * - params(string post_type)
		 */
		function clean_command($post_type="*"){
			if($post_type != '*'){
				if(!post_type_exists($post_type)){
					$msg = "Custom post type is not recognized. Please try again.";
					$err = "err";
					Genie_Exec::notice_message($msg, $err);
					return;
				}
				$pt_query = " AND post_type='".$post_type."'";
			}else{
				$pt_query = "";
			}
			
			if(mysql_query("DELETE FROM wp_posts WHERE post_status='trash' OR post_status='auto-draft'".$pt_query)){ 
				$msg = "Database has been cleaned.";
				$err = "notice";
			}else{
				$msg = "There was an error while we update your record. Please try again.";
				$err = "err";
			}
			
			Genie_Exec::notice_message($msg, $err);
		}
		
		/*
		 * @TODO:
		 *
		 * - function for backup_command
		 * - params(string tables)
		 */
		function backup_command($tables='*'){
			//get all of the tables
			if($tables == '*')
			{
				$tables = array();
				$result = mysql_query('SHOW TABLES');
				while($row = mysql_fetch_row($result))
				{
					$tables[] = $row[0];
				}
			}
			else
			{
				$tables = is_array($tables) ? $tables : explode(',',$tables);
			}
			
			//cycle through
			foreach($tables as $table)
			{
				$result = mysql_query('SELECT * FROM '.$table);
				$num_fields = mysql_num_fields($result);
				
				$return.= 'DROP TABLE '.$table.';';
				$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
				$return.= "\n\n".$row2[1].";\n\n";
				
				for ($i = 0; $i < $num_fields; $i++) 
				{
					while($row = mysql_fetch_row($result))
					{
						$return.= 'INSERT INTO '.$table.' VALUES(';
						for($j=0; $j<$num_fields; $j++) 
						{
							$row[$j] = addslashes($row[$j]);
							$row[$j] = ereg_replace("\n","\\n",$row[$j]);
							if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
							if ($j<($num_fields-1)) { $return.= ','; }
						}
						$return.= ");\n";
					}
				}
				$return.="\n\n\n";
			}
			
			//save file
			$filename = '../db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
			$handle = fopen($filename,'w+');
			fwrite($handle,$return);
			fclose($handle);
			header('Content-Type: application/octet-stream');
			header("Content-Transfer-Encoding: Binary"); 
			header("Content-disposition: attachment; filename=\"" . basename($filename) . "\""); 
			readfile($filename);
			unlink($filename);
		}
		
		/*
		 * @TODO:
		 *
		 * - function for error_message
		 * - params(string cmd)
		 */
		function error_message($cmd){
			echo "<script>function hide_err(){jQuery('#genie-err-container').fadeOut();}</script>";
			echo "<div id='genie-err-container' class='genie-err' onclick='hide_err()'>";
			echo "'".$cmd."' command is not recognized. Please try again. <span style='cursor:pointer'>(Click here to hide)</span>";
			echo "</div>";
		}
		
		/*
		 * @TODO:
		 *
		 * - function for notice_message
		 * - params(string mes, string err)
		 */
		function notice_message($mes, $err){
			echo "<script>function hide_notice(){jQuery('#genie-".$err."-container').fadeOut();}</script>";
			echo "<div id='genie-".$err."-container' class='genie-err' onclick='hide_notice()'>";
			echo "$mes <span style='cursor:pointer'>(Click here to hide)</span>";
			echo "</div>";
		}
	}
?>
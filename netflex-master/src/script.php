<?php
echo "<br/>________________________________________ lala";
mysql_select_db("database",$bdd);
$result = mysql_query("SELECT * FROM genres",$bdd);
$num_rows = mysql_num_rows($result);
?>
<table id = "themes_table">
					<?php
						if (!$res = $link->query($sql)) {
            				trigger_error('Error in query ' . $link->error);
       					} else {
            				while ($row = $res->fetch_assoc()) {
            				$id = '"'+$row['id']+'"';
    				?>
    				<tr>
						<td>
							<input type = "checkbox" name = <? $id ?> value = <? $id ?>/>
						</td>
						<td>
							<?php echo $row['name']?>
						</td>
					</tr>
					<?php } ?>
</table>

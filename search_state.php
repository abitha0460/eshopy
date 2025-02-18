<?php
//$cert_type=$_POST['cert_type'];

$country=$_POST['country'];


				  require('connection.php');
				 
				  $res=$con->query("select * FROM `states` where country_id='$country'");
				 

$count=$res->num_rows;



if($count>0){
	while ($rows = $res->fetch_assoc()) {
	?>
	
	

	

<option value="<?php echo $rows['stat_id'];  ?>"><?php echo $rows['sname']; ?></option>

             <?php
}

}


else{
	
	echo "No Results";
}
				 
				  
				  ?>
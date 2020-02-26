
<?php
include('../includes/dbcon.php');
if($_POST['id']){
$id=$_POST['id'];
if($id==0){
 echo "<option>Select Schools</option>";
}else{
 $sql = mysqli_query($con,"SELECT * FROM `schools` WHERE agent_id='$id'");
 while($row = mysqli_fetch_array($sql)){
 echo '<option value="'.$row['id'].'">'.$row['sch_name'].'</option>';
 }
 }
}
?>
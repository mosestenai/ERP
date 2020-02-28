<html>	
  <body>
  <h1 align = "middle"><font color ="grey">LAIKIPIA</font>  <font color = "red">UNIVERSITY</font></h1><br><br>
    
	<?php
	  $selector = $_GET["selector"]; //checking the token inside the url
	  $validator = $_GET["validator"]; 
	  //checking if there exist a token
	  if (empty($selector) || empty($validator)) {
	    echo "could not validate your requests";
	  }//checking if the tokrns are legit
	  else{
	    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
		 ?>
		 <form action ="reset_linkk.php" method="post">
		   <input type="hidden" name="selector" value="<?php echo $selector ?>">
		   <input type="hidden" name="validator" value="<?php echo $validator ?>">
		   <input type="password" name="pwd" placeholder="Enter a new password,,">
		   <input type="password" name="pwd-repeat" placeholder="Repeat new password,,">
		   <button type="submit" name="reset-linkk-submit">Reset password</button>
		</form>
		 <?php
		}
	  }
	
	?>
    </form>
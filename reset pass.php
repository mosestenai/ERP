<html>	
<link rel="stylesheet" type="text/css" href="style.css">
  <body>
  <h1 align = "middle"><font color ="grey">LAIKIPIA</font>  <font color = "red">UNIVERSITY</font></h1><br><br>
    <form method="post" action="send_linkk.php">
	<h2> Forgot your<br>
password?</h2><br><br>
	  <h4><font color = "grey">Enter your <br>
Email/employer<br>
Email</font></h4><br>
      <div class="input-group">
	  <label>Employee/Students email</label>
	  <input type="text" name="email"></div>
	  <div class="input-group">
      <button type="submit" name="submit_email">SUBMIT</button>
	  </div>
    </form>
	<?php
	  if (isset($_GET["reset"])){//checks the url for a reset GET parameter
	   if ($_GET["reset"] == "success"){
	    echo '<p class="signup success">Check your email!</p>';
	   }
	  }
	  ?>
  </body> 
</html>

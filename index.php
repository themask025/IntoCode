<?php
include "connection.php";
?>

 





<html>
<?php

include './Includes/Navigation.php';

?>
<head>
    <title>IntoCode</title>
    <link rel="stylesheet" href="<?=$page_path ?>CSS/Main.css">
</head>
<body>
<div class="background-wrap">
  <video id="video-bg" preload="auto" autoplay="true" loop="loop" muted="muted">
  <source src="<?= $page_path ?>Pictures/Code_vid.mov" type="video/mp4">
   Video not supported 
  </video>
  

  <div class="content">         
			<h1> 
        <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])) 
        {if(isset($_SESSION['user']))echo 'Welcome back, '.$_SESSION['user'].'!</h1><p>We are happy to see you again!</p>';
            else echo 'Welcome back, '.$_SESSION['admin'].'!</h1><p>We are happy to see you again!</p>';}

        else {echo 'Welcome, Unregistered User!</h1>';}
        ?>
			
    </div>
    </div>

</body>
</html>
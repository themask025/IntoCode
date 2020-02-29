<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?=$page_path ?>CSS/Nav_Style.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 </head>
<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">IntoCode</label>
    <ul>
      <li><a class="active" href="<?= $page_path?>index.php">Начало</a></li>
      <li><a href="<?= $page_path?>Pages/tutorials/Tutorials_page.php">Уроци</a></li>
      <li><a href="<?= $page_path?>Pages/JS_Translator.php">Транслатор</a></li>
      <li><a href="#">Контакти</a></li>
      <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])) { ?>
      <li><a href="<?= $page_path?>Pages/Logout.php">Отписване 
      <?php }else{ ?>
      <li><a href="<?= $page_path?>Pages/Sign_inup_page.php">Вписване
      <?php }?>
      </a></li>
      <?php if( isset($_SESSION['admin'])) { ?>
      <li><a class="active" href="<?= $page_path?>Pages/Admin_power.php">АДМИН</a></li>
      <?php }else{ ?>

      <?php }?>
    </ul>
  </nav>
</body>

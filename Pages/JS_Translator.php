<?php
include "../connection.php";
if(!isset($_SESSION['admin']) && !isset($_SESSION['user']))
{
    header('Location: Sign_inup_page.php');
}
?>

 

<?php
include "../Includes/Navigation.php"
?>



<html>

<head>
    <title>IntoCode</title>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="../CSS/Translator.scss" type="text/css">
</head>
<body>

    <div class="Main_Container">
        <div class="box">
        <div  class="icon">
            <i class="ion-information-circled"></i>
            <span>ако (#text1) тогава -> if(#text1)<br>
                докато (#text1) тогава ->  while(#text1){<br>
                иначе ->  }else{<br>
                край ->  }<br>
                отпечатай (#text1) -> \$(\"#execOutput\").append((#text1))+\"\\r\\n\");<br>
                (#text1)=попитай (#text2) ->  (#text1)=prompt(#text2);<br>
                променлива (#text1) ->  var (#text1);<br>
                (#text1) ->  (#text1);</span>
        </div>
        </div>
        <header class="header" >
                <input class="switch" type="checkbox" id="switch" name="theme" /><label class="darkb" for="switch">Toggle</label>
        
        
        
<form action="" method="POST" id="formSubmitCode">
    <div class="form-group">
         <label for="code" style="margin-left: 20px;">Въведете код:</label>
         <textarea class="form-control" name="code" id="code" style="min-height:300px; width: 100%; border-radius: 15px; margin: auto;">
        <?=isset($_REQUEST['code'])?$_REQUEST['code']:""?>
    </textarea>
    </div>
    <input type="Submit" value="Транслирай и изпълни" class="form-control" style="width: 100%; min-height: 50px; border-radius: 15px; margin: auto;">
    
    
</form>
<div class="alert alert-primary" role="alert">
    Резултат транслирането:
    <pre><code>
<?=isset($_REQUEST['code'])?  CrossTranslate($_REQUEST['code']):""?>
    </code></pre>
</div>
<div class="alert alert-primary" role="alert">
    <p>Резултат от изпълнението:</p>
    
    <pre><code id="execOutput">

    </code></pre>
    <script>
    <?=isset($_REQUEST['code'])?  CrossTranslate($_REQUEST['code']):""?>
    </script>
</div>

    </div>

<body>
</html>
<script src="../JS/Button change dark light js.js"></script>

<?php


            function CrossTranslate($text){

                $text1="";

                $transform=[
                    "ако (.+) тогава"=>"if($1){",
                    "докато (.+) тогава"=>"while($1){",
                    "иначе"=>"}else{",
                    "край"=>"}",
                    "отпечатай *(.+)"=>"\$(\"#execOutput\").append($1+\"\\r\\n\");",
                    "(.+) *= *попитай *(.+)"=>"$1=prompt($2);",
                    "променлива *(.+)"=>"var $1;",
                    "(.+)"=>"$1;"
                ];
                foreach(explode("\n", $text) as $i=>$line){
                    $line=trim($line);
                    $line1="";
                    $count=0;
                    foreach($transform as $idx=>$val)
                    {    
                        $line1=preg_replace("/".$idx."/", $val, $line, -1, $count);
                        if($count) break;
                    }
                    $text1.=(($count>0)?$line1:$line)."\r\n";
                    
                }
                    return $text1;
            }

?>
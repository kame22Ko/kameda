<?php
ession_start ();
if(isset($_SESSION['name'])){
    echo "ようこそ、".$_SESSION['name']."さん！";
  }else{
    header('Location:login.html');
    exit;

}
?>
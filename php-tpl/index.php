<?php  
require 'libs/Smarty.class.php';  
$smarty = new Smarty;  
$smarty->debugging = true;  
$smarty->caching = true;  
$smarty->cache_lifetime = 120;  

  
$smarty->assign("project_name", "PHP (TPL) Smarty Template Example");  
$smarty->assign("name", "Abdul Hafeez ");  
$smarty->assign("list_of_names", array("John", "Mary", "James", "Henry"));   

  
$smarty->display('templates/index.tpl');
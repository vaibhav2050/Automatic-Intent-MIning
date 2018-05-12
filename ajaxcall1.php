<?php session_start();

	  //$_SESSION['my_array']=array();

      //$_SESSION['my_array']=$_POST['data'];
     

    if(!is_array($_SESSION['my_array']))
    {
      $_SESSION['my_array'] = array();
    }

    else{
      array_push($_SESSION['my_array'],$_POST['data']);
      echo "data stored in session";
     foreach($_SESSION['my_array'] as $key=>$val){ 
    // Here $val is also array like ["Hello World 1 A","Hello World 1 B"], and so on
    // And $key is index of $array array (ie,. 0, 1, ....)
    foreach($val as $k=>$v){ 
            echo $v . '<br />';
        }
      }
    }

?>

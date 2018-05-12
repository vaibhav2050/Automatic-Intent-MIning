<?php session_start(); ?>
<html>
<header>
	<link rel="stylesheet" href="lastcss9.css" type="text/css" />
 
  <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js" type="text/javascript"></script>
  <script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>
  
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</header>
<body>

<div id="wrapper"> 


  <div id="left">

  <div id="history" class="panel-body context">  
  <span id="heading"> Recent Search </span>


 
        <div id="recent">
            <ul id="recentlist">

                 <?php  foreach($_SESSION['total_elements'] as $key => $val) { ?>

                <li><?php echo $val ;    //word-wrap: break-word; ?></li>
               
               <?php } ?>
            </ul>
        </div>
        

</div>



	</div>


	<div id="middle">

		<div id = "input">
		<span id="heading">Search Box</span>

  




<div id="main">
  <div id="sidebar"><div id="chart_div2" ></div></div>
  <div id="page-wrap"><div class="panel panel-default">
      <form action="index.php" method="post">
           <input  id= "inputQuery" class="form-control input-sm" type="text"  
           value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" 
           name="keyword" placeholder="Type Your Query Here" size="50">
           <button class = "button" id = "button"><span id="buttonheading">Search</span><button class="button" onclick="ending()"><span id="buttonheading">End</span>
           <script type="text/javascript">
function ending()
{

<?php //session_destroy();
//session_start();
?>

}

           </script>
      </form>
            
 </div></div>
</div>
<style type="text/css">
#main { 
    width: 800px;
    margin: 0 auto;
}
#sidebar    {
    position: absolute;
    top: 10px;
    width: 300px;
    height: 80px;
    margin-left: 5px;
    float: left;

}

#page-wrap  {
  position: absolute;
  left: 80px;
  top: 35px;
    width: 600px;
    height: 80px;
    margin-left: 100px;

}
</style>

<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/mark.js/8.1.1/mark.min.js"></script>

<style type="text/css">
body {
  margin: 15px;
}

div.search span,
div.search input[name="keyword"] {
  display: block;
}

div.search input[name="keyword"] {
  margin-top: 4px;
}

div.panel {
  margin-bottom: 15px;
}

div.panel .panel-body p:last-child {
  margin-bottom: 0;
}

mark {
  padding: 0;
}

</style>








<script type="text/javascript">
// Create an instance of mark.js and pass an argument containing
// the DOM object of the context (where to search for matches)
var markInstance = new Mark(document.querySelector(".context"));
// Cache DOM elements
var keywordInput = document.querySelector("input[name='keyword']");
var optionInputs = document.querySelectorAll("input[name='opt[]']");

function performMark() {

  // Read the keyword
  var keyword = keywordInput.value;

  // Determine selected options
  var options = {};
  [].forEach.call(optionInputs, function(opt) {
    options[opt.value] = opt.checked;
  });

  // Remove previous marked elements and mark
  // the new keyword inside the context
  markInstance.unmark().mark(keyword, options);
};

// Listen to input and option changes
keywordInput.addEventListener("input", performMark);
for (var i = 0; i < optionInputs.length; i++) {
  optionInputs[i].addEventListener("change", performMark);
}


</script>
      </div>

		<div id="result">
		<span id="heading">result section</span>
         
         
      
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>

<script>
$(document).ready(function(){


    $(document).on('click','.button' , function() {
           
      
    //  alert();


        var tableControl= document.getElementById('myTable');
        var arrayOfValues = [];
        var arrayOfValues1 = [];
        var feedback = [];
        var recordstitle = [];
        var recordsabstract = [];

          arrayOfValues =  $('input:checkbox:checked', tableControl).map(function() {
             recordstitle.push($(this).closest('tr').find('td:last').text());
             //alert(recordstitle);
             
        });



        $.post('ajaxcall1.php',{data:recordstitle}, function(response){
    // alert(response);

     });

var str = "";
   var putfeedback;
    arrayOfValues1 =  $('input:radio:checked', tableControl).map(function() {
            
             var str1 = $(this).closest('tr').next('tr').next('tr').find('td:first').text();
             //recordstitle.push($(this).closest('tr').next('tr').next('tr').find('td:first').text());
             //recordsabstract.push($(this).closest('tr').siblings('tr').find('td:first').text());
             //alert($(this).closest('tr').find('td:last').text());
              
            str = str.concat(str1);

            str = str.replace(/(\r\n|\n|\r)/gm,"");
            str = str.replace(/\s+/g,"");
            //alert(str);
            //alert("dd");
            feedback = str.split(',');

            //alert(feedback);

            feedback = sortByFrequencyAndRemoveDuplicates(feedback);
            //alert(feedback);

            putfeedback = feedback.slice(0, 2);

               //putfeedback.toString();
               //alert(putfeedback);
           // alert(putfeedback);


        });

    var putf = putfeedback.join(",");
    //alert(putf);

    $("#inputQuery").val(putf);


    //var array = ["hello","world"];
  // $.post('final6.php',{data:putfeedback}, function(response){
    // alert(response);
      //window.location.href = 'final3.php'
     

    
  // });


function sortByFrequencyAndRemoveDuplicates(array) {
    var frequency = {}, value;

    // compute frequencies of each value
    for(var i = 0; i < array.length; i++) {
        value = array[i];
        if(value in frequency) {
            frequency[value]++;
        }
        else {
            frequency[value] = 1;
        }
    }

    
    // make array from the frequency object to de-duplicate
    var uniques = [];
    for(value in frequency) {
        uniques.push(value);
    }

    // sort the uniques array in descending order by frequency
    function compareFrequency(a, b) {
        return frequency[b] - frequency[a];
    }

    return uniques.sort(compareFrequency);
}



    });

    
});
</script>

<?php 
 

 ?>

<?php
error_reporting(0);
$servername = "localhost:8080";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "papersdb";
$datatable = "paperdetails"; // MySQL table name
$results_per_page = 10; // number of results per page
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>



<?php 
$sql = "SELECT COUNT(title) AS total FROM ".$datatable;

$result = $conn->query($sql);
$row = $result->fetch_assoc();
//$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  
//for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
  //          echo "<a href='main2.php?page=".$i."'";
   //         if ($i==$page)  echo " class='curPage'";
     //       echo ">".$i."</a> "; 
//};
?>


<?php
//if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
//$start_from = ($page-1) * $results_per_page;

//$sql2 = "SELECT title,abstract FROM ".$datatable." LIMIT $start_from, ".$results_per_page;
//$sql2="INSERT INTO nametable (fname, lname) VALUES ('$_POST[query]','$_POST[lname]')";
//echo $_POST[query];
//$sql2 = "SELECT title,abstract FROM paperdetails WHERE CONTAINS(title, Kernelized) "; 

//$sql2 = "SELECT title,abstract,keywords FROM paperdetails WHERE title REGEXP '[[:<:]]$_POST[keyword][[:>:]]' LIMIT $start_from, ".$results_per_page;
//$inputuser = $_POST['keyword'];
//$myArray = explode(',', $inputuser);
//print_r($myArray);
$inputuser = $_POST['keyword'];
$inputuser = stopWords($inputuser, $stopwords);
//print_r($inputuser);
//print_r($inputuser);
//$wherein = explode(',', $inputuser);
//print_r($wherein);
//print_r($wherein);
//$iarray = "'" . implode("','", $wherein) . "'";
//print_r($iarray);

//$query=mysqli_query($conn, "SELECT name FROM users WHERE id IN ('".$array."')");
//print_r($array);
//$sql2 = "SELECT title,abstract,keywords FROM paperdetails WHERE title REGEXP '[[:<:]][$iarray][[:>:]]'";
//$query="SELECT * FROM posts WHERE user_id IN ({implode(',', $userIDarray})";
$var1 =  $_POST['keyword']; 
 // $tags = array(2,4,6);

     // $sql2 = "SELECT title,abstract,keywords FROM paperdetails WHERE title regexp $wherein ";
   $tags = $inputuser;
   $sql2 = 'SELECT title,abstract,keywords FROM paperdetails WHERE ';
   foreach($tags as $i=>$tag) {
       if ($i>0) $sql2.=' or ';  // or and?
       $sql2.='title like "%'.$tag.'%"';
   }
//$_SESSION['total_elements'] = array();
//array_push($_SESSION['total_elements'], $_POST["query"]);
//print_r($_SESSION);



if (!isset($_SESSION['total_elements'])) {
    $_SESSION['total_elements'] = array();
    $_SESSION['total_elements'][0] = null;

}

if (!isset($_SESSION['keepin'])) {
    $_SESSION['keepin'] = array();
    $_SESSION['keepin'] = null;

}

$query = $_POST['keyword'];

if (!empty($query)){

  array_push($_SESSION['total_elements'], $query);

}

if (!isset($_SESSION['retrivedRecords'])) {
    $_SESSION['retrivedRecords'] = array();
           $_SESSION['retrivedRecords'][0] = null;

}

if (!isset($_SESSION['retrivedTitles'])) {
    $_SESSION['retrivedTitles'] = array();
    $_SESSION['retrivedTitles'][0] = null;

}
//$sql2 = "SELECT title,abstract FROM ".$datatable." WHERE CONTAINS(title, '$_POST[query]') LIMIT $start_from, ".$results_per_page ; 
$rs_result = $conn->query($sql2);

/*$storeArray = Array();
while ($row = mysql_fetch_array($rs_result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['keywords'];  
}*/





?> 

<?php

$stopwords = file('stop_words.txt');

function stopWords($text, $stopwords) {

  // Remove line breaks and spaces from stopwords
  $stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);

  // Replace all non-word chars with comma
  $pattern = '/[0-9\W]/';
  $text = preg_replace($pattern, ',', $text);

  // Create an array from $text
  $text_array = explode(",",$text);

  // remove whitespace and lowercase words in $text
  $text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);

  foreach ($text_array as $term) {
    if (!in_array($term, $stopwords)) {
      $keywords[] = $term;
    }
  };

  return array_filter($keywords);
}



  



?>

 <table border="1" cellpadding="4" class="myTable">
    <tr><th colspan ="3">Selected Results</th></tr>
      <?php  
    //print_r($_SESSION['my_array']);
      // print_r($_SESSION['my_array1']);

         foreach($_SESSION['my_array'] as $key=>$val){ 
    // Here $val is also array like ["Hello World 1 A","Hello World 1 B"], and so on
    // And $key is index of $array array (ie,. 0, 1, ....)
    foreach($val as $k=>$v){ 
            ?> <tr><td colspan = "3" bgcolor="red" class ="displaykeep"><input type="image" src="http://project:8000/e.png" style="height:15px; width:12px;"  ><strong><font color="#081305" size="2px"> <?php echo $v . '<br />'; 
            ?> </td></tr> <?php
        }
      }
    ?>
   
   </font></strong></td></tr>

   <tr>
    <th>+/-</th>
    <th>i/o</th>
    <th>Search Results</th>
  </tr>

  <tr id="getrow">
    <?php $counter = 0;
    $keywords = Array();
  
       $foundAgain=0;
          $found=0;
    while($row = $rs_result->fetch_assoc()) {
    ?> 
        <td rowspan="3">


        <input type="image" src="img/yes.png" style="height:10px; width:10px;"><input class="positive" id="positive" type="radio" style="height:18px; width:18px;">

<script type="text/javascript">

$(document).on('dblclick','.positive',function(){
    if(this.checked){
        $(this).prop('checked', false);
                    $(this).closest("td").css('background-color', '#95a2e5');

    }
});



</script>
         <script type="text/javascript">$(".positive").click(function() {
  

       $(function(){
    $( "input[type=radio]" ).on( "click", function(){
        if($(this).is(':checked')){
            $(this).closest("td").css('background-color', '#E4DB05');

              <?php  //array_push($_SESSION['keepin'],  $row["title"]); ?>

          }
        else
            $(this).closest("td").css('background-color', '#95a2e5');
            

    });
  



  });



  });</script>
          <input  class = "negative" id="negative" type="radio"  style="height:18px; width:18px " onclick="negativeFeedback()">
          <input type="image" src="img/no.png" style="height:10px; width:10px;">

        </td>

          <script type="text/javascript">

$(document).on('dblclick','.negative',function(){
    if(this.checked){
        $(this).prop('checked', false);
                    $(this).closest("td").css('background-color', '#cdd3f2');

    }
});



</script>
    <script type="text/javascript">$(".negative").click(function() {
  

       $(function(){
    $( "input[type=radio]" ).on( "click", function(){
        if($(this).is(':checked')){
            $(this).closest("td").css('background-color', '#ff4d4d');


              <?php  //array_push($_SESSION['keepin'],  $row["title"]); ?>

          }
        else
           
           $(this).closest("td").css('background-color', '#cdd3f2');

            
    });
  



  });



  });</script>

 
        
        <td rowspan="3" class="checkboxed"><input type="checkbox" style="height:20px; width:20px;" name="keep"></td>

        <script type="text/javascript">$(".checkboxed").click(function() {
  

       $(function(){
    $( "input[type=checkbox]" ).on( "click", function(){
        if($(this).is(':checked')){
            $(this).closest("td").css('background-color', '#E4DB05');

              <?php  //array_push($_SESSION['keepin'],  $row["title"]); ?>

          }
        else
           {
               
           $(this).closest("td").css('background-color', '#cdd3f2');

            }


    });
  



  });



  });</script>
      

      <style type="text/css">

      td.red-cell {
        background: #11af19; /* Or some other color */
    }

      </style>
       
        <?php $keywords[] = $row["keywords"]; $counter++;  
       
          foreach ($_SESSION['retrivedTitles'] as $key => $value) {
 
          if($value ==  $row["title"])
            {
                 $found = 1;
                  $foundAgain++;

                    break;

            }
        }

if($found==0){

        array_push($_SESSION['retrivedTitles'],  $row["title"]); }

        $found=0;
    

?>



    <td class="displaytitle" id="displaytitle"><strong><?php echo $row["title"];    ?></strong></td></tr>
    <tr><td class="displayabstract" ><?php echo $row["abstract"]; ?></td></tr>

   



     

    <tr><td bgcolor="#5063af"><strong><font color="#10193d" > <?php  $text=$row["keywords"]; $i=0;
    $keywordsFetched = stopWords($text, $stopwords);
    foreach ( $keywordsFetched as $key => $value) {

      if($i<6) { echo $value; echo "," ;$i++;} else {break;} 

    }

$i=0; ?> 


</font></strong></td></tr>
    <?php 
    }; 
    if (!empty($counter)){

    array_push($_SESSION['retrivedRecords'], $counter);

}
    
$reRetrivedRecords = Array();
$reRetrivedRecords = $_SESSION['retrivedRecords'];

   ?> 

  
</table>




		</div>

	</div>

  

  
	<div id="keyword">
	<span id="heading">Suggested Keywords</span>


  <?php

// Read:
//$s = strtolower(file_get_contents("text.txt"));
//$s = strtolower($keywords);
foreach ($keywords as $key) {
   // echo "$value <br>";
    $s .= ' ' .$key;
    //echo "$s";
}
//print_r($s);
// Split:
//$a = preg_split('/[^a-z]/', $s, -1, PREG_SPLIT_NO_EMPTY);
$a = preg_split("/[\s,]+/", $s);


// Remove unwanted words:
$a = array_filter($a, function($x){
       return !preg_match("/^(.|the|and|of|to|it|in|or|is)$/",$x);
     });

// Count:
$a = array_count_values($a);

// Sort:
arsort($a);
// Pick top 22:


$a1 = Array();
$a1=array_slice($a,0,30);
$a=array_slice($a,0,10);
//echo $a1;

?>

 
    
<div id="piechart" ></div>

<?php 

$myarray = array();

$myarray = $a;

//$data_array[] = array('keywords', 'frequency');

// array to populate data
foreach($myarray as $k=>$val) {
    $data_array[] = array($k, $val);
}



//echo $cart_info_json;

$data = json_encode($myarray);


?>

 <script type="text/javascript">

var obj = JSON.parse('<?= $data; ?>');
//alert("There are " + obj.learning);

var p = {a: 1, b: 6};

var iMax = 10;
var f = new Array();
f = [['Keywords', 'frequency']];

var i = 1;
  
  for (var key in obj) {
   
   //alert(i);
   f[i]=new Array(2);
   f[i][0] = key;
   f[i][1] = obj[key];
      //alert(f[i][0]);
      i++;

   //alert(key);

}



</script>

<!--
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable(f);

        var options = {
          width:'20px',
          backgroundColor: '#ffffff',
      colors:["#5e1735","#931148","#bc2f75","#dd688d","#ed95b1"],
      pieSliceText:['none'],
      chartArea:{left:8,top:6,width:"100%",height:"100px"}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
 
    <script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js" type="text/javascript"></script>
 
    <script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/jquery.bgiframe-2.1.2.js"
        type="text/javascript"></script>
 
    <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js"
        type="text/javascript"></script>
 
    <script type="text/javascript">
        $(function() {
            $("#keywordstopick li").draggable({
                appendTo: "body",
                helper: "clone",
                cursor: "move",
                revert: "invalid"
            });
 
            initDroppable($("#inputQuery"));
            function initDroppable($elements) {
                $elements.droppable({
                    activeClass: "ui-state-default",
                    hoverClass: "ui-drop-hover",
                    accept: ":not(.ui-sortable-helper)",
 
                    over: function(event, ui) {
                        var $this = $(this);
                    },
                    drop: function(event, ui) {
                        var $this = $(this);
                        if ($this.val() == '') {
                            $this.val(ui.draggable.text());
                        } else {
                            $this.val($this.val() + "," + ui.draggable.text());
                        }
                    }
                });
            }
        });
    </script>
 


   
       
      <div class ="keywordstopick" id="keywordstopick" style="width: 270px; height: 550px;>

                    <span id="heading1">Select keywords for query reformulation</span>

            <ul>
                <li id="node1" style  ="background-color:#c4cbed;"><?php print_r(key($a1)); next($a1);  ?></li>
                 <li id="node2" style  ="background-color:#c4cbed;"><?php print_r(key($a1)); next($a1);  ?></li>
                  <li id="node3" style  ="background-color:#c4cbed;"><?php print_r(key($a1)); next($a1); ?></li>
                   <li id="node4" style  ="background-color:#c4cbed;"><?php print_r(key($a1)); next($a1); ?></li>
                    <li id="node5" style  ="background-color:#c4cbed;"><?php print_r(key($a1)); next($a1);?></li>
                     <li id="node6" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>
                      <li id="node7" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>
                       <li id="node8" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>
                        <li id="node9" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1);?></li>
                         <li id="node10" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>
                         <li id="node11" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1);  ?></li>&nbsp;
                 <li id="node12" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1);  ?></li>&nbsp;
                  <li id="node13" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                   <li id="node14" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                    <li id="node15" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1);?></li>&nbsp;
                     <li id="node16" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                      <li id="node17" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                       <li id="node18" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                        <li id="node19" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1);?></li>&nbsp;
                        <li id="node20" style  ="background-color:#c4cbed;opacity: 0.9;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                         <li id="node21" style  ="background-color:#c4cbed;opacity: 0.8;"><?php print_r(key($a1)); next($a1);  ?></li>&nbsp;
                 <li id="node22" style  ="background-color:#c4cbed;opacity: 0.8;"><?php print_r(key($a1)); next($a1);  ?></li>&nbsp;
                  <li id="node23"style  ="background-color:#c4cbed;opacity: 0.8;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                   <li id="node24" style  ="background-color:#c4cbed; opacity: 0.8;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                    <li id="node25" style  ="background-color:#c4cbed; opacity: 0.8;"><?php print_r(key($a1)); next($a1);?></li>&nbsp;
                     <li id="node26"style  ="background-color:#c4cbed; opacity: 0.5;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                      <li id="node27" style  ="background-color:#c4cbed; opacity: 0.5;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                       <li id="node28" style  ="background-color:#c4cbed; opacity: 0.5;"><?php print_r(key($a1)); next($a1); ?></li>&nbsp;
                        <li id="node29" style  ="background-color:#c4cbed; opacity: 0.5;"><?php print_r(key($a1)); next($a1);?></li>&nbsp;
                            <li id="node30" style  ="background-color:#c4cbed; opacity: 0.5;"><?php print_r(key($a1)); next($a1);?></li>&nbsp;
                          
            </ul>
        
        </div>

     <style type="text/css">

 #heading1 {
    
  margin: 10px 0px 0px 25px;
  font-weight: normal;
  position: relative;
  text-shadow: 0 -1px rgba(0,0,0,0.6);
  font-size: 12px;
  line-height: 40px;
  background: #243793;

  border: 1px solid #fff;
  padding: 5px 5px;
  color: white;
  border-radius: 0 10px 0 10px;
  box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
  font-family: 'Muli', sans-serif;

}
.keywordstopick{
position: absolute;
bottom: 1px;
right: 20px;
width: 100%;
}
.keywordstopick>ul
{
    list-style-type: none;
    text-align: center;
     color: #0f1844;
}
.keywordstopick>ul>li
{
    display: inline-block;
    font-size: 10px;
    margin:3px 0px;
    padding: 2px;
   border:1px solid #cedf90;
   border-radius: 10px;
    text-decoration: none;
    display: inline-block;
    
    box-shadow: rgba(0,0,0,10)  2px 2px;
}

.keywordstopick>ul>li:hover
{
    background-color: #4658af;
  
}

     </style>       
       

<?php 




  foreach ($_SESSION['retrivedTitles'] as $key => $value) {
  
//echo $key;
//echo " -----";
//echo $value;
  }

?>

<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    var num1 = <?php echo $counter ?>;
  var num2 = <?php echo $foundAgain ?>;
    function drawChart() {
     var data2 = google.visualization.arrayToDataTable([
         ['Document', 'Frequency', { role: 'style' }, { role: 'annotation' } ],
        
         ['', num1, '', 'Retrived' ],
         ['', num2, '', 'Re-Retrived' ]
      ]);

     
    var options = {
    width: 150,
    height: 85,
    backgroundColor: '#ffffff',
    legend: { position: 'none'},
    hAxis:{ textPosition: 'none', gridlines: {color:'grey', count: 0}},
    bar: { groupWidth: '40%' },
    isStacked: true,
    colors: ['#395112'],
  chartArea:{left:8,top:10,width:"60%",height:"90%"}

 };
      var chart2 = new google.visualization.BarChart(document.getElementById("chart_div2"));
      chart2.draw(data2, options);
  }

  draw(chart2);
  </script>


  



  </div>


<script type="text/javascript">


function positiveFeedback(){


//document.getElementById('displayabstract').style.background = '#E4DB05'
//document.getElementById('displaytitle').style.background = '#E4DB05'


}

function negativeFeedback(){


//document.getElementById('displayabstract').style.background = '#ff9999'
//document.getElementById('displaytitle').style.background = '#ff9999'


}

</script>


	</div>



</body>
</html>

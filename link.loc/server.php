<?php 
error_reporting(-1);

if (isset($_POST['submit_request'])) {
	$query = trim($_POST['query_link']);	    
    $query_link = explode("/", $query);    
    $query_link[2] = 'yourdomain';
    $query_link[3] = 'abCdE';
    $query_link = implode("/",array_splice($query_link, 0, 4) );
    $res = '<a href="'.$_POST['query_link'].'" class="result_link" target="blank">'.$query_link.'</a>';
    $arr = [       
       "link_data" => $res,
       "clicked" => "Переходов: |".intval(0)."\n"      
    ];

    echo json_encode($arr);
    
    $file = fopen("requests.txt", "a+");
    fwrite($file, implode("|", $arr));
    fclose($file);
     
    exit;
}

if (isset($_POST['clicked'])) {
    $query = $_POST['clicked'];    
    $query = htmlentities($query);  
    $filename = "requests.txt";
    $file = htmlentities(file_get_contents($filename));
    $array = explode("\n", $file); 
    $arr_rm_last = array_pop($array);
    
    foreach ($array as $arr) {	
       	$result = explode("|", $arr);             
    
       	 	if (in_array($query, $result)){
       			$result[2] = (int)$result[2] + 1;       		
       	    }
  
       	 $arr = implode("|", $result);
       	    $arr = $arr."\n";
       } 
       
       file_put_contents($filename, html_entity_decode($arr));

       exit;
}

 $filename = "requests.txt";
 $file = htmlentities(file_get_contents($filename));

 debug($file);

 function debug($data)
{
	echo '<pre>' .print_r($data, 1). '</pre>';
}
       
?>

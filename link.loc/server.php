<?php 

if (isset($_POST['submit_request'])) {
	$query = trim($_POST['query_link']);	    
    $query_link = explode("/", $query);    
    $query_link[2] = 'yourdomain';
    $query_link[3] = 'abCdE';
    $query_link = implode("/",array_splice($query_link, 0, 4) );
    $res = '<a href="'.$_POST['query_link'].'" class="result_link" target="blank">'.$query_link.'</a>'; 
   
    $arr = [
       "date" => date('Y-m-d H:i:s').'|',
       "link_data" => $res.'|',
       "clicked" => "Переходов:"       
    ];

    echo json_encode($arr);
    
    $file = fopen("requests.txt", "a");
    fwrite($file, implode(" ", $arr)."\n=================\n");
    fclose($file);    
    exit;
}

if (isset($_POST['clicked'])) {
    $query = $_POST['clicked'];
    $st_strpos = $query." Переходов:";
    $filename = 'requests.txt';
    $file = file_get_contents($filename);    
    $all = 1;

   foreach (explode('|', $file) as $value) {
   	

if (strpos($value, $st_strpos) == TRUE) {
	$text = str_replace("Переходов:", '', "Переходов: ".++$all, $line);  
	file_put_contents($filename, $text);
    }
 }
  
}


?>
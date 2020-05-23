<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Links shortener</title>
	<link rel="stylesheet" type="text/css" href="/style/reset.css">
	<link rel="stylesheet" type="text/css" href="/style/style.css">	
	<script src="/js/jquery.js" type="text/javascript"></script>
	<script src="/js/script.js" type="text/javascript"></script>
</head>
<body>
	<header  class="header">
		<div class="logo">Links shortener</div>
	</header>
	<div class="center-bar">
	<div class="form_wrapper">
	<form action="server.php" method="POST" class="shortener">
		<input type="text" name="query_link" class="query_link" placeholder="Введите вашу ссылку" required="">
		<input type="submit" name="submit_request" class="submit">		
		<button type="reset">Reset</button>
	</form>
      <p>Ответ: </p>
	<div class="result">
	</div>	
    </div>
   </div>

   <footer>   	
   </footer>
</body>
</html>
<?php
if (isset($_COOKIE["user"])&& isset($_COOKIE["passw"])) {
echo 'Secces cookie';		
} else {
// URL скрипта авторизации на стороннем сайте
        $login_url = 'https://pharmel.kharkiv.edu/moodle/login/index.php';
  
        // параметры для отправки запроса - логин и пароль
      $post_data = array(
        'username' =>  $_POST["username"],
        'password' => $_POST["password"],
		'cookielength' => '-1',
        'hash_password' => ''
      );
 
//  $html = file_get_contents($login_url);
        // создание объекта curl
        $ch = curl_init();
  
        // используем User Agent браузера
        $agent = $_SERVER["HTTP_USER_AGENT"];
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
  
        // задаем URL
        curl_setopt($ch, CURLOPT_URL, $login_url );
 
        // указываем что это POST запрос
        curl_setopt($ch, CURLOPT_POST, 1 );
  
        // задаем параметры запроса
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  
        // указываем, чтобы нам вернулось содержимое после запроса
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
        // в случае необходимости, следовать по перенаправлени¤м
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  
        /*
            Задаем параметры сохранени¤ cookie
            как правило Cookie необходимы для дальнейшей работы с авторизацией
			        */
 curl_setopt($ch,	CURLOPT_COOKIESESSION,true);			
  curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

  
        // выполняем запрос для авторизации
        $postResult = curl_exec($ch);
// echo ($html == $postResult)?'Failed':'Success'; 
   
if (strpos ( $postResult, 'class="usertext"')) {
setcookie("user", $_POST["username"], time() + (1000 * 60 * 60 * 24 * 360));
setcookie("passw", $_POST["password"], time() + (1000 * 60 * 60 * 24 * 360));	
} else {
echo 'Failed';	
}
 echo $postResult;

curl_close($ch);	
} ?>
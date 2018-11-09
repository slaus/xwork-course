<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
//print_r($_POST);
if ( isset($_POST['lastname']) || isset($_POST['name']) || isset($_POST['tel']) || isset($_POST['email']) || isset($_POST['course']) || isset($_POST['hidden'])  ) {

	//$to = "mister.slaus@gmail.com";	// receiver of the email
        $to="course@xwork.site";
        $subject = "---- " . $_POST['hidden'] . $_POST['course'] . " ----";			// subject of the email
	$message = '
	<html>
		<head>
    			<meta charset="utf-8">
			<title>' . $_POST['hidden'] . $_POST['course'] . '</title>
		</head>
		<body>
			<h3>Ученик: <span style="font-weight: normal;">' . $_POST['lastname'] . ' ' . $_POST['name'] . '</span></h3>
			<h3>Телефон: <span style="font-weight: normal;">' . $_POST['tel'] . '</span></h3>
			<h3>E-mail: <span style="font-weight: normal;">' . $_POST['email'] . '</span></h3>
			<hr>
			<h2>Курсы: <span style="font-weight: normal;">' . $_POST['course'] . '</span></h2>
		</body>
	</html>';

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";

	// E-mail sending function
	if (mail($to, $subject, $message, $headers)) {
	   echo '<html>
		    <head>
    	        <meta http-equiv="Refresh" content="5; URL=https://xwork.site/course/" />
    	    </head>
		    <body>
	            <div align="center" style="margin-top:30%;"><h4>Спасибо, Ваше заявка была отправлена.</h4><h3>Мы свяжемся с Вами в ближайшее время.</h3><h5>Через 5 секунд Вы будете перенаправлены на сайт.<h5></div>
	        </body>
	    </html>';
	} else {
	   echo '<html>
		    <head>
    	        <meta http-equiv="Refresh" content="5; URL=https://xwork.site/course/" />
    	    </head>
		    <body>
	            <div align="center" style="margin-top:30%;"><h4>Произошла ошибка при отправки сообщения.</h4><h5>Через 5 секунд Вы будете перенаправлены на сайт</h5></div>
	        </body>
	    </html>';
	}

}
?>
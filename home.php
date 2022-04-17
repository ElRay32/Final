<?php
echo"Bienvenido, <a href='modulos/logout.php'>Salir</a>";
if (isset($_SESSION['user'])) {
session_start();
include "config/config.php";
$rr = "SELECT * FROM 'user01'";
$result= mysqli_query($conn,$rr); }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/chat.js"></script>
</head>
<body>
	<script type="text/javascript">
		var comet = new AjaxPush('modulos/lis.php', 'modulos/msgchat.php');
		var n = new Function("return (Math.random()*190).toFixed(0)");

		var c = "rgb(" + n() + ", " + n() + "," + n() + ")";
		var template = "<strong style='color: " + c + "'>" + 'user_' + n() + "</strong>: ";

		comet.connect(function(data) { $("#history").append(data.message) + "<br>"; });

		var send = function() {
			comet.doRequest({ message: template + $("#message").val() + "<br>" }, function(){
				$("#message").val('').focus();
			})
		}
	</script>

	<input type="text" autofocus id="message" placeholder="Escribe tu mensajes">
	<button onclick="send()">Enviar</button><br><br>
	<div id="history"></div>
</body>
</html>

<?php
	$message = $_POST["message"];
	$files = scandir("./messages");
	$count = count($files) - 2; //excluindo os diretórios "." e ".."

	$fileName = "msg-{$count}.txt";
	$file = fopen("./messages/{$fileName}", "x");
	
	fwrite($file, $message);
	fclose($file);
	header("Location: index.php");

	echo "<h1>Mensagem enviada com sucesso!</h1>";

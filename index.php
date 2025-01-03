<?php include "config.php";

	if (isset($_GET["code"])) {
		
		$code = $_GET["code"];
		
		$stmt = $pdo->prepare(
        "SELECT original_url FROM urls WHERE short_code = :code"
		);
    
		$stmt->execute([":code" => $code]);
		$url = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if ($url) {
			
			//echo $url["original_url"];
			header("Location: " . $url["original_url"]);
			exit();
		} else {
			echo "URL não encontrada.";
		}
		
	} else {
		echo "Código inválido.";
	} 

?>

<htm lang="main 1">
	<head></head>	
	<body>

		<div id="develop 1"> </div>

	</body>	
</htm>

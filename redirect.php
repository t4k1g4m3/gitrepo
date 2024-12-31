<?php include "config.php";

	//if (isset($_GET["code"])) {
		
		$url_teste = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
		$url_cod = explode('?', $url_teste);
		
		//var_dump( $url_cod );
		//exit();
		
		
		//$code = $_GET["code"];
		
		$code = $url_cod[1];
		
		$stmt = $pdo->prepare(
        "SELECT original_url FROM urls WHERE short_code = :code"
		);
    
		$stmt->execute([":code" => $code]);
		$url = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$url_teste = str_replace("Novo/", "", $_SERVER["REQUEST_URI"]);
		
		if ($url) {
			
			echo $url["original_url"];
			
		
			//header("Location: " . $url["original_url"]);
			//exit();
		} else {
			echo "URL não encontrada.";
		}
		
	//} else {
	//	echo "Código inválido.";
	//} 

?>

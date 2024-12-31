<?php include "config.php";
function generateShortCode($length = 6)
{
    return substr(
        str_shuffle(
            "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
        ),
        0,
        $length
    );
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_url = $_POST["url"];
    $short_code = generateShortCode();
    $stmt = $pdo->prepare(
        "INSERT INTO urls (original_url, short_code) VALUES (:original_url, :short_code)"
    );
    $stmt->execute([
        ":original_url" => $original_url,
        ":short_code" => $short_code,
    ]);
    $short_url = "http://localhost/encurtador?code=$short_code";
    echo "URL encurtada: <a href='$short_url'>$short_url</a>";
}
?> 

<!DOCTYPE html> 
<html lang="en"> 
	<head> 
		<meta charset="UTF-8"> 
		<title>Encurtador de URLs</title> 
	</head> 
	<body> 
		<form method="post"> 
			<label for="url">Digite a URL:</label> 
			<input type="url" name="url" required> 
			<button type="submit">Encurtar</button> 
		</form> 
	</body> 
</html>
<?php
session_start();

$score=$_SESSION["score"]??0;

if($score>=3){
$result="HBO-ICT past waarschijnlijk goed bij jou!";
$color="success";
}
elseif($score>=2){
$result="Je hebt interesse in ICT, maar onderzoek de opleiding nog verder.";
$color="warning";
}
else{
$result="Misschien past een andere studie beter bij jou.";
$color="danger";
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>

<meta charset="UTF-8">

<title>Resultaat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-5 text-center">

<h1 class="mb-4">Resultaat</h1>

<h3 class="text-<?php echo $color;?> mb-3">
<?php echo $result;?>
</h3>

<p class="mb-4">
Je score: <strong><?php echo $score;?></strong>
</p>

<a href="index.php" class="btn btn-primary">
Quiz opnieuw doen
</a>

</div>

</div>

</body>
</html>
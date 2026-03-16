<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="nl">
<head>

<meta charset="UTF-8">
<title>HBO-ICT Studie Quiz</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-5 text-center">

<h1 class="mb-3">🎓 HBO-ICT Studie Quiz</h1>

<p class="mb-4">
Beantwoord een aantal vragen om te ontdekken of de opleiding  
<strong>HBO-ICT</strong> bij jou past.
</p>

<a href="questions.php?q=0" class="btn btn-primary btn-lg">
Start de quiz
</a>

</div>

</div>

</body>
</html>
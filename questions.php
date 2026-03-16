<?php
session_start();

if(!isset($_SESSION["score"])){
$_SESSION["score"]=0;
}

$questions=[

[
"question"=>"Wat zijn de belangrijkste vakken en thema’s in HBO-ICT?",
"options"=>[
"Programmeren, databases, security",
"Geschiedenis en aardrijkskunde",
"Sport en beweging",
"Muziek en kunst"
],
"correct"=>0
],

[
"question"=>"Hoe ziet het curriculum eruit?",
"options"=>[
"Alleen theorie",
"Theorie + projecten + specialisaties",
"Alleen stage",
"Alleen zelfstudie"
],
"correct"=>1
],

[
"question"=>"Hoeveel praktijkervaring zit er in de opleiding?",
"options"=>[
"Geen",
"Alleen in jaar 1",
"Stage + projecten + labs",
"Alleen in jaar 4"
],
"correct"=>2
],

[
"question"=>"Wat zijn de toelatingseisen?",
"options"=>[
"Alleen vwo",
"Mbo-4, havo of vwo",
"Alleen mbo-2",
"Alleen met wiskunde B"
],
"correct"=>1
]

];

$q=isset($_GET["q"])?(int)$_GET["q"]:0;

if($_SERVER["REQUEST_METHOD"]=="POST"){

if($_POST["answer"]==$questions[$q]["correct"]){
$_SESSION["score"]++;
}

$q++;

if($q>=count($questions)){
header("Location: result.php");
exit();
}
}

$current=$questions[$q];
$total=count($questions);
$progress=(($q+1)/$total)*100;
?>

<!DOCTYPE html>
<html lang="nl">
<head>

<meta charset="UTF-8">

<title>Vraag <?php echo $q+1; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h4 class="mb-3">Vraag <?php echo $q+1; ?> van <?php echo $total; ?></h4>

<div class="progress mb-4">

<div class="progress-bar" style="width:<?php echo $progress; ?>%"></div>

</div>

<form method="POST">

<h5 class="mb-4"><?php echo $current["question"]; ?></h5>

<?php
foreach($current["options"] as $index=>$option){
?>

<div class="form-check mb-2">

<input class="form-check-input" type="radio" name="answer" value="<?php echo $index;?>" required>

<label class="form-check-label">
<?php echo $option;?>
</label>

</div>

<?php
}
?>

<button class="btn btn-primary mt-3">Volgende vraag</button>

</form>

</div>

</div>

</body>
</html>
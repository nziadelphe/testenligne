
<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	
	$question = $exm->getQuestion();
	$total       = $exm->getTotalRows();
?>
<style>
.starttest p{
	font-family: "Times New Roman", Georgia, Serif;
		font-size: 23px;
		color:#030709;
}
.starttest ul{
	font-family: "Times New Roman", Georgia, Serif;
		font-size: 23px;
		color:#2d4756;
}
.starttest h2{
	font-family: "Times New Roman", Georgia, Serif;
		font-size: 25px;
		color:#121069;
}
.starttest h3{
	font-family: "Times New Roman", Georgia, Serif;
		font-size: 23px;
		color:#2d4756;
}
</style>



<div class="main">

	<div class="starttest">
	<h2>Testez vos connaissances</h2>
	
	<ul>
		<li><strong>Numero par Questions : </strong> <?php echo $total; ?></li>
		<li><strong>Question : </strong> Choix Multiple </li>
	</ul> 
	<h3>Vous disposez de 40 mm pour le test.</h3>
	<a href="test.php?q=<?php echo $question['quesNo']; ?>">Commencez le test</a>	
	</div>
  </div>
<?php include 'inc/footer.php'; ?>
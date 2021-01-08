<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
?>
<style>
	.starttest a{
		font-family: "Times New Roman", Georgia, Serif;
		font-size: 25px;
		color:#121069;
	}
</style>

<div class="main">
<h1>Resultat!</h1>
	<div class="starttest">
	
	<!-- appreciation -->	
	<p>
	<?php
			if($_SESSION['score']>=30){
				echo "Felicitations! Tu as reussi le test";
			}else 
			 
			{
			    echo "Desole, tu n'es pas admis au test";
			}
			
		?>
	</p>
		
	<p>Final Sore : 
	
		<?php
			if(isset($_SESSION['score'])){
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			}
		?>
			
	</p>


	<a href="viewans.php">Voir les bonnes reponses</a>
	<a href="starttest.php">Reprenez le test!!!!</a>
	</div>
  </div>
<?php include 'inc/footer.php'; ?>
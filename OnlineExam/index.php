<?php include 'inc/header.php'; ?>
<?php
	Session::checkLogin();
?>
<div class="main">
<h1>Connexion du participant</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/testt.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" id = "email"></td>
			 </tr>
			 <tr>
			   <td>Mot pass </td>
			   <td><input name="password" type="password" id = "password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Envoyer">
			   </td>
			 </tr>
       </table>
	   </form></br>
	   <p>Nouveau participant ? <a href="register.php">S'inscrire</a></p>
		<span class="empty" style ="display:none">Tous les champs sont obligatoire!</span>
		<span class="error" style ="display:none">Email ou mot de pass incorrecte !</span>
		<span class="disable" style ="display:none">utilisateur deconnecter !</span>
	</div>	
</div>
<?php include 'inc/footer.php'; ?>
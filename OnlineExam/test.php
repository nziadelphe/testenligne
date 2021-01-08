 <?php include 'inc/header.php'; ?>
<?php 
    Session::checkSession();
    
    define("DUREE",2400); //declaration de la duree comme tampon
    
    $time = time();
    
    //calculer le temps de depart de test
    if (!Session::get('Hdepart')) {
        
        Session::set('Hdepart',$time);
    }
    
    //calcul des differents temps 
    
    $Hecoule = $time - Session::get('Hdepart'); 
    $Hrestant = DUREE - $Hecoule;
    if($Hrestant<=0){
        
        header("Location:final.php");
    }
    
    
    if(isset($_GET['q'])){
        $number = (int) $_GET['q'];
    }else{
        header("Location:exam.php");
    }
    $total       = $exm->getTotalRows(); 
    $question = $exm->getQuesByNumber($number );
?>
<?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $process = $pro->processData($_POST);
    }
?>
<html>
<body>
<div id="countdown"></div>
<div id="notifier"></div>
<script type="text/javascript">
(function () {
  function display( notifier, str ) {
    document.getElementById(notifier).innerHTML = str;
  }
 
  function toMinuteAndSecond( x ) {
    return Math.floor(x/60) + ":" + (x=x%60);
  }
 
  function setTimer( remain, actions ) {
    var action;
    (function countdown() {
       display("countdown", toMinuteAndSecond(remain));
       if (action = actions[remain]) {
         action();
       }
       if (remain > 0) {
         remain -= 1;
         setTimeout(arguments.callee, 1000);
       }
    })(); // End countdown
  }
 
  setTimer(<?php echo "$Hrestant" ?>, {
    10: function () { display("notifier", "Just 10 second"); },
     5: function () { display("notifier", "5 second");        },
     0: function () { display("notifier", "Temps epuise");       }
  });
})();
 
</script>
 
 </script>
</body>
</html>
 
<style>
.alamgir{
    font-family: "Times New Roman", Georgia, Serif;
     color:#05020d;
     font-size: 20px;
}
</style>
<html>
<head>
 
</head>
    <body>
        <div class="alamgir">
        <marquee>Votre examen a debuter</marquee>
        <strong><?php echo Session::get("name"); ?></strong>
  
        
        </div>
    </body>
</html>
<div class="main">
<h1>Question <?php echo $question['quesNo']; ?> à <?php echo $total; ?></h1>
    <div class="test">
        <form id="nav-form" method="post" action="">
        <table> 
            <tr>
                <td colspan="2">
                 <h3>Question <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
                </td>
            </tr>
            <?php 
                $answer = $exm->getAnswer($number);   
                if($answer){
                    while($result = $answer->fetch_assoc()){
            ?>
            <tr>
     			<td>
                 <input type="checkbox" name="ans" value="<?php echo $result['id']; ?>"/><?php echo $result['ans']; ?>
                </td>
            </tr>
                <?php } } ?>
            <tr>
              <td>
                <input type="button" class="btn btn-primary" id="btn-prev" name="btn-prev" value="Precedent"/>
                <input type="button"  class="btn btn-success" id="btn-next" name="btn-next" value="Suivant"/>
                  
                <script>
                setTimeout(function() {
                	window.location.href = "final.php";
					
				}, <?php echo ($Hrestant * 1000); ?>);
                
                </script>   
               
                <input type="hidden" name="number" value= "<?php echo $number; ?>"/>
                <input type="hidden" id="offset" name="offset" />
            </td>
            </tr>
            
        </table>
        </form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>
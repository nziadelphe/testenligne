<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    //Session::init();
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
class Process{
    private $db;
    private $fm;
    
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        
      
        
    }
    public function processData($data){
        $selectedAns        = $this->fm->validation($data['ans']);
        $number             = $this->fm->validation($data['number']);
        $offset             = $this->fm->validation($data['offset']);
        $selectedAns        = mysqli_real_escape_string($this->db->link, $selectedAns );
        $number             = mysqli_real_escape_string($this->db->link, $number );
        $offset             = mysqli_real_escape_string($this->db->link, $offset );
        //$next             = $number+1;
        $nextQ              =   $number + $offset;
 
        if(!isset($_SESSION['score'])){
            $_SESSION['score'] = '0';   
        }
        $total = $this->getTotal();
        $right = $this->rightAns($number);
        if($right == $selectedAns ){
            $_SESSION['score']++;
        }
        if($nextQ >  $total){
            header("Location: final.php");
            exit();
        }
        else {
            header("Location: test.php?q=".$nextQ);
            exit();
            
        }
    }
    private function getTotal(){
        $query = "select * from tbl_ques";
        $getResult = $this->db->select($query);
        $total = $getResult->num_rows;
        return $total;
    }
    private function rightAns($number){
         $query = "select * from tbl_ans where quesNo = '$number' and rightAns = '1'";
        $getdata = $this->db->select($query)->fetch_assoc();
        $result = $getdata['id'];
        return $result;
    }
   
    
 
}
?> 








<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $name = $_POST['name'];
  // $code = $_POST['code'];

  $search_where ='';

  if(isset($_POST['pcode'])){
    $pcode = $_POST['pcode'];  
    $search_where .= " and pcode='".$pcode."'";
  } else {
    $pcode = '';
  }
  $step = $_POST['step'];

  
  
  // 코드와 분류명을 사용하고 있는지 확인
  $query = "select cid from category where step=".$step." and name='".$name."'";
  $query .= $search_where;

  $result = $mysqli->query($query);

  $rs = $result->fetch_object();
  
  
  if(isset($rs->cid)){
    $return_data = array("result"=>"-1"); //cid 있다면, 중복
    echo json_encode($return_data);
    exit;
  }
  
  
  $sql="INSERT INTO category 
  (pcode, name, step) VALUES('".$pcode."', '".$name."', ".$step.")";
  $result=$mysqli->query($sql);

  if($result){
      $retun_data = array("result"=>1);
      echo json_encode($retun_data);
  }else{
      $retun_data = array("result"=>0);
      echo json_encode($retun_data);
  }
  

?>
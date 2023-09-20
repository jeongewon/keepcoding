<?php 

  //전체 게시물 수 구하기  
  $pagesql = "SELECT COUNT(*) as cnt from $pagenationTarget WHERE 1=1";
  $pagesql .= $search_where;
  $page_result = $mysqli->query($pagesql);

  if (!$page_result) {
    die("쿼리 실행 중 오류 발생: " . mysqli_error($mysqli));
  }
  $page_row = $page_result->fetch_object();
  $row_num = $page_row->cnt; //전체 게시물 수

  $pageNumber = $_GET['pageNumber'] ?? 1;
  $pageCount = $_GET['pageCount'] ?? 9;
  $startLimit = ($pageNumber-1)*$pageCount; // (1-1)*10 = 0, (2-1)*10 = 10
  $endLimit = $pageCount;

  $block_ct = 5; // 1,2,3,4,5  / 5,6,7,8,9 
  $block_num = ceil($pageNumber/$block_ct);//pageNumber 1,  9/5 1.2 2
  $block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
  $block_end = $block_start + $block_ct -1; //start 1, end 5

  $total_page = ceil($row_num/$pageCount); //총52, 52/5
  if($block_end > $total_page) $block_end = $total_page;
  $total_block = ceil($total_page/$block_ct);//총32, 2

  ?>
<?PHP
    //query count news
    $sql = "SELECT COUNT(news_id) FROM news WHERE news_status = 1;" or die("Error:" . mysqli_error($con));
    $query = mysqli_query($con, $sql);
	$row = mysqli_fetch_row($query);

	$rows = $row[0];

    //จำนวนข้อมูลที่ต้องการให้แสดงใน 1 หน้า  ตย. 5 record / หน้า
	$page_rows = 12;

    //หาค่าจำนวนแถวที่เหลือในตำแหน่งสุดท้าย
	$last = ceil($rows/$page_rows);
	if($last < 1){
		$last = 1;
	}

    //กำหนดค่าเริ่มต้น pagination
	$pagenum = 1;

    //กำหนดจำนวน pagination ที่ต้องการให้แสดงเมื่อมีจำนวนข้อมูลมากเกินที่กำหนดกี่ column
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-5]#', '', $_GET['pn']);
	}

    //เช็คว่าค่า pagination ทรากำหนด pagenum มากกว่า 1 ไหม
	if ($pagenum < 1) {
		$pagenum = 1;
	}else if ($pagenum > $last) {
		$pagenum = $last;
	}

    //กำหนด LIMIT ในการ select
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

    //$nquery นำไปใช้วนลูป
    $sql_nquery = "SELECT * FROM news WHERE news_status = 1 $limit;" or die("Error:" . mysqli_error($con));
    $nquery = mysqli_query($con, $sql_nquery);

    //ประกาศตัวแปร pagination
	$pagination = '';

	if($last != 1){

        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            //ไปยัง pagination หน้าแรก
            $pagination .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">«</a></li>';

            //loop pagination
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $pagination .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></li>';
                }
            }
        }

        //pagination ล่าสุดที่เปิดอยู่
        $pagination .='<li class="active"><a href="#">'.$pagenum.'</a></li>';

        //loop pagination
        for($i = $pagenum+1; $i <= $last; $i++){
            $pagination .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></li>';
            if($i >= $pagenum+4){
                break;
            }
        }

        //ไปยัง pagination หน้าสุดท้าย
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $pagination .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">»</a></li>';
        }
	}
?>
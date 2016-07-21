<?php 
define('IN_QY',true);
session_start();
require("include/common.inc.php");
define('SCRIPT','list');
if(!$_COOKIE['userid']){
	echo "<script type='text/javascript'>location.href='login.php';</script>";
	exit;
}

$sqlu = "select * from tbl_user where id=".$_COOKIE['userid'];
$queryu=mysql_query($sqlu);
$rowu=mysql_fetch_array($queryu);
$time2=strtotime($rowu['beizhu1']);
$time1=strtotime(date("Y-m-d H:i:s")); 
$tt = ceil(($time2-$time1)/86400);

$sqla = "select count(*) as cc from tbl_info where userid='".$_COOKIE['username']."'";
$querya=mysql_query($sqla);
$rowa=mysql_fetch_array($querya);

$s = $rowu['anums']-$rowa['cc'];


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>文章列表 - 掌上推广</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width , initial-scale=1.0 , user-scalable=0 , minimum-scale=1.0 , maximum-scale=1.0" />
<script type='text/javascript' src='js/jquery-2.0.3.min.js'></script>
<script type='text/javascript' src='js/LocalResizeIMG.js'></script>
<script type='text/javascript' src='js/patch/mobileBUGFix.mini.js'></script>
<link rel="stylesheet" href="css/css.css">   
<style>
.list1 ul li { background:#f7f7f7 url(images/dotline.jpg) repeat-x top; padding:10px; height:auto; overflow:hidden; zoom:1;}
.list1 ul li .pic {max-width:30%;}
.list1 ul li .pic img{width:50px;height:50px}
.list_txt h6 {padding-left:10px;max-width:60%;color:#333; font-size:14px; padding-top:5px; line-height:16px; height:24px; overflow: hidden; }
.list1 ul li a { color:#333; }
.bot_main li.ico_2{
  background:#F1901F;
}
</style>
</head>
<body>
<div class="apply" id="apply">
	<p>文章列表<span style="float:right;font-size:12px;margin-right:10px">剩余文章数：<?php echo $s;?>&nbsp;&nbsp;剩余天数：<?php echo $tt;?>天</span></p>
	<div class="list1" style="margin-bottom:50px;">
		<ul>
			<?php
			if($_GET['page']){
				$count = ($_GET['page']-1)*20+1;
			}else{
				$count = 1;
			}
			$page_sql = "select * from tbl_info where userid='".$_COOKIE['username']."' order by id desc";
			qy_page($page_sql,20);
			$sql="select * from tbl_info where userid='".$_COOKIE['username']."' ORDER by id DESC LIMIT $_pagenum,$_pagesize";
			$_id ='&';
			$query=mysql_query($sql);
			while($row=mysql_fetch_array($query)){
			?>
			<li>
				<div class="list_txt">
					<a href="view.php?fid=<?=$row['infoid']?>" title="<?php echo $row['title'];?>"><h6 style="overflow:hidden;height:30px;line-height:30px;"><?php echo $count;?>、<?php echo $row['title'];?></h6></a><span style="float:right;font-size:12px;margin-right:10px;margin-top:-23px">点击:<?php echo $row['wcount'];?>&nbsp;&nbsp;广告点击:<?php echo $row['acount'];?></span>
				</div>
			</li>
			<?php
				$count++;
			}	
			?>
			<li>
				<?php echo qy_paging3();?>
			</li>
		</ul>
	</div>
</div>
<?php include('foot.php');?>
</body>
</html>
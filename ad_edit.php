<?php 
error_reporting(0);
define('IN_QY',true);
session_start();
require("include/common.inc.php");
if(!$_COOKIE['userid']){
	echo "<script type='text/javascript'>location.href='login.php';</script>";
	exit;
}

if($_GET['act']=='add'){
	////
//	$sqla = "select count(*) as cc from tbl_ad where username='".$_COOKIE['username']."'";
//$querya=mysql_query($sqla);
//$rowa=mysql_fetch_array($querya);
//echo $rowa['cc'];	
//	//
	
	if(is_uploaded_file($_FILES['upfile']['tmp_name'])){ 
		$upfile=$_FILES["upfile"]; 
		//获取数组里面的值 
		//$name=time().$upfile["name"];//上传文件的文件名
		$string = strrev($_FILES['upfile']['name']);
		$array = explode('.',$string);
		$type=$upfile["type"];//上传文件的类型 
		$size=$upfile["size"];//上传文件的大小 
		$tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径 
		$name = 'upload/'.time().'a.'.strrev($array[0]);
		//判断是否为图片 
		switch ($type){ 
			case 'image/pjpeg':$okType=true; 
			break; 
			case 'image/jpeg':$okType=true; 
			break; 
			case 'image/gif':$okType=true; 
			break; 
			case 'image/png':$okType=true; 
			break; 
		}
		
		//二维码
		 
		//
       //$adtelnumber=trim($_POST['adtelno']);
	   //$erweima=trim($_POST['qrcode']);
		if($okType){ 
			$error=$upfile["error"];//上传后系统返回的值 
			//把上传的临时文件移动到up目录下面 
			move_uploaded_file($tmp_name,$name); 
		}else{ 
			qy_alert_back('\u8bf7\u4e0a\u4f20\u006a\u0070\u0067\u002c\u0067\u0069\u0066\u002c\u0070\u006e\u0067\u7b49\u683c\u5f0f\u7684\u56fe\u7247\uff01');
		} 
	}
	//2222222222222222
	if(is_uploaded_file($_FILES['qrcode']['tmp_name'])){ 
		$qrcode=$_FILES["qrcode"]; 
		//获取数组里面的值 
		//$name=time().$qrcode["name"];//上传文件的文件名
		$ewstring = strrev($_FILES['qrcode']['name']);
		$ewarray = explode('.',$ewstring);
		$ewtype=$qrcode["type"];//上传文件的类型 
		$ewsize=$qrcode["size"];//上传文件的大小 
		$ewtmp_name=$qrcode["tmp_name"];//上传文件的临时存放路径 
		$ewname = 'upload/'.time().rand(10,100).'b.'.strrev($ewarray[0]);
		//判断是否为图片 
		switch ($ewtype){ 
			case 'image/pjpeg':$okTypew=true; 
			break; 
			case 'image/jpeg':$okTypew=true; 
			break; 
			case 'image/gif':$okTypew=true; 
			break; 
			case 'image/png':$okTypew=true; 
			break; 
		}
		
           
		if($okTypew){ 
			$error=$qrcode["error"];//上传后系统返回的值 
			//把上传的临时文件移动到up目录下面 
			move_uploaded_file($ewtmp_name,$ewname); 
		}else{ 
			qy_alert_back('no');
		} 
	}
	//2222222222222
	 $adtelnumber=trim($_POST['adtelno']);
	 //$erweima=trim($_POST['qrcode']);
	$sql = "insert into tbl_ad values (0,'".$_POST['adtitle']."','".$_POST['adlink']."','".$name."','".$_COOKIE['userid']."','".$_COOKIE['username']."','".date('Y-m-d H:i:s')."','".$adtelnumber."','".$ewname."')";

	mysql_query($sql);
	echo "<script>alert('\u63d0\u4ea4\u6210\u529f\uff01');window.location.href='ad_edit.php';</script>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>添加广告 - 掌上推广</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width , initial-scale=1.0 , user-scalable=0 , minimum-scale=1.0 , maximum-scale=1.0" />
<script type='text/javascript' src='js/jquery-2.0.3.min.js'></script>
<script type='text/javascript' src='js/patch/mobileBUGFix.mini.js'></script>
<link rel="stylesheet" href="css/css.css">   
</head>
<body>
<div class="apply" id="apply">
	<p>添加广告</p>
	<div class="blank10"></div>
	<form action="?act=add" id="signupok" method="post" name="addform"  enctype="multipart/form-data">
		<dl class="clearfix">
			<dd>广告标题：</dd>
			<dd><input type="text" class="input_txt" value="" name="adtitle" id="adtitle" placeholder="请输入广告标题" style="height:50px;"></dd>
		</dl>
		<dl class="clearfix">
			<dd>广告链接：</dd>
			<dd><input type="tel" class="input_txt" value="" name="adlink" id="adlink" placeholder="请输入广告链接（包含：http://）" style="height:50px;"></dd>
		</dl>
        <dl class="clearfix">
			<dd>联系电话：</dd>
			<dd><input type="tel" class="input_txt" value="" name="adtelno" id="adtelno" placeholder="请输入联系电话" style="height:50px;"></dd>
		</dl>
        
		<dl class="clearfix">
			<dd>广告图片：<span style="font-size:13px; color:#666;">(尺寸：750像素*150像素)</span></dd>
			<dd><input type="file" class="input_txt"   placeholder="选择上传广告图片" name="upfile" style="width: 100%;height: 50px;box-sizing: border-box;padding: 14px;color: #696969;font-size: 12px;line-height: 12px;border: #e6e6e6 1px solid;
background: #fff;"></dd>
		</dl>
		
        <dl class="clearfix">
			<dd>二维码：<span style="font-size:13px; color:#666;">(尺寸：258像素*258像素)</span></dd>
			<dd><input type="file" class="input_txt"   placeholder="选择上传二维码图片" name="qrcode" style="width: 100%;height: 50px;box-sizing: border-box;padding: 14px;color: #696969;font-size: 12px;line-height: 12px;border: #e6e6e6 1px solid;
background: #fff;"></dd>
		</dl>
        
        
		<div class="btn_box" style="margin-bottom:50px;">
			<input type="name" name="signup" class="button" value="确认提交"  onclick="return postcheck();">
		</div>
		<div class="blank10"></div>
		
	</form>
</div>

<? include('foot.php');?>
<script type="text/javascript">
function postcheck(){
	if (document.addform.adtitle.value=="" ){
		alert('请填写广告标题！');
		document.addform.adtitle.focus();
		return false;
	}
	if (document.addform.adlink.value=="" ){
		alert('请填写广告链接！');
		document.addform.adlink.focus();
		return false;
	}
	
	if (document.addform.upfile.value=="" ){
		alert('请上传广告图片！');
		document.addform.upfile.focus();
		return false;
	}
	document.addform.submit();
	return true;	
}
</script>
</body>
</html>
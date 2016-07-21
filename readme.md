2016-03-26 bjlm124.taobao.com 总结最近安装出现问题：

1，安装本程序服务器需要支持PHP，安装MYSQL数据库，也就是PHP+MYSQL配置。
   PHP最好5.1以上。

2，下面安装的第一步，使用编辑软件打开include/common.inc.php 修改文件中的数据库帐号密码。

define('DB_HOST','localhost');//数据库连接地址,数据库接口（默认：3306）
define('DB_USER','root');//数据库用户名 
define('DB_PWD','root');//数据库密码 
define('DB_NAME','root');//数据库名

你会找到这样的几行，注意，这里是把你的资料，替换掉中间的root部分，而不是中文部分。另外注意后面的注释，不要填颠倒了。第一条不用改。除非你的数据库和你的程序不在一个服务器上。

3，需要修改会员自助注册使用文章条数，试用时间等
   请修改register.php文件
  第168行  <input name="anums" type="hidden" class="dfinput"  value="10" />  
    value="10" 表示自助注册 有10条文章试用，可以修改数字。
  第170行  <input name="beizhu1" type="hidden" class="dfinput"  value="<?php echo $showtime=date("Y-m-d H:i:s",time() + 20*86400);?>" />
    20*86400  表示试用期为20天，这里是按秒计算的，需要修改天数，就修改那个数字20就行了。


PS：演示站 www.at168.com/login.php  
    掌柜自己修改了文章列表页删除功能、文章页“换成你的广告 点击这里”两个功能。
    在本程序文件里没有加入，因为有的朋友不喜欢，如果您需要，可以联系掌柜索要。免费的。

    掌柜还会根据用户体验修改一些功能，您可以关注演示站，发现有需要的功能，可以免费向掌柜索要。


——————————————————————————————————————————
 掌上推广（微信朋友圈广告植入系统）
使用说明：
 1.使用编辑软件打开include/common.inc.php 修改文件中的数据库帐号密码。
 2.将根目录中的zhangshangtg.sql 导入您的数据库中。
 3.上传网站程序到您的网站根目录中。

后台地址：

 您的域名/admin

 admin admin123

常见问题：

  修改foot及foot1和foot2 将里面的联系方式及客服链接修改成你自己的！
  
推荐工具：

  Notepad++
  
  Dreamweaver













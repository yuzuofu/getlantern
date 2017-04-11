<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>微餐后台管理</title>

    <!--  CSS样式文件  -->
    <!--  Bootstrap CSS Style  -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Wecan/Admin/Public//css/lightbox.min.css" />
    <link rel="stylesheet" href="Wecan/Admin/Public//css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="Wecan/Admin/Public//css/admin.css" />

    <!--  JS文件  -->
    <!-- JQuery  -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="Wecan/Admin/Public//js/lightbox.min.js"></script>
    <script src="Wecan/Admin/Public//js/bootstrap-datetimepicker.min.js"></script>
    
</head>
<body>
    
    <!--  路径地图  -->
    <ol class="breadcrumb">
        <li>餐厅管理</li>
        <li>餐厅介绍</li>
    </ol>

    
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!--  导航栏主要栏目  -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">餐厅管理 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo U('Customer/index');?>">会员管理</a></li>
                                <li><a href="<?php echo U('Common/intro');?>">餐厅介绍</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo U('Order/index');?>">预约管理</a></li>
                        <li><a href="<?php echo U('Menu/index');?>">菜单管理</a></li>
                        <li><a href="<?php echo U('Coupon/index');?>">优惠券管理</a></li>
                        <li><a href="<?php echo U('Desk/index');?>">餐桌管理</a></li>
                    </ul>
                    <?php if(session('username')): ?><ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo session('username');?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
                                </ul>
                            </li>
                        </ul><?php endif; ?>
                </div>
            </div>
        </nav>
    
    
    <form action="" method="post">
        <div class="form-group" style="padding: 0 10px;">
            <label for="restaurant-intro" class="h3">餐厅介绍:</label>
        <textarea name="intro" id="restaurant-intro" class="form-control" cols="30" rows="10" placeholder="请在此处输入餐厅介绍..."><?php echo ($intro); ?></textarea>
        </div>
        <div class="text-right" style="padding-right: 20px;">
            <button class="btn btn-primary" type="submit">确认修改</button>
        </div>
    </form>

    
</body>

</html>
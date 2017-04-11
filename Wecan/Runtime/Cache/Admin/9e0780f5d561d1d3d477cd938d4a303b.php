<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
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
        <li>优惠券管理</li>
        <li>新增优惠券</li>
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
                </div>
            </div>
        </nav>
    
    
    <form action="" method="post">
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="coupon-perfix" class="h4">优惠券前缀</label>
                <input type="text" class="form-control" id="coupon-perfix" name="coupon_prefix" />
            </div>
        </div>
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="coupon-amount" class="h4">优惠额度</label>
                <input type="text" class="form-control" id="coupon-amount" name="coupon_amount" />
            </div>
        </div>
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="coupon-start" class="h4">开始时间</label>
                <input type="text" class="form-control datetimepicker" id="coupon-start" name="coupon_start" />
            </div>
        </div>
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="coupon-end" class="h4">结束时间</label>
                <input type="text" class="form-control datetimepicker" id="coupon-end" name="coupon_end" />
            </div>
        </div>
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="coupon-count" class="h4">优惠券数量</label>
                <input type="number" class="form-control" id="coupon-count" name="coupon_acount" />
            </div>
        </div>
        <div class="form-group row desk-submit-btn">
            <button class="btn btn-primary" type="submit">提交</button>
        </div>
    </form>

    
</body>

    <script>
        $(".datetimepicker").datetimepicker({
            format:'yyyy-mm-dd',
            autoclose:true,
            todayBtn:true,
            todayHighlight:true
        });
    </script>

</html>
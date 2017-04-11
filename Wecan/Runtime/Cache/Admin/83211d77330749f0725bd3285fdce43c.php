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
        <li>预约管理</li>
        <li>编辑预约</li>
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
    
    
    <form action="#">
        <div class="form-group row" style="padding: 0 25px;">
            <label for="order-user" class="h4">预约用户:</label>
            <input type="text" class="form-control" id="order-user" value="<?php echo ($order["username"]); ?>" readonly />
        </div>
        <div class="form-group row" style="padding: 0 25px;">
            <label for="order-desk" class="h4">预约餐桌:</label>
            <input type="text" class="form-control" id="order-desk" value="<?php echo ($order["dkname"]); ?>" readonly />
        </div>
        <div class="form-group row" style="padding: 0 25px;">
            <label for="order-time" class="h4">预约时间:</label>
            <input type="text" class="form-control" id="order-time" value="<?php echo date('Y-m-d', $order['create_time']);?>" readonly />
        </div>
        <div class="form-group row" style="padding: 0 25px;">
            <label for="eat-time" class="h4">就餐时间:</label>
            <input type="text" class="form-control" id="eat-time" value="<?php echo date('Y-m-d', $order['use_time']);?>" readonly />
        </div>
        <div class="form-group row" style="padding: 0 25px;">
            <label for="eat-person" class="h4">就餐人数:</label>
            <input type="text" class="form-control" id="eat-person" value="<?php echo ($order["person"]); ?>人" readonly />
        </div>
        <div class="form-group row" style="padding: 0 25px;">
            <label for="final-count" class="h4">最终价格:</label>
            <input type="text" class="form-control" id="final-count" value="<?php echo ($order["final_price"]); ?>" readonly />
        </div>
        <?php if($order['final_price'] == $order['total_price']): ?><div class="form-group row" style="padding: 0 25px;">
                <label for="coupon-num" class="h4">优惠券号码</label>
                <input type="text" name="coupon_num" class="form-control" id="coupon-num" />
                <input type="hidden" name="id" value="<?php echo ($order["id"]); ?>" />
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">提交</button>
            </div><?php endif; ?>
    </form>

    
</body>

</html>
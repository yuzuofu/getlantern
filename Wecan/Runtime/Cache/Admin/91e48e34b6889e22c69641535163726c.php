<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>微餐后台管理系统</title>

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
        <li>餐桌管理</li>
        <li>新增餐桌</li>
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
    
    
    <form <?php if(isset($_GET['id']) && $_GET['id']): ?>action="<?php echo U('Desk/edit');?>"<?php endif; ?> method="post">
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="desk-name" class="h4">餐桌名称</label>
                <input type="text" class="form-control" id="desk-name" name="desk_name" value="<?php echo ($desk["name"]); ?>" />
            </div>
        </div>
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="desk-size" class="h4">餐桌容量</label>
                <input type="text" class="form-control" id="desk-size" name="desk_size" value="<?php echo ($desk["capacity"]); ?>" />
            </div>
        </div>
        <div class="form-group row desk-control">
            <div class="col-md-4">
                <label for="desk-intro" class="h4">餐桌介绍</label>
                <textarea name="desk_intro" id="desk-intro" class="form-control" cols="30" rows="5" placeholder="请在这里输入餐桌的介绍吧..."><?php echo ($desk["intro"]); ?></textarea>
            </div>
        </div>
        <div>
            <?php if(isset($_GET['id'])): ?><input type="hidden" name="id" value="<?php echo ($desk["id"]); ?>" /><?php endif; ?>
        </div>
        <div class="form-group row desk-submit-btn">
            <button class="btn btn-primary" type="submit">提交</button>
        </div>
    </form>

    
</body>

</html>
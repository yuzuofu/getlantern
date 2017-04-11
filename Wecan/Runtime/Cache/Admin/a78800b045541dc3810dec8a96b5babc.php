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
        <li>餐桌管理</li>
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
    
    

    <div class="form-group">
        <button class="btn btn-primary" onclick="add_desk()">新增餐桌</button>
    </div>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>餐桌名称</th>
            <th>餐桌容量</th>
            <th>餐桌介绍</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($desk_list)): $i = 0; $__LIST__ = $desk_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$desk): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($desk["id"]); ?></td>
                <td><?php echo ($desk["name"]); ?></td>
                <td><?php echo ($desk["capacity"]); ?></td>
                <td><?php echo ($desk["intro"]); ?></td>
                <td>
                    <a href="<?php echo U('Desk/edit', array('id'=>$desk['id']));?>">编辑</a>
                    <?php if($desk['lock'] == 1): ?><a href="<?php echo U('Desk/unlock', array('id' => $desk['id']));?>">解除锁定</a><?php endif; ?>
                    <a data-toggle="modal" data-target="#myModal" href="<?php echo U('Desk/delete', array('id' => $desk['id']));?>">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

</body>

    <script>
        function add_desk(){
            var url = "<?php echo U('Desk/add');?>";
            window.location.href = url;
        }

        $("#myModal").on('hidden.bs.modal', function(){
            $(this).removeData("bs.modal");
        });
    </script>

</html>
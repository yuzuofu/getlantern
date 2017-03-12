<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>微餐后台管理系统</title>

    <!--  CSS样式文件  -->
    <!--  Bootstrap CSS Style  -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Wecan//Admin/Public/css/lightbox.min.css" />
    <link rel="stylesheet" href="Wecan//Admin/Public/css/admin.css" />

    <!--  JS文件  -->
    <!-- JQuery  -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="Wecan//Admin/Public/js/lightbox.min.js"></script>
    
</head>
<body>
    
    <!--  路径地图  -->
    <ol class="breadcrumb">
        <li>菜单管理</li>
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
    
    
    <div class="form-group" style="padding-left: 20px;">
        <button class="btn btn-primary" onclick="add_menu()">新增菜单</button>
    </div>
    <!--  预约数据列表  -->
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>菜名</th>
            <th>价格</th>
            <th>缩略图</th>
            <th>添加时间</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($menu["id"]); ?></td>
                <td><?php echo ($menu["name"]); ?></td>
                <td><?php echo ($menu["price"]); ?></td>
                <td><a href="<?php echo ($menu["pic"]); ?>" data-lightbox="image-<?php echo ($menu["id"]); ?>" title="<?php echo ($menu["name"]); ?>">点击查看</a></td>
                <td><?php echo date('Y-m-d H:i:s', $menu['create_time']);?></td>
                <td><?php echo ($menu["remark"]); ?></td>
                <td>
                    <a href="<?php echo U('Menu/edit', array('id'=>$menu['id']));?>">编辑</a>
                    <a href="<?php echo U('Menu/delete', array('id' => $menu['id']));?>" data-toggle="modal" data-target="#myModal">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    <div class="row text-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>

</body>

    <script>
        function add_menu(){
            var url = "<?php echo U('Menu/add');?>";
            window.location.href = url;
        }

        $("#myModal").on('hidden.bs.modal', function(){
            $(this).removeData("bs.modal");
        });
    </script>

</html>
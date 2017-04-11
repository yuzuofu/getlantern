<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>微餐</title>

    <!--  Bootstrap CSS Style  -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Wecan/Home/Public/css/bootstrap-buttons.css" />
    <link rel="stylesheet" href="Wecan/Home/Public/css/lightbox.min.css" />
    <link rel="stylesheet" href="Wecan/Home/Public/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="Wecan/Home/Public/css/main.css" />
    

    <!--JS文件-->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="Wecan/Home/Public/js/bootstrap-buttons.js"></script>
    <script src="Wecan/Home/Public/js/bootstrap-datetimepicker.min.js"></script>
    <script src="Wecan/Home/Public/js/lightbox.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand navbar-left">微餐</a>
            <button onclick="turntointro()" type="button" class="btn btn-default navbar-btn navbar-right pull-right" style="margin-right: 10px;">
                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</nav>

    <div class="container-fluid">
        <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><div class="row menu-box">
                <div class="col-xs-4 col-sm-4 menu-img">
                    <a href="<?php echo ($menu["pic"]); ?>" data-lightbox="image-1" title="pic1"><img src="<?php echo ($menu["pic"]); ?>" alt=""></a>
                </div>
                <div class="col-xs-8 col-sm-8">
                    <div class="row">
                        <span class="col-xs-6 col-sm-6 text-right menu-title"><?php echo ($menu["name"]); ?></span>
                        <span class="col-xs-6 col-sm-6 text-left menu-price"><i>￥<?php echo ($menu["price"]); ?></i></span>
                    </div>
                    <div class="row menu-add-btn">
                        <a href="<?php echo U('Order/menuDetail', array('mid' => $menu['id']));?>" data-target="#menuModal" data-toggle="modal" class="btn btn-block btn-primary">添加到菜单</a>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>


    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <form action="<?php echo U('Order/orderMenu');?>" method="post" id="form-menu-list">
                <div class="row with-padding">
                    <button onclick="add_menu()" class="btn btn-primary btn-block">下一步</button>
                </div>
            </form>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>


    <script>
        var menu_list = [];
        $("#menuModal").on('hidden.bs.modal', function(){
            $(this).removeData("bs.modal");
        });

        function confirm_count()
        {
            var menu_id = $("#menu-id").val();
            menu_list[menu_id] = $("#menu-count").val();
            $("#menuModal").modal('hide');
        }

        function add_menu()
        {
            var btn_div = $("#form-menu-list").children("div");
            for (var i = 0; i < menu_list.length; i++){
                if (menu_list[i]) {
                    var menu_html = "<input type='hidden' name='menu[" + i + "]' value='" + menu_list[i] + "' />";
                    btn_div.before(menu_html);
                }
            }
        }
    </script>

<script>
    function turntointro()
    {
        var turntourl = "<?php echo U('Index/intro');?>";
        window.location.href = turntourl;
    }
</script>
</body>
</html>
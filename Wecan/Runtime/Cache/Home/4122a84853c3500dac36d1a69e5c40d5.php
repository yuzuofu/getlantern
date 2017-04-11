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
        <div class="row with-padding-lg" style="margin: 0 5px;" id="img-container">
            <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-sm-6 imgbox">
                    <a href="<?php echo ($menu["pic"]); ?>" data-lightbox="image-<?php echo ($menu["id"]); ?>" title="pic<?php echo ($menu["id"]); ?>"><img src="<?php echo ($menu["pic"]); ?>" alt=""></a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>


    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-6 text-center">
                    <a href="<?php echo U('Order/orderDesk');?>" class="button button-block button-pill button-primary">我要预约</a>
                </div>
                <div class="col-sm-6 col-xs-6 text-center">
                    <span class="button-dropdown button-dropdown-plain" data-buttons="dropdown">
                        <button class="button button-block button-caution button-pill">
                            个人中心 <i class="fa fa-caret-up"></i>
                        </button>

                        <ul class="button-dropdown-list is-above">
                            <li><a href="<?php echo U('Customer/index');?>">我的预约</a></li>
                            <li><a href="<?php echo U('Customer/coupon');?>">我的优惠券</a></li>
                        </ul>
                    </span>
                </div>
            </div>
        </div>
    </nav>



<script>
    function turntointro()
    {
        var turntourl = "<?php echo U('Index/intro');?>";
        window.location.href = turntourl;
    }
</script>
</body>
</html>
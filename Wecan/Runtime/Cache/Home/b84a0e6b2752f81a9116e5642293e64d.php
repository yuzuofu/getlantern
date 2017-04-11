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
        <?php if(is_array($my_orders)): $i = 0; $__LIST__ = $my_orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$my_order): $mod = ($i % 2 );++$i;?><div class="row with-padding order-box">
                <div class="col-xs-8 col-sm-8">
                    <div class="row with-padding">
                        <label class="h5 col-xs-5 col-sm-5">预约时间:</label>
                        <span class="h5 pull-left col-xs-7 col-sm-7"><small><?php echo date('Y-m-d H:i:s', $my_order['create_time']);?></small></span>
                    </div>
                    <div class="row with-padding">
                        <label class="h5 col-xs-5 col-sm-5">桌&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号:</label>
                        <span class="h5 pull-left col-xs-7 col-sm-7"><small><?php echo ($my_order["dkname"]); ?></small></span>
                    </div>
                </div>
                <div class="col-xs-2 col-xs-2 box-gps">
                    <button class="btn-gps">导航</button>
                </div>
                <div class="col-xs-2 col-sm-2 box-cancel">
                    <a href="<?php echo U('Order/cancelOrder', array('id' => $my_order['id']));?>" data-target="#myModal" data-toggle="modal" class="btn-cancel">取消</a>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>


    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="row with-padding">
                <a href = "<?php echo U('Index/index');?>" class="btn btn-primary btn-block">首页</a>
            </div>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>


<script>
    function turntointro()
    {
        var turntourl = "<?php echo U('Index/intro');?>";
        window.location.href = turntourl;
    }
</script>
</body>
</html>
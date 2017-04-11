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
        <div class="list-group">
            <?php if(is_array($desk_list)): $i = 0; $__LIST__ = $desk_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$desk): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" onclick="check_desk(<?php echo ($desk['id']); ?>)" class="list-group-item">
                    <div class="row with-padding">
                        <div class="col-xs-12 col-sm-12 desk-number">
                            <span class="col-xs-6 col-sm-6 text-right desk-number-title">桌号&nbsp;&nbsp;&nbsp;:</span>
                            <span class="col-xs-6 col-sm-6 text-left desk-number-text"><?php echo ($desk["name"]); ?> <small style="color: #000;">号桌</small></span>
                        </div>
                        <div class="col-xs-12 col-sm-12">
                            <span class="col-xs-6 col-sm-6 text-right desk-number-title">用餐人数&nbsp;&nbsp;&nbsp;:</span>
                            <span class="col-xs-6 col-sm-6 text-left desk-number-text"><?php echo ($desk["capacity"]); ?> <small style="color: #000;">人</small></span>
                        </div>
                    </div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

    </div>


    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <form action="<?php echo U('Order/orderDesk');?>" id="form-desk" method="post">
                <input type="hidden" name="deskid" id="desk-id" value="">
            </form>
            <div class="row with-padding">
                <button type="button" onclick="click_next()" class="btn btn-primary btn-block">下一步</button>
            </div>
        </div>
    </nav>



    <script>
        function check_desk(dkid){
            var deskid = $("#desk-id").val();
            if (dkid) {
                deskid = dkid;
                $("#desk-id").val(deskid);
            }
        }

        function click_next(){
            var deskid = $("#desk-id").val();

            if (deskid) {
                $("#form-desk").submit();
            } else {
                window.alert("请选择相应的餐桌");
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
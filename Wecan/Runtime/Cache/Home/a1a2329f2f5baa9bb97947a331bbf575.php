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
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($intro); ?>
        </p>
    </div>


    <nav class="navbar navbar-default navbar-fixed-bottom" style="z-index: -1000;">
        <div class="container">
            <div class="row with-padding">
                <a href="<?php echo U('Index/index');?>" class="btn btn-primary btn-block">返回</a>
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
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微餐管理后台登录</title>
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
    
    
    
    <div class="modal show" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="text-center text-primary">登录</h1>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group-lg">
                            <label for="user-account" class="sr-only">账号</label>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                                <input type="text" class="form-control" id="user-account" name="username" placeholder="账号" required autofocus />
                            </div>
                        </div>
                        <br>
                        <div class="form-group-lg">
                            <label for="user-password" class="sr-only">密码</label>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
                                <input type="password" class="form-control" id="user-password" name="password" placeholder="密码">
                            </div>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <div class="row">
                                <button type="submit" class="btn btn-primary">登录</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
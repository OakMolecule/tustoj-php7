<!DOCTYPE html>
<html lang="<?php echo $OJ_LANG?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $MSG_REGISTER?></title>
    <?php include("template/$OJ_TEMPLATE/css.php");?>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Bootstrap Material Design -->
    <link href="/template/bs3/css/bootstrap-material-design/css/bootstrap-material-design.css" rel="stylesheet">
    <link href="/template/bs3/css/bootstrap-material-design/css/ripples.min.css" rel="stylesheet">
    <!-- Dropdown.js -->
    <link href="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" rel="stylesheet">

    <link href="https://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
    <link href="template/bs3/css/slick.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: #fff">



<div class="container">
    <?php include("template/$OJ_TEMPLATE/nav.php");?>
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form action="register.php" method="post">
                    <br><br>
                    <center><table>
                            <!-- 用户名 -->
                            <div class="form-group">
                                <label for="user_id" class="col-md-2 control-label"><?php echo $MSG_USER_ID ?></label>
                                <div class="col-md-10">
                                    <input name="user_id" type="text" class="form-control" id="user_id"
                                           placeholder="请输入您的学号">
                                </div>
                            </div>

                            <!-- 昵称 -->
                            <div class="form-group">
                                <label for="nick" class="col-md-2 control-label"><?php echo $MSG_NICK ?>:</label>
                                <div class="col-md-10">
                                    <input name="nick" type="text" class="form-control" id="inputEmail"
                                           placeholder="请输入您的昵称">
                                </div>
                            </div>

                            <!-- 密码 -->
                            <div class="form-group">
                                <label for="password" class="col-md-2 control-label"><?php echo $MSG_PASSWORD ?></label>
                                <div class="col-md-10">
                                    <input name="password" type="password" class="form-control" id="inputPassword"
                                           placeholder="请输入至少8位密码">
                                </div>
                            </div>

                            <!-- 重复密码 -->
                            <div class="form-group">
                                <label for="rptpassword"
                                       class="col-md-2 control-label"><?php echo $MSG_REPEAT_PASSWORD ?></label>
                                <div class="col-md-10">
                                    <input name="rptpassword" type="password" class="form-control" id="inputPassword"
                                           placeholder="请再次输入密码">
                                </div>
                            </div>

                            <!-- 学校 -->
                            <div class="form-group">
                                <label for="school" class="col-md-2 control-label"><?php echo $MSG_SCHOOL ?></label>
                                <div class="col-md-10">
                                    <select name="school" id="select111" class="form-control">
                                        <option><?php echo $MSG_TUST?></option>
                                    </select>
                                </div>
                            </div>

                            <!-- 电子邮件 -->
                            <div class="form-group">
                                <label for="email" class="col-md-2 control-label"><?php echo $MSG_EMAIL ?></label>
                                <div class="col-md-10">
                                    <input name="email" type="email" class="form-control" id="inputEmail"
                                           placeholder="请输入您的邮箱">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button name="submit" type="submit" class="btn btn-primary"><?php echo $MSG_SUBMIT ?></button>
                                    <button name="reset" type="reset" class="btn btn-default"><?php echo $MSG_RESET ?></button>
                                </div>
                            </div>
                        </table></center>
                    <br><br>
                </form>

            </div>
        </div>
    </div>
</div><!-- /container -->
<div style="height: 20px;"></div>
<?php include("oj-footer.php");?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include("template/$OJ_TEMPLATE/js.php");?>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="template/bs3/css/bootstrap-material-design/js/material.min.js">
    </script>
    <script src="template/bs3/css/bootstrap-material-design/js/ripples.min.js" ></script>

    <script>
        $("input").attr("class","form-control");
        $.material.init();
    </script>
</body>
</html>

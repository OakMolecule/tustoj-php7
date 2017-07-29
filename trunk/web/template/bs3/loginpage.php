<!DOCTYPE html>
<html lang="<?php echo $OJ_LANG ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $MSG_LOGIN ?></title>
    <?php include("template/$OJ_TEMPLATE/css.php"); ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
    <?php include("template/$OJ_TEMPLATE/nav.php"); ?>
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form action="login.php" method="post" role="form" class="form-horizontal">


                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo $MSG_USER_ID ?></label>
                        <div class="col-md-10">
                            <input name="user_id" class="form-control" placeholder="<?php echo $MSG_USER_ID ?>"
                                   type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo $MSG_PASSWORD ?></label>
                        <div class="col-md-10"><input name="password" class="form-control"
                                                      placeholder="<?php echo $MSG_PASSWORD ?>" type="password"></div>
                    </div>
                    <?php if ($OJ_VCODE) { ?>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo $MSG_VCODE ?></label>
                            <div class="col-md-10"><input name="vcode" class="form-control" type="text"></div>
                            <div class="col-sm-4"><img alt="click to change" src="vcode.php"
                                                       onclick="this.src='vcode.php?'+Math.random()" height="30px">*
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button name="submit" type="submit"
                                    class="btn btn-default btn-block"><?php echo $MSG_LOGIN; ?></button>
                        </div>
                        <div class="col-md-10 col-md-offset-2">
                            <a class="btn btn-default btn-block"
                               href="lostpassword.php"><?php echo $MSG_LOST_PASSWORD; ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- /container -->
<div style="height: 20px;"></div>
<?php include("oj-footer.php"); ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php include("template/$OJ_TEMPLATE/js.php"); ?>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<script language="javascript" type="text/javascript"
        src="template/bs3/css/bootstrap-material-design/js/material.min.js">
</script>
<script src="template/bs3/css/bootstrap-material-design/js/ripples.min.js"></script>

<script>
    $("input").attr("class", "form-control");
    $.material.init();
</script>
</body>
</html>

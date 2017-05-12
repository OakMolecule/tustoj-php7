<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
require_once("./db_info.inc.php");
if(isset($OJ_LANG)){
    require_once("../lang/$OJ_LANG.php");
}else {
    require_once("./lang/en.php");
}

$profile="";
if (isset($_SESSION['user_id'])){
    $sid=$_SESSION['user_id'];
    $profile.="<ul class='nav navbar-nav nav_margin_right nav_font'><li><a href='./userinfo.php?user=$sid'><span id=red>$sid</span></a></li>";
    $profile.="<li><a href='./status.php?user_id=$sid'><span id=red>$MSG_RECENT</span></a></li>";
    $profile.="<li><i class=icon-user></i><a href=./modifypage.php>$MSG_USERINFO</a></li>";

    $profile.= "<li><a href='./logout.php' target='_top' >$MSG_LOGOUT</a></li>";
}else{
    if ($OJ_WEIBO_AUTH){
        $profile.= "<li><a href=./login_weibo.php>$MSG_LOGIN(WEIBO)</a>&nbsp;</li>";
    }
    if ($OJ_RR_AUTH){
        $profile.= "<li><a href=./login_renren.php>$MSG_LOGIN(RENREN)</a>&nbsp;</li>";
    }
    if ($OJ_QQ_AUTH){
        $profile.= "<li><a href=./login_qq.php>$MSG_LOGIN(QQ)</a>&nbsp;</li>";
    }
    $profile.= "<ul class='nav navbar-nav nav_margin_right'><li><a href=./loginpage.php><i class='fa fa-sign-in'></i>$MSG_LOGIN</a></li>";
    if($OJ_LOGIN_MOD=="tustoj"){
        $profile.= "<li><a href=./registerpage.php><i class='fa fa-unlock'></i>$MSG_REGISTER</a></li>";
    }
}


if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
    $profile.= "<li><a href=./admin/>$MSG_ADMIN</a></li></ul>";
} else {
    $profile .= "</ul>";
}

?>
document.write("<?php echo ( $profile);?>");

<?php
$cache_time=1;
$OJ_CACHE_SHARE=false;
require_once('./include/cache_start.php');
require_once('./include/db_info.inc.php');
require_once('./include/const.inc.php');
require_once('./include/setlang.php');
$now=strftime("%Y-%m-%d %H:%M",time());
if (isset($_GET['cid']))
    $ucid="&cid=".intval($_GET['cid']);
else
    $ucid="";

$view_title=$MSG_SUBMIT;
if (!isset($_SESSION['user_id'])){

    $view_errors= "<a href=loginpage.php>$MSG_Login</a>";
    require("template/".$OJ_TEMPLATE."/error.php");
    exit(0);
//	$_SESSION['user_id']="Guest";
}

$pr_flag=false;
$co_flag=false;
if (isset($_GET['id'])){
    $id=intval($_GET['id']);
    $sample_sql="select sample_input,sample_output,problem_id from problem where problem_id=$id";
    if (!isset($_SESSION['administrator']) && $id!=1000&&!isset($_SESSION['contest_creator']))
        $sql="SELECT * FROM `problem` WHERE `problem_id`=$id AND `defunct`='N' AND `problem_id` NOT IN (
                                SELECT `problem_id` FROM `contest_problem` WHERE `contest_id` IN(
                                                SELECT `contest_id` FROM `contest` WHERE `end_time`>'$now' or `private`='1'))
                                ";
    else
        $sql="SELECT * FROM `problem` WHERE `problem_id`=$id";

    $pr_flag = true;
}else if (isset($_GET['cid'])&&isset($_GET['pid'])){
    $cid=intval($_GET['cid']);
    $pid=intval($_GET['pid']);
    $sample_sql="select sample_input,sample_output,problem_id from problem where problem_id in (select problem_id from contest_problem where contest_id=$cid and num=$pid)";

    $cid=intval($_GET['cid']);
    $pid=intval($_GET['pid']);

    if (!isset($_SESSION['administrator']))
        $sql="SELECT langmask,private,defunct FROM `contest` WHERE `defunct`='N' AND `contest_id`=$cid AND `start_time`<='$now'";
    else
        $sql="SELECT langmask,private,defunct FROM `contest` WHERE `defunct`='N' AND `contest_id`=$cid";
    $result=mysqli_query($mysqli,$sql);
    $row_problems_cnt=mysqli_num_rows($result);
    $row_problem=mysqli_fetch_row($result);
    $contest_ok=true;
    if ($row_problem[1] && !isset($_SESSION['c'.$cid])) $contest_ok=false;
    if ($row_problem[2]=='Y') $contest_ok=false;
    if (isset($_SESSION['administrator'])) $contest_ok=true;


    $ok_cnt=$rows_cnt==1;
    $langmask=$row_problem[0];
    mysqli_free_result($result);
    if ($ok_cnt!=1){
        // not started
        $view_errors=  "No such Contest!";

        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
    }else{
        // started
        $sql="SELECT * FROM `problem` WHERE `defunct`='N' AND `problem_id`=(
                        SELECT `problem_id` FROM `contest_problem` WHERE `contest_id`=$cid AND `num`=$pid
                        )";
    }
    // public
    if (!$contest_ok){

        $view_errors= "Not Invited!";
        require("template/".$OJ_TEMPLATE."/error.php");
        exit(0);
    }
    $co_flag=true;
}else{
    $view_errors=  "<title>$MSG_NO_SUCH_PROBLEM</title><h2>$MSG_NO_SUCH_PROBLEM</h2>";
    require("template/".$OJ_TEMPLATE."/error.php");
    exit(0);
}
$result=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));






if (mysqli_num_rows($result)!=1){
    $view_errors="";
    if(isset($_GET['id'])){
        $id=intval($_GET['id']);
        mysqli_free_result($result);
        $sql="SELECT  contest.`contest_id` , contest.`title`,contest_problem.num FROM `contest_problem`,`contest` WHERE contest.contest_id=contest_problem.contest_id and `problem_id`=$id and defunct='N'  ORDER BY `num`";
        //echo $sql;
        $result=mysqli_query($mysqli,$sql);
        if($i=mysqli_num_rows($result)){
            $view_errors.= "This problem is in Contest(s) below:<br>";
            for (;$i>0;$i--){
                $row_problem=mysqli_fetch_row($result);
                $view_errors.= "<a href=problem.php?cid=$row_problem[0]&pid=$row_problem[2]>Contest $row_problem[0]:$row_problem[1]</a><br>";
            }
        }else{
            $view_title= "<title>$MSG_NO_SUCH_PROBLEM!</title>";
            $view_errors.= "<h2>$MSG_NO_SUCH_PROBLEM!</h2>";
        }
    }else{
        $view_title= "<title>$MSG_NO_SUCH_PROBLEM!</title>";
        $view_errors.= "<h2>$MSG_NO_SUCH_PROBLEM!</h2>";
    }
    require("template/".$OJ_TEMPLATE."/error.php");
    exit(0);
}else{
    $row_problem=mysqli_fetch_object($result);

    $view_title= $row_problem->title;

}
mysqli_free_result($result);






$view_src="";
if(isset($_GET['sid'])){
    $sid=intval($_GET['sid']);
    $sql="SELECT * FROM `solution` WHERE `solution_id`=".$sid;
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_object($result);
    if ($row && $row->user_id==$_SESSION['user_id']) $ok=true;
    if (isset($_SESSION['source_browser'])) $ok=true;
    mysqli_free_result($result);
    if ($ok==true){
        $sql="SELECT `source` FROM `source_code_user` WHERE `solution_id`='".$sid."'";
        $result=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_object($result);
        if($row)
            $view_src=$row->source;
        mysqli_free_result($result);
    }

}
if(isset($id))$problem_id=$id;
$view_sample_input="1 2";
$view_sample_output="3";
if(isset($sample_sql)){
    //echo $sample_sql;
    $result=mysqli_query($mysqli,$sample_sql);
    $row=mysqli_fetch_array($result);
    $view_sample_input=$row[0];
    $view_sample_output=$row[1];
    $problem_id=$row[2];
    mysqli_free_result($result);


}

if(!$view_src){
    if(isset($_COOKIE['lastlang']))
        $lastlang=intval($_COOKIE['lastlang']);
    else
        $lastlang=0;
    $template_file="$OJ_DATA/$problem_id/template.".$language_ext[$lastlang];
    if(file_exists($template_file)){
        $view_src=file_get_contents($template_file);
    }

}

/////////////////////////Template
require("template/".$OJ_TEMPLATE."/submitpage.php");
/////////////////////////Common foot
if(file_exists('./include/cache_end.php'))
    require_once('./include/cache_end.php');
?>


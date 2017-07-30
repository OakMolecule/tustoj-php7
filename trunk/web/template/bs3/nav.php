<?php
$url = basename($_SERVER['REQUEST_URI']);
$dir = basename(getcwd());
if ($dir == "discuss3") $path_fix = "../";
else $path_fix = "";

if (file_exists("./admin/msg.txt"))
    $view_marquee_msg = file_get_contents($OJ_SAE ? "saestor://web/msg.txt" : "./admin/msg.txt");
if (file_exists("../admin/msg.txt"))
    $view_marquee_msg = file_get_contents($OJ_SAE ? "saestor://web/msg.txt" : "../admin/msg.txt");
?>

<nav class="navbar navbar-default " style="color: #FFFFFF;" role="navigation">
    <div class="main-header text-center"><p>通知</p>
        <img src="img/small_point.png"/>
        <p><?php echo $view_marquee_msg; ?></p></div>
    <div class="container-fluid navbar-shadow" id="white">
        <div class="navbar-header">
            <a class="navbar-brand">天津科技大学</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <?php $ACTIVE = "class='active'" ?>
                <li>
                    <a href="<?php echo $OJ_HOME ?>"><?php echo $MSG_HOME ?></a>
                </li>
                <li>
                    <a <?php if ($url == "problemset.php") echo "$ACTIVE"; ?>
                            href="problemset.php"><?php echo $MSG_PROBLEMS ?></a>
                </li>
                <li>
                    <a <?php if ($url == "status.php") echo "$ACTIVE"; ?>
                            href="status.php"><?php echo $MSG_STATUS ?> </a>
                </li>
                <li>
                    <a <?php if ($url == "ranklist.php") echo "$ACTIVE"; ?>
                            href="ranklist.php"><?php echo $MSG_RANKLIST ?></a>
                </li>
                <li>
                    <a <?php if ($url == "contest.php") echo "$ACTIVE"; ?>
                            href="contest.php"><?php echo $MSG_CONTEST ?></a>
                </li>
                <li>
                    <a <?php if ($url == (isset($OJ_FAQ_LINK) ? $OJ_FAQ_LINK : "faqs.php")) echo " $ACTIVE"; ?>
                            href="<?php echo isset($OJ_FAQ_LINK) ? $OJ_FAQ_LINK : "faqs.php" ?>"><?php echo "$MSG_FAQ" ?></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <script src="/include/profile.php?<?php echo rand(); ?>"></script>
            </ul>
            <!--
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"> SIGN IN</a></li>
            </ul>
            -->
        </div>

    </div>
</nav>



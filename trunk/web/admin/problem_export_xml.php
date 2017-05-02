<?php
@session_start ();
require_once ("../include/db_info.inc.php");

if(!isset($OJ_LANG)){
	$OJ_LANG="en";
}
require_once("../lang/$OJ_LANG.php");
require_once("../include/const.inc.php");
function fixcdata($content){
    return str_replace("]]>","]]]]><![CDATA[>",$content);
}
function getTestFileIn($pid, $testfile,$OJ_DATA) {
	if ($testfile != "")
		return file_get_contents ( "$OJ_DATA/$pid/" . $testfile . ".in" );
	else
		return "";
}
function getTestFileOut($pid, $testfile,$OJ_DATA) {
	if ($testfile != "")
		return file_get_contents (  );
	else
		return "";
}
function printTestCases($pid,$OJ_DATA){

if(strstr($OJ_DATA,"saestor:"))     {
  // echo "<debug>$pid</debug>";
       $store = new SaeStorage();
           $ret = $store->getList("data", "$pid",100,0 );
            foreach($ret as $file) {
              //          echo "<debug>$file</debug>";
              
              if(!strstr($file,"sae-dir-tag")){
                    
                    $pinfo = pathinfo ( $file );
		if (isset($pinfo ['extension'])
			&&$pinfo ['extension'] == "in" 
			&& $pinfo ['basename'] != "sample.in") {
			$f = basename ( $pinfo ['basename'], "." . $pinfo ['extension'] );
			
			$outfile="$pid/" . $f . ".out";
			$infile="$pid/" . $f . ".in";
			if( $store->fileExists ("data",$infile)){
				echo "<test_input><![CDATA[".fixcdata($store->read ("data",$infile))."]]></test_input>\n";
			}if($store->fileExists ("data",$outfile)){
				echo "<test_output><![CDATA[".fixcdata($store->read ("data",$outfile))."]]></test_output>\n";
			}
//			break;
		}
                    
                    
                    
              }
                    
            }

}else{


	$ret = "";
	$pdir = opendir ( "$OJ_DATA/$pid/" );
	while ( $file = readdir ( $pdir ) ) {
		$pinfo = pathinfo ( $file );
		if (isset($pinfo ['extension'])
			&&$pinfo ['extension'] == "in" 
			&& $pinfo ['basename'] != "sample.in") {
			$ret = basename ( $pinfo ['basename'], "." . $pinfo ['extension'] );
			
			$outfile="$OJ_DATA/$pid/" . $ret . ".out";
			$infile="$OJ_DATA/$pid/" . $ret . ".in";
			if(file_exists($infile)){
				echo "<test_input><![CDATA[".fixcdata(file_get_contents ($infile))."]]></test_input>\n";
			}if(file_exists($outfile)){
				echo "<test_output><![CDATA[".fixcdata(file_get_contents ($outfile))."]]></test_output>\n";
			}
//			break;
		}
	}
	closedir ( $pdir );
	return $ret;
}
}
class Solution{
  var $language="";
  var $source_code="";	
}
function getSolution($pid,$lang){
	$ret=new Solution();
	$mysqli=$GLOBALS['mysqli'];
	$language_name=$GLOBALS['language_name'];
        $con=false;
	if(isset($OJ_SAE)&&$OJ_SAE)     {
                $OJ_DATA="saestor://data/";
        //  for sae.sina.com.cn
               $con= mysqli_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
               
        }else{
                //for normal install
                        
        }
	if (!$con)
    {
      //  die('Could not connect: ' . mysqli_error($mysqli));
    }
	mysqli_query($mysqli,"set names utf8",$con);
	$sql = "select `solution_id`,`language` from solution where problem_id=$pid and result=4 and language=$lang limit 1";
//	echo $sql;
	$result = mysqli_query($mysqli,$sql,$con ) ;
	if($result&&$row = mysqli_fetch_row ( $result) ){
		$solution_id=$row[0];
		$ret->language=$language_name[$row[1]];
		
		mysqli_free_result($result);
		$sql = "select source from source_code where solution_id=$solution_id";
		$result = mysqli_query($mysqli, $sql ) or die ( mysqli_error($mysqli) );
		if($row = mysqli_fetch_object ( $result) ){
			$ret->source_code=$row->source;
			
		}
		mysqli_free_result($result);
	}
        if($con)mysqli_close($con);
	return $ret;
}
function fixurl($img_url){
   $img_url= html_entity_decode( $img_url,ENT_QUOTES,"UTF-8");
   
	if (substr($img_url,0,7)!="http://"){
	  if(substr($img_url,0,1)=="/"){
	     	$ret='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$img_url;
     }else{
     		$path= dirname($_SERVER['PHP_SELF']);
	      $ret='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$path."/../".$img_url;
     }
   }else{
   	$ret=$img_url;
   }
   return  $ret;
} 
function image_base64_encode($img_url){
    $img_url=fixurl($img_url);
	$handle = @fopen($img_url, "rb");
	if($handle){
		$contents = stream_get_contents($handle);
		$encoded_img= base64_encode($contents);
		fclose($handle);
		return $encoded_img;
	}else
		return false;
}
function getImages($content){
    preg_match_all("<[iI][mM][gG][^<>]+[sS][rR][cC]=\"?([^ \"\>]+)/?>",$content,$images);
    return $images;
}

function fixImageURL(&$html,&$did){
   $images=getImages($html);
   $imgs=array_unique($images[1]);
   foreach($imgs as $img){
		  $html=str_replace($img,fixurl($img),$html); 
		  //print_r($did);
		  if(!in_array($img,$did)){
			  $base64=image_base64_encode($img);
			  if($base64){
				  echo "<img><src><![CDATA[";
				  echo fixurl($img);
				  echo "]]></src><base64><![CDATA[";
				  echo $base64;
				  echo "]]></base64></img>";   
			 }
			 array_push($did,$img);
		 }
   }   	
}

if (! isset ( $_SESSION ['administrator'] )) {
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit ( 1 );
}


if (isset($_POST ['do'])||isset($_GET['cid'])) {
   if(isset($_POST ['in'])&&strlen($_POST ['in'])>0){
	require_once("../include/check_post_key.php");
   	$in=mysqli_real_escape_string ($mysqli, $_POST ['in'] );
   	$sql = "select * from problem where problem_id in($in)";
   	  $filename="-$in";
   }else if (isset($_GET['cid'])){
	  require_once("../include/check_get_key.php");
	  $cid=intval( $_GET['cid'] );
      $sql= "select title from contest where contest_id='$cid'";
      $result = mysqli_query($mysqli, $sql ) or die ( mysqli_error ($mysqli) );
      $row = mysqli_fetch_object ( $result );
      $filename='-'.$row->title;
      mysqli_free_result ( $result );
      $sql = "select * from problem where problem_id in(select problem_id from contest_problem where contest_id=$cid)";
	  
   }else{
	   require_once("../include/check_post_key.php");
	   $start = intval ( $_POST ['start'] );
		$end = intval ( $_POST ['end'] );
	 	$sql = "select * from problem where problem_id>=$start and problem_id<=$end";
       $filename="-$start-$end";
   }

	
	//echo $sql;
	$result = mysqli_query($mysqli, $sql ) or die ( mysqli_error ($mysqli) );
	
	if (isset($_POST ['submit'])&&$_POST ['submit'] == "Export")
		header ( 'Content-Type:   text/xml' );
	else {
		header ( "content-type:   application/file" );
		header ( "content-disposition:   attachment;   filename=\"fps-".$_SESSION['user_id'].$filename.".xml\"" );
	}
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
  
	?>
   
<fps version="1.2" url="https://github.com/zhblue/freeproblemset/">
	<generator name="TUSTOJ" url="https://github.com/zhblue/tustoj/"/>
	<?php
	while ( $row = mysqli_fetch_object ( $result ) ) {
		
		?>
<item>
<title><![CDATA[<?php echo $row->title?>]]></title>
<time_limit unit="s"><![CDATA[<?php echo $row->time_limit?>]]></time_limit>
<memory_limit unit="mb"><![CDATA[<?php echo $row->memory_limit?>]]></memory_limit>

<?php
	$did=array();
	fixImageURL($row->description,$did);
	fixImageURL($row->input,$did);
	fixImageURL($row->output,$did);
	fixImageURL($row->hint,$did);
	
?>
<description><![CDATA[<?php echo $row->description?>]]></description>
<input><![CDATA[<?php echo $row->input?>]]></input> 
<output><![CDATA[<?php echo $row->output?>]]></output>
<sample_input><![CDATA[<?php echo $row->sample_input?>]]></sample_input>
<sample_output><![CDATA[<?php echo $row->sample_output?>]]></sample_output>
  <?php printTestCases($row->problem_id,$OJ_DATA)?>
<hint><![CDATA[<?php echo $row->hint?>]]></hint>
<source><![CDATA[<?php echo fixcdata($row->source)?>]]></source>
<?php
$pid=$row->problem_id;
for ($lang=0;$lang<count($language_ext);$lang++){

	$solution=getSolution($pid,$lang);
	if ($solution->language){?>
		<solution language="<?php echo $solution->language?>"><![CDATA[<?php echo fixcdata($solution->source_code)?>]]></solution>
	<?php 
	}
	$pta=array("prepend","template","append");
	foreach($pta as $pta_file){
		$append_file="$OJ_DATA/$pid/$pta_file.".$language_ext[$lang];
//		echo "<filename value=\"$lang  $append_file $language_ext[$lang]\"/>";
		if (file_exists($append_file)){?>
			<<?php echo $pta_file?> language="<?php echo $language_name[$lang]?>"><![CDATA[<?php echo fixcdata(file_get_contents($append_file))?>]]></<?php echo $pta_file?>>
		<?php 
		}
	}
}
?>
<?php
 if($row->spj!=0){
 	$filec="$OJ_DATA/".$row->problem_id."/spj.c";
 	$filecc="$OJ_DATA/".$row->problem_id."/spj.cc";
 	
 	if(file_exists( $filec )){
		echo "<spj language=\"C\"><![CDATA[";
 		echo fixcdata(file_get_contents ($filec ));
 		echo "]]></spj>";
	}
 	elseif(file_exists( $filecc )){
 	    echo "<spj language=\"C++\"><![CDATA[";
 		echo fixcdata(file_get_contents ($filecc ));
 		echo "]]></spj>";
 	}
 }
?>
</item>
<?php }
	mysqli_free_result ( $result );
	
	echo "</fps>";

}
?>


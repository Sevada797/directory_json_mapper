<?php

//error_reporting(0);
/*
I am going to create smth crazy <3
STRUCT:
dirs[]

recurs untill dirs[] is returned empty

we can use binary tree algorithm recurse one dir till no dirs are left 

        -
       / \
      /\  \
     /\ \ |\ 
    /  \//\/\    
or 
*/


$ROOTTREE=new stdClass();
$ROOTTREE->{"/"}=[];
//echo json_encode($ROOTTREE);
/*array_push($ROOTTREE->{"/"}, "test");
echo json_encode($ROOTTREE);
*/


function norecurse($parentdir) {
$ROOTTREE=$GLOBALS['ROOTTREE'];
$files=explode("\n", shell_exec("ls -l"));
$dirs=[];

for ($i=1; $i<(count($files)-1); $i++) {
$tempObj=new stdClass();
$tempObj->name=explode(" ", $files[$i])[ (count(explode(" ", $files[$i])) - 1)] ;

if ($files[$i][0]=="d") {
$tempObj->isDirectory=TRUE;
}
else {$tempObj->isDirectory=FALSE;}

array_push($ROOTTREE->$parentdir, $tempObj);


/*else {
    $tempObj=new stdClass();
    $tempObj->name=explode(" ", $files[$i])[ (count(explode(" ", $files[$i])) - 1)] ;
    $tempObj->isDirectory=FALSE;
    array_push($ROOTTREE->$parentdir, $tempObj);

}*/

}

echo json_encode($ROOTTREE);

}

norecurse("/");



//echo var_dump($files);
//st

/*
$f=fopen("root.json", "w");
fwrite($f, $root_tree);
fclose($f);
*/

/*
$k=new stdClass();
$k->{"/"}="testt";
echo var_dump($k);
*/


?>

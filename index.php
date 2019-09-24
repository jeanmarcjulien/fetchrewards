<?php

//retrieve the user input and setup some variables
$query= $_GET['query'];
$charCounts = [];
$char =$query[0];   
$isPyramid=true;

//as long as there are no more characters to check
while($query !=""){

    //check/add the current character occurences to new array
    //then remove it from string
    $char =$query[0];
    array_push($charCounts, count(split($char, $query))-1);
    $query = str_replace($char, "", $query);

}

//sort the array with number of character occurrences
sort($charCounts);

//loop through character occurences array in sequence 1,2,3...
//if sequence is not consistent then break and return false
//otherwise return true
for($i=0;$i<=count($charCounts)-1;$i++){

  if($charCounts[$i]==$i+1){
  }else{
    $isPyramid=false;
    break;
  }
}

//return the data as json
$data = [ 'query' => $_GET['query'], 'isPyramid' => $isPyramid ];
header('Content-type: application/json');
echo json_encode( $data );

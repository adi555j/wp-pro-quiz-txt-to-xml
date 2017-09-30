<?php
require_once("inc/grab.php");

$filename = "x.txt";
$outputFile = "y.xml";
$quizProps = [
         "title"                => "Nabard Grade A & B 2017 Exam Mcq On Paper 2 Agriculture",
         "totalQuestions"       => "32",
         "totalQuestionDisplay" => "20",
         "time"                 => "10",
         "displayDescription"   => "Nabard Grade A & B 2017 Exam Mcq On Paper 2 Agriculture"
        ];

$questionProps = [
          "optionFormat"        => "a.",  // like a. , A. 
          "answerFormat"        => "ANSWER:"  // like ANSWER:  ,Answer: 
          //"questionNoFormat"    => "",  // like 1. , 1) ,(1)
        ];        

copy($filename, "temp.txt");
$filename = "temp.txt";
$handle = fopen($filename, "r");

$read = fread($handle, filesize($filename));


fclose($handle);



$k = new grabber();
//$k->grabQuestion("temp.txt",$x);
//$y = $k->grabOptions($filename);
//foreach($y as $value){echo $value;}
//echo $k->grabAnswer($filename,$x);
$k->printOutput($filename, $outputFile, $quizProps, $questionProps);



?>
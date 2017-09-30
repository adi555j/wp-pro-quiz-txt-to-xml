<?php

class grabber {

 function printOutput($file, $outputFile, $quizProps, $questionProps){
  $qno = 1;
  $str = "";
  file_put_contents($outputFile, $str);
  $str = '<?xml version="1.0" encoding="utf-8" ?> 
 <wpProQuiz>
  <header version="0.37" exportVersion="1" /> 
 <data>
 <quiz>
 <title titleHidden="false">
 <![CDATA[ '.$quizProps["title"].'
  ]]> 
  </title>
 <text>
 <![CDATA[ 
'.$quizProps["displayDescription"].'
Total question: '.$quizProps["totalQuestionDisplay"].'
Time:'.$quizProps["time"].'mins
  ]]> 
  </text>
  <category>General knowledge 2017 directory</category> 
 <resultText gradeEnabled="false">
 <![CDATA[ 
Thanks for giving the test.
good luck :)

  ]]> 
  </resultText>
  <btnRestartQuizHidden>false</btnRestartQuizHidden> 
  <btnViewQuestionHidden>false</btnViewQuestionHidden> 
  <questionRandom>true</questionRandom> 
  <answerRandom>true</answerRandom> 
  <timeLimit>600</timeLimit> 
  <showPoints>false</showPoints> 
  <statistic activated="false" ipLock="1440" /> 
  <quizRunOnce type="1" cookie="false" time="0">false</quizRunOnce> 
  <numberedAnswer>false</numberedAnswer> 
  <hideAnswerMessageBox>false</hideAnswerMessageBox> 
  <disabledAnswerMark>false</disabledAnswerMark> 
  <showMaxQuestion showMaxQuestionValue="'.$quizProps["totalQuestionDisplay"].'" showMaxQuestionPercent="false">true</showMaxQuestion> 
 <toplist activated="true">
  <toplistDataAddPermissions>1</toplistDataAddPermissions> 
  <toplistDataSort>1</toplistDataSort> 
  <toplistDataAddMultiple>true</toplistDataAddMultiple> 
  <toplistDataAddBlock>20</toplistDataAddBlock> 
  <toplistDataShowLimit>1</toplistDataShowLimit> 
  <toplistDataShowIn>1</toplistDataShowIn> 
  <toplistDataCaptcha>false</toplistDataCaptcha> 
  <toplistDataAddAutomatic>false</toplistDataAddAutomatic> 
  </toplist>
  <showAverageResult>true</showAverageResult> 
  <prerequisite>false</prerequisite> 
  <showReviewQuestion>true</showReviewQuestion> 
  <quizSummaryHide>false</quizSummaryHide> 
  <skipQuestionDisabled>false</skipQuestionDisabled> 
  <emailNotification>0</emailNotification> 
  <userEmailNotification>false</userEmailNotification> 
  <showCategoryScore>false</showCategoryScore> 
  <hideResultCorrectQuestion>false</hideResultCorrectQuestion> 
  <hideResultQuizTime>false</hideResultQuizTime> 
  <hideResultPoints>false</hideResultPoints> 
  <autostart>false</autostart> 
  <forcingQuestionSolve>false</forcingQuestionSolve> 
  <hideQuestionPositionOverview>false</hideQuestionPositionOverview> 
  <hideQuestionNumbering>false</hideQuestionNumbering> 
  <sortCategories>false</sortCategories> 
  <showCategory>false</showCategory> 
  <quizModus questionsPerPage="0">1</quizModus> 
  <startOnlyRegisteredUser>false</startOnlyRegisteredUser> 
 <adminEmail>
  <to /> 
  <form /> 
  <subject>Wp-Pro-Quiz: One user completed a quiz</subject> 
  <html>false</html> 
 <message>
 <![CDATA[ 
Wp-Pro-Quiz

The user "$username" has completed "$quizname" the quiz.

Points: $points
Result: $result



  ]]> 
  </message>
  </adminEmail>
 <userEmail>
  <to>-1</to> 
  <toUser>false</toUser> 
  <toForm>false</toForm> 
  <form /> 
  <subject>Wp-Pro-Quiz: One user completed a quiz</subject> 
  <html>false</html> 
 <message>
 <![CDATA[ 
Wp-Pro-Quiz

You have completed the quiz "$quizname".

Points: $points
Result: $result



  ]]> 
  </message>
  </userEmail>
  <forms activated="false" position="0" /> 
 <questions>
';
 file_put_contents($outputFile, $str);

  while($qno <= $quizProps["totalQuestions"]){
  $question = $this->grabQuestion($file, $qno, $questionProps);
  
  echo "<b>".$qno.")</b>";
  echo $question."<br />";

  $category = "General knowledge";
  $x = $this->grabOptions($file);
  $answers = [
            "a." => $x[0],
            "b." => $x[1],
            "c." => $x[2],
            "d." => $x[3]
  ];
  $actans = $this->grabAnswer($file ,$qno, $questionProps);
  if($actans == null){echo "<b>-----error:answer not found------</b>"; exit();}
  $correct = $answers["$actans"];
  $option = [];
  $i=0;
  foreach($answers as $answer){
    echo $answer."<br />";
    if($answer == $answers["$actans"]){}
    else{
      $option[$i] = $answer;
      $i++;   
    }
  }

  $str = '
  <question answerType="single">
  <title>
   <![CDATA[ Question: '.$qno.']]> 
  </title>
  <points>1</points> 
  <questionText>
   <![CDATA[' .$question. ']]> 
  </questionText>
 <correctMsg>
 <![CDATA[ ]]> 
  </correctMsg>
 <incorrectMsg>
 <![CDATA[ ]]> 
  </incorrectMsg>
 <tipMsg enabled="false">
 <![CDATA[ ]]> 
  </tipMsg>
  <category>'.$category.'</category> 
  <correctSameText>false</correctSameText> 
  <showPointsInBox>false</showPointsInBox> 
  <answerPointsActivated>false</answerPointsActivated> 
  <answerPointsDiffModusActivated>false</answerPointsDiffModusActivated> 
  <disableCorrect>false</disableCorrect> 
 <answers>
 <answer points="1" correct="false">
 <answerText html="false">
 <![CDATA[ '.$option[0].']]> 
  </answerText>
 <stortText html="false">
 <![CDATA[ ]]> 
  </stortText>
  </answer>
 <answer points="1" correct="false">
 <answerText html="false">
 <![CDATA[ '.$option[1].']]> 
  </answerText>
 <stortText html="false">
 <![CDATA[ ]]> 
  </stortText>
  </answer>
 <answer points="1" correct="true">
 <answerText html="false">
 <![CDATA[ '.$correct.']]> 
  </answerText>
 <stortText html="false">
 <![CDATA[ ]]> 
  </stortText>
  </answer>
 <answer points="1" correct="false">
 <answerText html="false">
 <![CDATA[ '.$option[2].']]> 
  </answerText>
 <stortText html="false">
 <![CDATA[ ]]> 
  </stortText>
  </answer>
  </answers>
  </question>';
  file_put_contents($outputFile, $str, FILE_APPEND);
  $qno++;
  }

  $str = '  </questions>
  </quiz>
  </data>
  </wpProQuiz>';
  file_put_contents($outputFile, $str, FILE_APPEND);
 }

 function grabQuestion($file, $question_no, $questionProps){
  $contents = file_get_contents($file);
  $contents = file_get_contents($file, null, null, strpos($contents, $question_no."."),strpos($contents, $questionProps["optionFormat"])-strpos($contents, $question_no."."));
  $toReplace = $contents;
  $pattern = preg_quote($question_no ."." , '');
  $pattern = "/^.*$pattern.*\$/m";
  $x = str_replace($question_no . ".", "", $contents);
  $x = str_replace($questionProps["optionFormat"], "", $x);
  $this->deleteContent($toReplace, $file);
  return $x;
 }

  function grabOptions($file){
   
   $answer = ['a.', 'b.', 'c.', 'd.',
              'A.', 'B.', 'C.', 'D.',
              'A)', 'B)', 'C)', 'D)',
              '(A)', '(B)', '(C)', '(D)'
          ];
   $contents = file_get_contents($file);
   $op = [];
   $i=0;
   foreach ($answer as $value) {
    $pattern = preg_quote($value , '');
    $pattern = "/^.*$pattern.*\$/m";
    if(preg_match($pattern, $contents, $matches)){
    $this->deleteContent($matches[0],$file);
    $x = str_replace($answer, "", $matches[0]);
    $op[$i] = $x;
    $i++;
    }
  }
  return $op;
 }

  function grabAnswer($file, $question_no, $questionProps){
   $contents = file_get_contents($file);
   $answer = ['a.','b.','c.','d.'];
   //echo "<b>".$question_no.")</b>";
   $question_no++;
   $str_pos = strpos($contents, $questionProps["answerFormat"]);
   
   if(strpos($contents,$question_no.".") == null){echo "<b>--Question numbers not in order--</b>";}
   //echo "<b>".(strpos($contents,$question_no.".")."</b><br />");
   //echo "<b>".$str_pos."</b><br />";
   //echo "<b>".(strpos($contents,$question_no.".") - $str_pos."</b><br />"); //////////////

   $contents = file_get_contents($file,null,null,$str_pos,$this->always_plus(strpos($contents,$question_no.".") - $str_pos));
   foreach ($answer as $value) {
    $pattern = preg_quote($value , '');
    $pattern = "/^.*$pattern.*\$/m";
    if(preg_match($pattern, $contents, $matches)){
    $x = substr($matches[0], 8, 2);
    $this->deleteContent($contents, $file);
    return $x;
    }
  }   
 } 

 function deleteContent($content, $file){
  $str = file_get_contents($file);
  $str = $this->replace_first($content, "", $str);
  file_put_contents($file, $str);
 }

 function replace_first($find, $replace, $subject) {
    return implode($replace, explode($find, $subject, 2));
 }

function always_plus($value){
  if($value < 0){return $value * -1;}
  else {return $value;}
}

}
?>
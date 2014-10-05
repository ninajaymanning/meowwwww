<html>
<body background="http://img3.wikia.nocookie.net/__cb20140409232417/animaljam/images/e/e6/Tumblr_static_nyan_cat_animation_new.gif">
<?php
function getCatzDataz($url){
  $ch = curl_init($url);
  $result = curl_exec($ch);
  $result_length = strlen($result);
  $output = substr($result,12,$result_length - 22);
  return $output;
}
// display form if user has not clicked submit
if (!isset($_POST["submit"])) {
  ?>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  To: <input type="text" name="to"><br>
  <input type="submit" name="submit" value="SEND CATS">
  </form>
  <?php 
} else {    // the user has submitted the form
  // Check if the "from" input field is filled out
  if (isset($_POST["to"])) {
    $to = $_POST["to"];
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: sexyfelines@cats.gov";
    $catfacts = fopen("catfacts2.csv","r");

    $fact = getCatzDataz("http://catfacts-api.appspot.com/api/facts?number=1");
    mail($to,"CATS!","<html>" . $fact . "<img src=\"http://thecatapi.com/api/images/get?format=src&type=gif&{$rand}\"</html>",$headers);
    echo "Cats are on their way!";
    echo $to;;
    //echo $fact; 
    $body = "<html><img src=\"http://thecatapi.com/api/images/get?format=src&type=gif&{$rand}\"</html>";
    $body .= $fact; echo $body;
     //CATS!","<html><img src=\"http://thecatapi.com/api/images/get?format=src&type=gif&{$rand}\"</html>".$fact,$headers);
  }
}


?>
</body>
</html>
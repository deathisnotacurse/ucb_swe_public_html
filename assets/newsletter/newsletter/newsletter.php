<?
include("../header_footer/header.html");
echo("<h2 class=\"title\">Newsletter</h2>");
echo("<p>Click on each link to download a PDF of the newsletter.</p>");
echo("<p>If you'd like to sign up for our alumni newletter, click ");
echo '<a href="https://docs.google.com/forms/d/1LxZbgUna2Dp-_Rj_A0gWM3_PcfBvAZkGq5rmXFAXQ4w/viewform?formkey=dEtfV2NJZnpoMUxJeGNYOEZGZjBPRVE6MQ#gid=0"><u>here</u></a>';
echo(".");
echo("<p>The newsletter for our most recent GM can be found ");
echo '<a href="/newsletter/latest"><u>here</u></a>';
echo(".");

$pdfs = Array();
$stuff = scandir(".");
$MONTHS = array(1 => "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
for($k = 0, $s = sizeof($stuff); $k < $s; ++$k){
  $fname = $stuff[$k];
  $fname_split = explode(".", $fname);
  if (strcmp("pdf", $fname_split[sizeof($fname_split) - 1]) == 0){
    $pdfs[] = $fname;
  }
}

rsort($pdfs, SORT_STRING);
$year = 0;
for($k = 0, $s = sizeof($pdfs); $k < $s; ++$k){
  $fname = $pdfs[$k];
  $bname = basename($fname, ".pdf");
  $date = explode("_", $bname);
  
  if ($year != intval($date[0])){
    $year = intval($date[0]);
    if ($year == 0){
      continue;
    }
    echo("<h3>");
    echo($year);
    echo("</h3>");
  }

  $month_num = intval($date[1]);
  $month_str = $MONTHS[$month_num];

  echo("<p><a href=".$fname." target=\"_blank\">".$month_str."</a></p>");
}

include("../header_footer/footer.html");
?>

<?php 
/**
*This script for downloading the page https://www.wikipedia.org/, extract headings, abstracts, pictures, links from the page part with sections, save it in the wiki_sections table, which has the following structure:
*id integer, auto-incremental date_created in year-month-day format hours:minutes:seconds title string no more than 230 characters url string no more than 240 characters, unique picture string no more than 240 characters, unique abstract string no more than 256 characters, unique
*
*@author Negha Gopinath
*/
//Set up the database connection parameters
$servername="localhost";
$username="root";
$password="";
$dbname="wiki_sections";
//Create a new connection to the database
$conn= new mysqli($servername,$username,$password,$dbname);
//Check for any connection errors
if ($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
//Download the page from https://www.wikipedia.org/
$pageUrl="https://www.wikipedia.org/";
$pageContent= file_get_contents($pageUrl);
$doc = new DOMDocument();
$doc->loadHTML($pageContent);
//Extract the sections from the page content
$sections=explode("<div class='other-project'>",$pageContent);

//Loop through each section and extract the headings,abstracts,pictures, and links
foreach($sections as $section){
  //Extract the Heading
  $h=
    $xpath->query("//span[@class='other-project-title'])->item(0);
     $heading=$h->nodeValue;
  //Extract the abstract
   $a=$xpath->query("//span[@class='other-project-tagline'])->item(0);
    $abstract==$a->nodeValue;
   //Extract the Picture Url
  $pU=$xpath->query("//div[@class='sprite'])->item(0);
  $picture=$pU->getAttribute('style');
  if(preg_match('/background-image:\s*url\(([^)]+)\);/',$picture,$matches)){
  $pictureUrl=$trim($matches[1],'\'"');
  }
  //Extract the links

    $$l=$xpath->query("//a[@class='other-project-link'])->item(0);
  $links=$pU->getAttribute('href');
  4sql ="INSERT INTO wiki_sections(tite,url,picture,abstract) VALUES ('$heading','$pageUrl',' $pictureUrl','$abstract')";
   if($conn->query($sql)===TRUE ){
     echo "Data Saved Successfully!";
   }else{
     echo "Error :".$sql ."</br>". $conn->error;
   }
}
$conn->close();
?>

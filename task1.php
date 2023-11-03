<?php
/* Find files in the /datafile folder with names consisting of numbers and letters of the Latin alphabet and having the .ixt extension.
*Display the names of these files,ordered by name.
**@author Negha Gopinath
*
*/
//Define the directory path
$directory='/datafiles';
//Create an array to store file names
$fileNames=[];
//Open the directory
if ($handle =opendir($directory)){
  //Regular expression pattern to match file names
$pattern ='/^[a-zA-Z0-9]+\.[iI][xX][tT]$/';
  //Loop through the directory
while(false !==($file = readdir($handle))){
  if(preg_match($pattern,$files)){
    //If the file name matches the pattern,add it to the array
    $fileNames[]=$file;
  }
}
  //Close the directory handle 
  closedir($handle);
}
//Sort the file names alphabetically
sort($fileNames);
//Display the sorted file names
foreach($fileNames as $fileName){
  echo $fileName .PHP_EOL;
}

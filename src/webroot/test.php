
                        
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Listing most viewed videos</title>
    <style type="text/css">
    div.item {
      border-top: solid black 1px;      
      margin: 10px; 
      padding: 2px; 
      width: auto;
      padding-bottom: 20px;
    }
    span.thumbnail {
      float: left;
      margin-right: 20px;
      padding: 2px;
      border: solid silver 1px;  
      font-size: x-small; 
      text-align: center
    }    
    span.attr {
      font-weight: bolder;  
    }
    span.title {
      font-weight: bolder;  
      font-size: x-large
    }
    img {
      border: 0px;  
    }    
    a {
      color: brown; 
      text-decoration: none;  
    }
    </style>
  </head>
  <body>
    <?php
    // set feed URL
    $feedURL = 'https://gdata.youtube.com/feeds/api/videos/E5LS1UmzfXA';
    
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
   
   var_dump($sxml);
   
    ?>
   
  </body>
</html>     
        

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  
  <title>Movecraft : Vehicle Type Database</title>
  </head>
  <center style="background-color:lightgray">

  <a href="?horizontal<?php echo ($lang!=""?"&lang=".$lang:"").($custom_blocks!=""?"&custom=".$custom_blocks:""); ?>" <?php if ($view_type=="horizontal") {echo "style=\"background-color:lightgrey;\"";} ?>>Horizontal View</a>
  <a href="?vertical<?php echo ($lang!=""?"&lang=".$lang:"").($custom_blocks!=""?"&custom=".$custom_blocks:""); ?>" <?php if ($view_type=="vertical") {echo "style=\"background-color:lightgrey;\"";} ?>>Vertical View</a>
  <a href="?details<?php echo ($lang!=""?"&lang=".$lang:"").($custom_blocks!=""?"&custom=".$custom_blocks:""); ?>" <?php if ($view_type=="details" || $view_type=="") {echo "style=\"background-color:lightgrey;\"";} ?>>Detailed View</a>
  <body>
</center>
   <?php
    $lang = "";
    if (isset($_GET["lang"])) {$lang = $_GET["lang"];}
     
    $view_type = "details";
    if (isset($_GET["horizontal"])){
      $view_type = "horizontal"; 
    }else if(isset($_GET["vertical"])){
      $view_type = "vertical";
    }
    
    $custom_blocks = "";
    if (isset($_GET["custom"])) {$custom_blocks = "customBlocks";} 
  ?>
  </br>
  
  <?php
    define ("MV_CUSTOM_LOCALIZATION",$lang);
    
    require_once("MovecraftView.class.php");
    
    /**
     * class MovecraftView
     *
     * @param path_to_MovecaftTypes = MV_MOVECRAFT_TYPES_PATH   - path to Movecraft/types folder
     * @param file_names = MV_ALLOWED_TYPES                     - types allowed to show
     * @param ignored = MV_IGNORED_TYPES                        - ignored types 
     *
     */                                  
    $m = new MovecraftView(); 
    
    
    /**
     * function printHorizontalTable
     *
     * @param types = "*"             - list of types (array or string with ',' as separator)
     * @param properties = "*"        - list of properties (array or string with ',' as separator)
     * @param ignore_prop = ""        - list of ignored properties (array or string with ',' as separator)
     * @param array_to_combo = false  - convert arrays to drop-down list of options
     *
     */                  
    if ($view_type == "horizontal" ) $m->printHorizontalTable('*','*','',true);
    
    /**
     * function printVerticalTable
     *
     * @param  types = "*"             - list of types (array or string with ',' as separator)
     * @param  properties = "*"        - list of properties (array or string with ',' as separator)
     * @param  ignore_prop = ""        - list of ignored properties (array or string with ',' as separator)
     * @param  array_to_combo = false  - convert arrays to drop-down list of options*
     */ 
    if ($view_type ==  "vertical") $m->printVerticalTable('*','*','',true); 
    
    /**
     * function printSingleFullTable
     *
     * @param type  - type name of the craft
     *
     */
    if ($view_type == "details") $m->printSingleFullTable($m->types[0]->name);
  ?>
    
  </body>
</html>

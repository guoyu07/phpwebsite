<?php


class Layout_Init{

  function loadSettings(){
    $DB = new PHPWS_DB("layout_config");
    $settings = $DB->select("row");

    //if (isset($user_cookie_theme))
    // $settings['current_theme'] = $cookieTheme;

    $settings['current_theme'] = $settings['default_theme'];
    return $settings;
  }

  function loadContentVar(){
    $DB = new PHPWS_DB("layout_box");
    $DB->addWhere("theme", Layout::getTheme());
    $DB->addColumn("content_var", TRUE);
    $result = $DB->select("col");
    if (PEAR::isError($result))
      return PEAR::raiseError("layout", "loadContentVar", $result->getMessage());
    elseif (is_null($result))
      return NULL;

    return $result;
  }

  function initSettings(){
    $_SESSION['Layout_Settings'] = Layout_Init::loadSettings();
  }

  function initContentVar(){
    $_SESSION['Layout_Content_Vars'] = Layout_Init::loadContentVar();
  }

  function initBoxes(){
    $_SESSION['Layout_Boxes'] = Layout_Init::loadBoxes();
  }

  function loadBoxes(){
    $theme = Layout::getTheme();
    $DB = new PHPWS_DB("layout_box");
    $DB->addWhere("theme", $theme);
    if(!$boxes = $DB->select())
      return NULL;

    foreach ($boxes as $row)
      $final[$row['content_var']] = $row;

    return $final;
  }



  function installModule($module){
    include PHPWS_SOURCE_DIR . "mod/$module/conf/layout.php";
    foreach ($layout_info as $row){
      if (Layout::isContentVar($row['content_var']))
	continue;

      Layout::addBox(Layout::getTheme(), $row['content_var'], $row['theme_var'], "default_box.tpl");
    }
  }


  function initTheme(){
    $DB = new PHPWS_DB("layout_box");
  }

}

?>
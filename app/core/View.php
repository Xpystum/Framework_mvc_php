<?php

  class View implements SingltoneInterface
  {
    private $nameLayout = 'default'; //Общий шаблон по умолчанию

    private static $instance = null; //SingleTon


    #region (Magic Method)
      public function __construct()
      {
        self::instance();
      }

    #endregion
 
    
	  #region (SingleTon logic)

      public static function instance()
      {
        if(self::$instance === null){
          self::$instance = new self;
        }
        return self::$instance;
      }

    #endregion
	
	
    #region (View logic)

    public function render($pathFile, $data, $nameLayout, $widgets,)
    {
      $data = $this->data;
        
      $page = 'Views/pages/' . $pathFile . '.php';
      include_once('Views/layouts/' . $nameLayout . '.php');
    }

    #endregion

    
  }

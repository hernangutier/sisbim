<?php
namespace common\models;
use Yii;


 class Helpers {

  public static function setBootstrapLabel($i,$value){

    if ($i==0){
      return '<span class="label label-default arrowed-right arrowed-in">' . $value . '</span>';
    }

    if ($i==1){
      return '<span class="label label-primary arrowed-right arrowed-in">' . $value . '</span>';
    }

    if ($i==2){
      return '<span class="label label-info arrowed-right arrowed-in">' . $value . '</span>';
    }

    if ($i==3){
      return '<span class="label label-success arrowed-right arrowed-in">' . $value . '</span>';
    }

    if ($i==4){
      return '<span class="label label-warnning arrowed-right arrowed-in">' . $value . '</span>';
    }

    if ($i==5){
      return '<span class="label label-danger arrowed-right arrowed-in">' . $value . '</span>';
    }

  }


  public static function setTextColor($i,$value){
    if ($i==0){
      return '<span class="text-primary"><b>' . $value . '</b></span>';
    }

    if ($i==1){
      return '<span class="text-info"><b>' . $value . '</b></span>';
    }
    if ($i==2){
      return '<span class="text-success"><b>' . $value . '</b></span>';
    }
    if ($i==3){
      return '<span class="text-warning"><b>' . $value . '</b></span>';
    }
    if ($i==4){
      return '<span class="text-danger"><b>' . $value . '</b></span>';
    }
  }
}

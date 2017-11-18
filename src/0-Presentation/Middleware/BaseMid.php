<?php
/**
 * Created by PhpStorm.
 * User: guihgf
 * Date: 18/09/2016
 * Time: 00:33
 */

namespace Presentation\Middleware;


abstract class BaseMid
{
    private $only;
    private $except=[];

    function only($metodo){
        $this->only=$metodo;
        return $this;
    }

    function except($metodo){
        array_push($this->except,$metodo);
        return $this;
    }

    function exec($metodo){

        $exec=true;
        if($this->only!=null){
            if($this->only==$metodo){
                $exec=true;
            }
            else
                $exec=false;
        }
        //esta na excessao?
        else if (in_array($metodo,$this->except)) {
            $exec=false;
        }
        else{
            $exec=true;
        }

        if($exec)
            $this->run();

    }
}
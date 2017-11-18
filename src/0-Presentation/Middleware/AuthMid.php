<?php
namespace Presentation\Middleware;
use Api\Rest\Rest;

class AuthMid extends BaseMid implements Middleware
{
    function run(){
        if (!isset($_SESSION["usuario"])) {
            $rest=new Rest();
            $rest->redirect("login", "index");
        }
    }
}
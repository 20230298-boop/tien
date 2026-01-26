<?php
class Router {
  private $routes = [];
  private $db;
  public function __construct($db){$this->db=$db;}
  public function get($p,$a){$this->routes['GET'][$p]=$a;}
  public function post($p,$a){$this->routes['POST'][$p]=$a;}
  public function dispatch(){
    $m=$_SERVER['REQUEST_METHOD'];
    $u=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $u=str_replace('/lab13/public','',$u);
    if($u=='')$u='/';
    if(!isset($this->routes[$m][$u])){http_response_code(404);echo '404';return;}
    [$c,$f]=explode('@',$this->routes[$m][$u]);
    require_once ROOT_PATH.'/app/controllers/'.$c.'.php';
    $obj=new $c($this->db);
    $obj->$f();
  }
}

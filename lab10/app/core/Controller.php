
<?php
class Controller{
 protected function view($path,$data=[]){
  extract($data);
  require "../app/views/layout/header.php";
  require "../app/views/$path.php";
  require "../app/views/layout/footer.php";
 }
}

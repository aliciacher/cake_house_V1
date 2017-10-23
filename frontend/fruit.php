<?php
$str = '葡萄,香蕉,鳳梨,西瓜,水蜜桃';
$fruits = explode(',',$str);
foreach($fruits as $fruit){
  echo $fruit."<br>";
}

 ?>

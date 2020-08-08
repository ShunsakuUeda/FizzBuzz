<!DOCTYPE html>
<html lang="ja">

<form action="index.php" method="post" >
<p>fizzNum: <input type="text" name="fizz" value=""></p>
<p>buzzNum: <input type="text" name="buzz" value=""></p>
 <input type="submit" ><br>
</form> 

<p>【出力】</p>

<?php
//declare(strict_types=1); *バージョン古くて使えない(7.3だから使えないことはなさそう。)？
//formからの値を取得
$fizz_num = $_POST['fizz'];
$buzz_num = $_POST['buzz'];

//文字、少数の値を入力不可に制御
if (is_numeric($fizz_num) && is_numeric($buzz_num)){
  if(!preg_match('/^([1-9]\d*|0)\.(\d+)?$/', $fizz_num) &&  !preg_match('/^([1-9]\d*|0)\.(\d+)?$/', $buzz_num)){
    $fizzbuzz_args = array(1 => $_POST['fizz']);

//fizzの値を取得
for($i = 1; $fizzbuzz_args[$i] < 100; $i++){ 
  $fizz_multi = $fizz_num * ($i + 1);
  array_push($fizzbuzz_args,$fizz_multi);
}

//buzzの値を取得（fizzと重複する値は削除）
for($i = 1; $fizzbuzz_args[$i] < 100; $i++){ 
  $buzz_multi = $buzz_num * ($i + 1);
  if($buzz_multi % $fizz_num==0){
  }else{
    array_push($fizzbuzz_args,$buzz_multi);
  }
}

//配列の値をソート
sort($fizzbuzz_args);

//FizzBuzz結果の出力
foreach($fizzbuzz_args as $fizzbuzz_result){
  if($fizzbuzz_result < 100){
  echo fizzBuzzMassage($fizzbuzz_result,$fizz_num,$buzz_num) . $fizzbuzz_result .'<br>';
}
}

}else{
  echo '整数値を入力してください。';
}
}else{
  echo '文字列(空白文字列含む)は入力できません。' . '<br>';
  echo '整数値(半角)を入力してください。'  ;
}

/*
FizzかBuzzを判定する処理
*/
function fizzBuzzMassage($fizzbuzz_result,$fizz_num,$buzz_num){
  if($fizzbuzz_result % $fizz_num ===0 && $fizzbuzz_result % $buzz_num ===0){
    $message = 'FizzBuzz ';
    return $message;
  }else if($fizzbuzz_result % $fizz_num ===0){
    $message = 'Fizz ';
    return $message;
  }else{
    $message = 'Buzz ';
    return $message;
  }
}
?>    
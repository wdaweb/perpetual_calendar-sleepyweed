<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <style>
  table{
    height:500px;
    margin:auto;
    border:1px solid #ccc;
  }
  table td{
    width:80px;
    border:1px solid #ccc;
    text-align:center;
    padding:10px 0;
  }
  </style>
</head>
<body class="p-5">
<?php
if(!empty($_GET['year']) && !empty($_GET['month'])){
    $Year=$_GET['year'];
    $Month=$_GET['month'];
}else{
    $Year=date('Y');
    $Month=date('m');
}
?>
<?php
if(($Month-1)>0){
?>
<a href="?year=<?=$Year;?>&month=<?=($Month-1);?>">上個月</a>
<?php
}else{
?>
  <a href="?year=<?=($Year-1);?>&month=<?=12;?>">上個月</a>
<?php
}
?>

<?php
if(($Month+1)<=12){
?>
<a href="?year=<?=$Year;?>&month=<?=($Month+1);?>">下個月</a>
<?php
}else{
?>
  <a href="?year=<?=($Year+1);?>&month=<?=1;?>">下個月</a>
<?php
}
?>


<table>
<tr>
  <td>Sun</td>
  <td>Mon</td>
  <td>Tue</td>
  <td>Wed</td>
  <td>Thu</td>
  <td>Fri</td>
  <td>Sat</td>
</tr>
<?php
// $Year=date('Y');
// $Month=date('m');//①這個月
$Day=date('d');
$YMD=date('Y-m-d');
$Week=date('D');//e.g.Mon

$Days=date('t');//②這個月有幾天
$FirstWeek=date('w',strtotime(date("$Year-$Month-01")));//③第一天星期幾
$LastWeek=date('w',strtotime(date("$Year-$Month-$Days")));//④最後一天星期幾
$Weeks=(($Days+$FirstWeek-7)/7)+1;//這個月有幾週
?>
<?php
for($i=0;$i<$Weeks;$i++){
  echo "<tr>";
  for($j=0;$j<7;$j++){
    echo "<td>";
    if($i==0 && $j<$FirstWeek)
      echo "&nbsp;";
    else if(($i*7)+($j+1)-$FirstWeek>$Days){
    }else{
      echo (($i*7)+($j+1)-$FirstWeek);
    }
    echo "</td>";
  }echo "</tr>";
}
?>
</table>
</body>
</html>
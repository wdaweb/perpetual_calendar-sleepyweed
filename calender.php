<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>月曆製作</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <style>
  table{
    width:750px;
    margin:auto;
    border:1px solid #ccc;
  }
  table td{
    border:1px solid #ccc;
    text-align:center;
    padding:10px 0;
  }
  table td:hover{
    background:lightpink;
  }
  </style>
</head>
<body class="p-5">

<?php
$YMD=date('Y-m-d');//e.g.2020-11-02
$Year=date('Y');
$Month=date('m');
$Week=date('D');//Mon
echo '('.$Week.')';
echo "<hr>";

$Days=date('t');//這個月有幾天(天數)
$FirstWeek=date('w',strtotime(date("$Year-$Month-01")));//這個月第一天是星期幾(0=>星期日，以此類推)
$LastWeek=date('w',strtotime(date("$Year-$Month-$Days")));//這個月最後一天是星期幾
$Weeks=ceil(($Days+$FirstWeek-7)/7)+1 ;//這個月有幾週(Celi代表四捨五入)
?>
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

<h1>My Calender</h1>
<table>
<tr>
  <td>日</td>
  <td>一</td>
  <td>二</td>
  <td>三</td>
  <td>四</td>
  <td>五</td>
  <td>六</td>
</tr>

<?php
for($i=0;$i<$Weeks;$i++){
  echo "<tr>";
  for($j=0;$j<7;$j++){
    echo "<td>";
    
    if($i==0 && $j<$FirstWeek){
      echo "&nbsp;";
    }else if(($i*7)+($j+1)-$FirstWeek>$Days){
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
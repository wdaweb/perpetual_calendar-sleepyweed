<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
  body{
    font-family:'Fredericka the Great', cursive;
    font-size:34px;
    color:#eee;
    background: url('https://i.imgur.com/hy1Kv6g.jpg') no-repeat;
    background-size:100%;
    position: fixed;
    left: 50%;
    top: 50%;
    transform:translate(-50%,-50%);
  }
  .title{
    font-family:'Fredericka the Great', cursive;
    font-size:72px;
    display:inline-block;

  }
  .title2{
    display:inline-block;
  }
  table{
    height:500px;
    /* margin-top:1rem; */
  }
  table td{
    width:80px;
    text-align:center;
    padding:10px 0;
  }
  .s2:hover{
    background:
  }
  .s1{
    color:lightseagreen;
  }
  a:link{
    color:white;
    font-size:28px;
  }
  a:visited{
    color:white;
  }
  a:hover{
    color:lightcoral;
    text-decoration:none;
  }
  a:active{
    color:white;
  }
  </style>
</head>


<body>
<div>
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
// $Year=date('Y');
// $Month=date('m');//①這個月
// $Day=date('d');
// $YMD=date('Y-m-d');
// $Week=date('D');//e.g.Mon
$MonthTitle=date('M',strtotime("$Year-$Month-01"));
$Days=date('t',strtotime("$Year-$Month-01"));//②這個月有幾天
$FirstWeek=date('w',strtotime("$Year-$Month-01"));//③第一天星期幾
// $LastWeek=date('w',strtotime(date("$Year-$Month-$Days")));//④最後一天星期幾
$Weeks=(($Days+$FirstWeek-7)/7)+1;//這個月有幾週
?>
<div class="title"><?=$Year;?></div>
<div class="title"><?=$MonthTitle;?></div>
<?php
if(($Month-1)>0){
?>
  <div class="title2"><a href="?year=<?=$Year;?>&month=<?=($Month-1);?>">Last Month</a></div>
<?php
}else{
?>
  <div class="title2"><a href="?year=<?=($Year-1);?>&month=<?=12;?>">Last Month</a></div>
<?php
}
?>

<?php
if(($Month+1)<=12){
?>
<a href="?year=<?=$Year;?>&month=<?=($Month+1);?>">Next Month</a>
<?php
}else{
?>
  <a href="?year=<?=($Year+1);?>&month=<?=1;?>">Next Month</a>
<?php
}
?>

<table>
<tr class="s1">
  <td>Sun</td>
  <td>Mon</td>
  <td>Tue</td>
  <td>Wed</td>
  <td>Thu</td>
  <td>Fri</td>
  <td>Sat</td>
</tr>

<?php
for($i=0;$i<$Weeks;$i++){
  echo "<tr>";
  for($j=0;$j<7;$j++){
    echo "<td class='s2'>";
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
</div>
</body>
</html>
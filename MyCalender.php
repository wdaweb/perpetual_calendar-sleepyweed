<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://kit.fontawesome.com/97604f290f.js" crossorigin="anonymous"></script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap');
  body{
    font-family:'Fredericka the Great', cursive;
    font-size:36px;
    color:#eee;
    background: url('https://i.imgur.com/hy1Kv6g.jpg') no-repeat;
    background-size:100%;

    margin: 50px;
    padding: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .title{
    font-family:'Fredericka the Great', cursive;
    font-size:78px;
    display:inline-block;
  }
  .left,.right{
    display:inline-block;
    animation: button 4s linear infinite;
  }
  @keyframes button{
    0%,100%{
      filter:drop-shadow(0 0 12px lightyellow);
    }
    25%{
      filter:drop-shadow(0 0 2px rgb(51,51,51));
    }
    50%{
      filter:drop-shadow(0 0 12px lightyellow);
    }
    75%{
      filter:drop-shadow(0 0 2px rgb(51,51,51));
    }
}

  .left{
    position:absolute;
    top:50%;
    left:10%;
  }
  .right{
    position:absolute;
    top:50%;
    right:10%;
  }
  table td{
    width:80px;
    text-align:center;
    padding:10px 0;
  }
  table td:empty{
    visibility:hidden;
  }
  .s2:hover{
    background:url('https://i.imgur.com/wzpvL9l.png')no-repeat;
    background-size:60%;
    background-position:center bottom;
  }
  .week{
    color:rgb(254,125,182);
  }
  a:link{
    color:#eee;
    font-size:72px;
  }
  a:visited{
    color:#eee;
  }
  a:hover{
    color:rgb(254,125,182);
    opacity:0.8;
    text-decoration:none;
  }
  a:active{
    color:#eee;
  }
  .astronaut{
    position:absolute;
    top:0%;
    left:0%;
    animation: astronaut 4s ease-in-out infinite;
  }
  @keyframes astronaut{
    0%{
      transform:translateY(0px);
    }
    50%{
      transform:translateY(100px);
    }
    100%{
      transform:translateY(0px);
    }
  }
  .ufo{
    position:absolute;
    bottom:5%;
    right:5%;
    /* content: "transition"; */
    transform: translate(0,0);
    transform-origin: left bottom;
    transition:all 2s ease;
  }
  .ufo:hover{
    transform:translate(-200px,-400px);
  }
  </style>
</head>


<body>
<div class="astronaut"><img src="https://i.imgur.com/0Vcl0hq.png" alt="astronaut" width="350px"></div>
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
<div class="title"><?=$Year;?>&nbsp;<?=$MonthTitle;?></div>
<?php
if(($Month-1)>0){
?>
  <div class="left"><a href="?year=<?=$Year;?>&month=<?=($Month-1);?>"><i class="fas fa-caret-left"></i></a></div>
<?php
}else{
?>
  <div class="left"><a href="?year=<?=($Year-1);?>&month=<?=12;?>"><i class="fas fa-caret-left"></i></a></div>
<?php
}
?>

<?php
if(($Month+1)<=12){
?>
  <div class="right"><a href="?year=<?=$Year;?>&month=<?=($Month+1);?>"><i class="fas fa-caret-right"></i></a></div>
<?php
}else{
?>
  <div class="right"><a href="?year=<?=($Year+1);?>&month=<?=1;?>"><i class="fas fa-caret-right"></i></a></div>
<?php
}
?>
<table>
<tr class="week">
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
<div class="ufo"><img src="https://i.imgur.com/ym1P3Su.png" alt="ufo" width="250px"></div>
</body>
</html>
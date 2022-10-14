<?php
  //require('class/class.sqlconnect.php');
  //require('config.php');

  function soldertt($table, $rttparan, $conn){
    $resultrtt = mysqli_query($conn, "SELECT SUM(nbjours) AS decomptertt FROM $table WHERE type='RTT' AND datedebut LIKE ");
    $rowrtt = mysqli_fetch_assoc($resultrtt);
    $sumrtt = $rowrtt['decomptertt'];
    $rtt = ($rttparan - $sumrtt);
    echo round($rtt,2);
  }

  function jours($nbjours){
    if($nbjours < 2){
      echo $nbjours . ' jour';
    }
    if($nbjours >= 2){
      echo $nbjours . ' jours';
    }
  }

  function soldecp($table, $cpparan, $conn){
    $resultcp = mysqli_query($conn, "SELECT SUM(nbjours) AS decomptecp FROM $table WHERE type='CP'");
    $rowcp = mysqli_fetch_assoc($resultcp);
    $sumcp = $rowcp['decomptecp'];
    $cp = ($cpparan - $sumcp);
    echo round($cp,2);
  }

  function annee(){
    if( (date('m') >= 06) && (date('m') <= 12) ){
        echo date("Y")+1;
    }
    if( (date('m') >= 01) && (date('m') < 06) ){
        echo date("Y");
    }
  }

  function anneeplus(){
    echo date("Y")+1;
  }

  function anneeencours(){
    echo date("Y");
  }

  function cumuln1rtt($rttparmois){
    $datertt = date('Y') . '-01-01';
    $date2 = date('y-m-d');

    $ts1rtt = strtotime($datertt);
    $ts2 = strtotime($date2);

    $year1rtt = date('Y', $ts1rtt);
    $year2 = date('Y', $ts2);

    $month1rtt = date('m', $ts1rtt);
    $month2 = date('m', $ts2);

    $diffrtt = (($year2 - $year1rtt) * 12) + ($month2 - $month1rtt);
    $cumulrtt = ($rttparmois * $diffrtt);
    echo round($cumulrtt, 2);
  }

  function cumuln1cp($cpparmois){

    if( (date('m') >= 06) && (date('m') <= 12) ){
        $anneecp = date("Y");
    }
    if( (date('m') >= 01) && (date('m') < 06) ){
        $anneecp = date("Y")-1;
    }

    $datecp = $anneecp . '-06-01';
    $date2 = date('y-m-d');

    $ts1cp = strtotime($datecp);
    $ts2 = strtotime($date2);

    $year1cp = date('Y', $ts1cp);
    $year2 = date('Y', $ts2);

    $month1cp = date('m', $ts1cp);
    $month2 = date('m', $ts2);

    $diffcp = (($year2 - $year1cp) * 12) + ($month2 - $month1cp);
    $cumulcp = ($cpparmois * $diffcp);
    echo round($cumulcp, 2);
  }
?>

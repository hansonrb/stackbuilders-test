<?php
  function getDigitsSum($num) {
    $sum = 0;
    while ($num > 0) {
      $sum += ($num % 10);
      $num = floor($num / 10);
    }
    return $sum;
  }

  function validateCC($ccn) {
    if (strlen($ccn) !== 16) return false;

    $sum = 0;
    $sumStr = '';
    for ($i = strlen($ccn)-1; $i >= 0; $i --) {
      if ($i % 2 == 1) {
        $sum += intval($ccn[$i]);
        $sumStr = intval($ccn[$i]) . $sumStr;
      }
      else {
        $sum += (getDigitsSum(intval($ccn[$i]) * 2));
        $sumStr = (getDigitsSum(intval($ccn[$i]) * 2)) . $sumStr;
      }
    }
    return $sum % 10 === 0;
  }

  function generateBigNumber($len) {
    $output = rand(1,9);
    for($i=0; $i<$len-1; $i++) {
        $output .= rand(0,9);
    }
    return $output;
  }

  function formatOutput($num) {
    $validity = validateCC($num) ? 'valid' : 'invalid';
    echo "Credit Card $num is $validity <br/>";
  }

  $num = '1274';
  formatOutput($num);
  $num = '4012888888881881';
  formatOutput($num);
  $num = '4012888888881882';
  formatOutput($num);

  for ($i = 0; $i<100; $i++) {
    $num = generateBigNumber(16);
    formatOutput($num);
  }
?>
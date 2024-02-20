<?php
$file = fopen("delegated-ripencc-latest", "r");
$ip = '95.158.48.93';
$long = ip2long($ip);
print("\nYour ip: $ip | LONG: $long \n");
while(!feof($file)) {
    $string = fgets($file);
    $ip_deleg = ip2long(explode("|" ,$string)[3]);
    $size_deleg = explode("|" ,$string)[4];
    if(abs($ip_deleg - $long) < $size_deleg){
        print("** Succesfully found! ** \n");
        print($string);
        $last_ip = long2ip($ip_deleg + $size_deleg);
        print("\nThe last IP for this deleg is: $last_ip");
        break;
    }
}



fclose($file);
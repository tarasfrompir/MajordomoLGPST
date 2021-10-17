<?php
$device_id = $this->getProperty('deviceId');
$content=getURL('http://livegpstracks.com/viewer_coos_s.php?code='.$device_id,  0); 
$data=json_decode($content,true);
//DebMes($content);
$this->setProperty('latitude', $data[0]['lat']);
$this->setProperty('longitude', $data[0]['lng']); 
$this->setProperty('speed', $data[0]['speed']);
$this->setProperty('d', $data[0]['d']);
$this->setProperty('t', $data[0]['t']);
$this->setProperty('altitude', $data[0]['altitude']);
$this->setProperty('battery', $data[0]['battery']);

$url = BASE_URL . '/gps.php?latitude=' . $data[0]['lat']
        . '&longitude=' . $data[0]['lng']
        . '&altitude=' . $data[0]['altitude']
        //. '&accuracy=' . gg($objn.'.gpsaccuracy') 
        //. '&provider=' . gg($objn.'.cellid') 
        . '&speed='       .$data[0]['speed'] 
        . '&battlevel=' . $data[0]['battery'] 
        //. '&charging=' . gg($objn.'.charging') 
        . '&deviceid=' . $device_id ;

getURL($url, 0);

// Тут надо вызывать по таймеру этот метод
if (!$time_to_chek =  $this->getProperty('timeChek') ) $time_to_chek = 60;
SetTimeOut("Restart timer for traker GPS ".$this->object_title,"callMethod('".$this->object_title.".updateStatus');", $time_to_chek );

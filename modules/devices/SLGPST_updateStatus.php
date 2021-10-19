<?php
$device_id = $this->getProperty('deviceId');
$old_content = $this->getProperty('allproperties');
$content=getURL('http://livegpstracks.com/viewer_coos_s.php?code='.$device_id,  0); 

if ((str)$old_content != (str)$content) {
    $data=json_decode($content,true);
    //DebMes($content);
    $this->setProperty('coordinates', $data[0]['lat'].','.$data[0]['lng']);
    //$this->setProperty('longitude', $data[0]['lng']); 
    $this->setProperty('speed', $data[0]['speed']);
    //$this->setProperty('d', $data[0]['d']);
    //$this->setProperty('t', $data[0]['t']);
    //$this->setProperty('altitude', $data[0]['altitude']);
    $this->setProperty('allproperties', $content);
    //DebMes($this);
    $adress = geocodingFromCoord($data[0]['lat'], $data[0]['lng']);
    $this->setProperty('address', $adress);
    if (isset($this->linked_user) and $this->linked_user != '') {
        sg($this->linked_user.'.coordinates', $data[0]['lat'].','.$data[0]['lng']);
        sg($this->linked_user.'.address', $adress);
    }
}

// Тут надо вызывать по таймеру этот метод
if (!$time_to_chek =  $this->getProperty('timeChek') ) $time_to_chek = 60;
SetTimeOut("Restart timer for traker GPS ".$this->object_title,"callMethod('".$this->object_title.".updateStatus');", $time_to_chek );

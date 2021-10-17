<?php

$this->device_types['LiveGPSTraker'] = array(
    'TITLE'=>'LiveGPSTraker',
    'PARENT_CLASS'=>'SDevices',
    'CLASS'=>'SLGPST',
    'PROPERTIES'=>array(
        'deviseStatus'=>array('DESCRIPTION'=>'Состояние устройства'),
        'timeChek'=>array('DESCRIPTION'=>'Период опроса устройства в секундах','_CONFIG_TYPE'=>'text'),
        'deviceId'=>array('DESCRIPTION'=>'Код устройства','_CONFIG_TYPE'=>'text'),
        'latitude'=>array('DESCRIPTION'=>'Долгота'),
        'longitude'=>array('DESCRIPTION'=>'Широта'),
        'speed'=>array('DESCRIPTION'=>'Скорость'),
        'd'=>array('DESCRIPTION'=>'Дата обновления статуса'),
        't'=>array('DESCRIPTION'=>'Время обновления статуса'),
        'altitude'=>array('DESCRIPTION'=>'Высота'),
        'battery'=>array('DESCRIPTION'=>'Батарея'),
    ),
    'METHODS'=>array(
        'updateStatus'=>array('DESCRIPTION'=>'Обновление статуса трекера','_CONFIG_SHOW'=>1),
        )
);


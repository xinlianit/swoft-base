<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/16
 * Time: 0:55
 */
require_once __DIR__ . '/vendor/autoload.php';
use swoft\base\Services;

$services = new Services();
$rs = $services->index();
print_r($rs);


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dateTime1 = new DateTime('2024-01-23 15:11', new DateTimeZone('Europe/Sofia'));
echo $dateTime1->format('d.m.Y g:i A') . PHP_EOL;
echo $dateTime1->getTimezone()->getName() . ' - ' . $dateTime1->format('d.m.Y g:i A') . PHP_EOL;
var_dump($dateTime1);

$dateTime2 = new DateTime('2024-01-22');
$dateTime2->setTimezone(new DateTimeZone('Europe/London'));
$dateTime2->setTime(2024, 1, 24);
var_dump($dateTime2);
var_dump($dateTime1->diff($dateTime2));
var_dump($dateTime1->diff($dateTime2)->days);
echo $dateTime1->diff($dateTime2)->format('%Y years, %m months, %d days') . PHP_EOL;

$interval = new DateInterval('P2D');
$dateTime2->add($interval);
$dateTime2->sub($interval);
var_dump($interval);

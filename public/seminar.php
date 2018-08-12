<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 11.08.18
 * Time: 11:01
 */

require_once('SeminarClass.php');

$seminarKlasse = new SeminarClass(19);

echo $seminarKlasse->getStudentenAnzahl();
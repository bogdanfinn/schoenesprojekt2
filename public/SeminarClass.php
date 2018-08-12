<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 11.08.18
 * Time: 11:06
 */

class SeminarClass
{
    private $anzahlStudenten;

    public function __construct(int $anzahlStudenten)
    {
        $this->anzahlStudenten = $anzahlStudenten;
    }

    public function getStudentenAnzahl(): int
    {
        return $this->anzahlStudenten;
    }
}
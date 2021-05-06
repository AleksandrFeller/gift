<?php
namespace App\Services;
use App\Entity\Items;

class UploadDate
{
    public function uploadDate() {
        $t = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/tmp/basiki.php');
        $arItems = unserialize($t);
        foreach ($arItems as $item) {

        }

    }
}
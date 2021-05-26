<?php
namespace App\Services;
use App\Entity\Items;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class UploadDate
{
    const pictures_folder='/public/uploads/pictures/items';
    public function uploadDate($uploadFile) {
        $t = file_get_contents($_SERVER['DOCUMENT_ROOT'].$uploadFile);
        $arItems = unserialize($t);
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($arItems as $item) {
            $itemOb = new items();
            $itemOb->setName($item['NAME']);
            $itemOb->setXml($item['XML_ID']);
            $itemOb->setPrice($item['PRICE']);
            $entityManager->persist($itemOb);
            $entityManager->flush();
            echo $itemOb->getId();
            echo "<pre>";
            print_r ($item);
            echo "</pre>";
            break;

        }

    }
}
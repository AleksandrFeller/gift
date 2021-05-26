<?php

namespace App\Controller\Admin;

use App\Entity\Items;
use App\Entity\ItemsSections;
use App\Services\UploadDate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        $url = $routeBuilder->setController(ItemsCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Административная панель');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Товары', 'fas fa-list', Items::class);
        yield MenuItem::linkToCrud('Разделы', 'fas fa-list', ItemsSections::class);
        yield MenuItem::linkToUrl("Загрузить товары","fa fa-upload",'/admin/upload');
    }
    #[Route('/admin/upload',name: 'admin_upload')]
    public function admin_upload() {
        $pictures_folder='/public/uploads/pictures/items';
        $uploadFile=$_SERVER['DOCUMENT_ROOT'].'/tmp/basiki.php';
        $t = file_get_contents($uploadFile);
        $arItems = unserialize($t);
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($arItems as $item) {
            echo "<pre>";
            print_r ($item);
            echo "</pre>";
            $itemOb = new items();
            $itemOb->setName($item['NAME']);
            $itemOb->setXml($item['XML_ID']);
            $itemOb->setPrice($item['PRICE']);
            $entityManager->persist($itemOb);
            $entityManager->flush();
            echo $itemOb->getId();
            break;

        }
        $arResult=array(
            'file'=>'/tmp/basiki.php',
            'items'=>array(
                array(
                    'id'=>1,
                    'name'=>'Басик1',
                    'status'=>'новый'
                ),
                array(
                    'id'=>2,
                    'name'=>'Басик2',
                    'status'=>'старый'
                )
            )

        );
        return $this->render("admin/update_data.html.twig",$arResult);
    }
}

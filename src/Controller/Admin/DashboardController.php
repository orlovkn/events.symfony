<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Events;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
	    return Dashboard::new()
		    // the name visible to end users
		                ->setTitle('ACME Corp.')

		    ;
    }

    public function configureMenuItems(): iterable
    {
	    return [
		    MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

		    MenuItem::section('Events'),
		    MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
		    MenuItem::linkToCrud('Events', 'fa fa-file-text', Events::class),
	    ];
    }
}

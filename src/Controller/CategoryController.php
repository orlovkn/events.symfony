<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\EventsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    private $categoryRepository;
    private $eventsRepository;

    public function __construct(CategoryRepository $categoryRepository, EventsRepository $eventsRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->eventsRepository = $eventsRepository;
    }

    /**
     * @Route("/category", name="category")
     */
    public function index(): Response
    {
        $data = [
            'title' => 'Categories list',
            'list' => $this->categoryRepository->findAll()
        ];

        return $this->render('category/index.html.twig', $data);
    }

    /**
     * @Route("/category/{id}", name="category_detail")
     */
    public function detail(int $id, Request $request): Response
    {
        $id = (int) $id;

        if ($id <= 0) {
            throw new \InvalidArgumentException("не передан id");
        }

        $category = $this->categoryRepository->find($id);
        //$events = $this->eventsRepository->findBy(['category_id' => $id]);

        $events = $this->eventsRepository->findAll();

        $data = [
            'category' => $category,
            'events' => $events
        ];

        return $this->render('category/detail.html.twig', $data);
    }
}
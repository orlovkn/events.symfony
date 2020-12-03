<?php

namespace App\Controller;

use App\Repository\EventsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    private $eventsRepository;

    public function __construct(EventsRepository $eventsRepository) {
        $this->eventsRepository = $eventsRepository;
    }

    /**
     * @Route("/events", name="events")
     */
    public function index(): Response
    {
        $data = [
            'title' => 'Events list',
            'list' => $this->eventsRepository->findAll()
        ];

        return $this->render('events/index.html.twig', $data);
    }

    /**
     * @Route("/events/{id}", name="events_detail")
     */
    public function detail(int $id, Request $request): Response
    {
        $id = (int) $id;

        if ($id <= 0) {
            throw new \InvalidArgumentException("не передан id");
        }

        $data = $this->eventsRepository->find($id);

        $params = [
            'event' => $data
        ];

        return $this->render('events/detail.html.twig', $params);
    }
}

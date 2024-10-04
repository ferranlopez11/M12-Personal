<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NurseController extends AbstractController
{
    #[Route('/nurse/index', name: 'nurse_index', methods: ['GET'])]
    public function getAll(): JsonResponse
    {
        $nurses = [
            [
                'id' => 1,
                'name' => 'Juan Pérez',
                'specialty' => 'Cardiology',
                'age' => 35
            ],
            [
                'id' => 2,
                'name' => 'María López',
                'specialty' => 'Pediatrics',
                'age' => 29
            ],
            [
                'id' => 3,
                'name' => 'Carlos García',
                'specialty' => 'Surgery',
                'age' => 43
            ]
        ];

        return new JsonResponse($nurses);
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nurse")
 */

class NurseController extends AbstractController
{
    #[Route('/index', name: 'nurse_index', methods: ['GET'])]
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

    #[Route('/login', name: 'nurse_login', methods: ['POST'])]
    public function login(Request $request): JsonResponse
    {
        $nurses = [
            ['username' => 'juanperez', 'password' => 'juan123'],
            ['username' => 'marialopez', 'password' => 'maria321'],
            ['username' => 'carlosgarcia', 'password' => 'cgarcia000']
        ];

        $data = json_decode($request->getContent(), true);
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        foreach ($nurses as $nurse) {
            if ($nurse['username'] === $username && $nurse['password'] === $password) {
                return new JsonResponse(['success' => true, 'message' => 'Login successful']);
            }
        }

        return new JsonResponse(['success' => false, 'message' => 'Invalid credentials'], 401);
    }
}
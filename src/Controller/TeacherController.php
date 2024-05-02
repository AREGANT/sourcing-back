<?php

namespace App\Controller;

use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'get_teachers')]
    public function index(TeacherRepository $teacherRepository): JsonResponse
    {
        $teachers = $teacherRepository->findAll();
        $data = array_map(function ($teacher) {
            return [
                'id' => $teacher->getId(),
                'lastname' => $teacher->getLastname(),
                'firstname' => $teacher->getFirstname(),
                'hourly_rate' => $teacher->getHourlyRate()
            ];
        }, $teachers);
        return $this->json($data);
    }
}

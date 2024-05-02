<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class SkillController extends AbstractController
{
    #[Route('/skill', name: 'get_skills', methods: ['GET'])]
    public function getSkills(SkillRepository $skillRepository): JsonResponse
    {
        $skills = $skillRepository->findAll();
        $data = array_map(function ($skill) {
            return [
                'id' => $skill->getId(),
                'name' => $skill->getName()
            ];
        }, $skills);
        return $this->json($data);
    }

    #[Route('/skill/{id}', name: 'get_skills_by_id')]
    public function getSkillById(SkillRepository $skillRepository, int $id): JsonResponse
    {
        $skills = $skillRepository->findById($id);
        $data = array_map(function ($skill) {
            return [
                'id' => $skill->getId(),
                'name' => $skill->getName(),
            ];
        }, $skills);
        return $this->json($data);
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create Skills
        $skillNames = ['Mathematics', 'Physics', 'Chemistry', 'Biology'];
        
        foreach ($skillNames as $skillName) {
            $skill = new Skill();
            $skill->setName($skillName);
            $manager->persist($skill);
        }

        $manager->flush();
    }
}

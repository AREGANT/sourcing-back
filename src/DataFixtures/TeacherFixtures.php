<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeacherFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create sample skills
        $skill1 = new Skill();
        $skill1->setName('Mathematics');
        $manager->persist($skill1);

        $skill2 = new Skill();
        $skill2->setName('Physics');
        $manager->persist($skill2);

        // Create a Teacher entity
        $teacher = new Teacher();
        $teacher->setLastname('Doe');
        $teacher->setFirstname('John');
        $teacher->setHourlyRate(50);
        
        // Add skills to the teacher
        $teacher->addSkill($skill1);
        $teacher->addSkill($skill2);
        
        // Persist the teacher entity
        $manager->persist($teacher);
        
        // Flush to save everything to the database
        $manager->flush();
    }
}

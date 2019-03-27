<?php

namespace App\DataFixtures\ORM;

use App\Entity\Genus;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LoadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loader = new \Nelmio\Alice\Loader\NativeLoader();
        $loader->getFakerGenerator()->addProvider($this);
        $objectSet = $loader->loadFile(__DIR__.'/fixtures.yml');
    }

    public function genus()
    {
        $genera = [
            'Octopus',
            'Balaena',
            'Orcinus',
            'Hippocampus',
            'Asterias',
            'Amphiprion',
            'Carcharodon',
            'Aurelia',
            'Cucumaria',
            'Balistoides',
            'Paralithodes',
            'Chelonia',
            'Trichechus',
            'Eumetopias'
        ];

        $key = array_rand($genera);

        return $genera[$key];
    }
}
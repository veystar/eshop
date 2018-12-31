<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Repository\MedicinalFormRepository;

class ViewMedCategoryExtension extends AbstractExtension
{
    private  $medRepository;

    public function __construct(MedicinalFormRepository $medRepo)
        {
            $this->medRepository = $medRepo;
        }

    public function getFunctions()
    {
        return array(
            new TwigFunction('showMed', array($this, 'showMedCategories')),
        );
    }

    public function showMedCategories()
    {
        $med = $this->medRepository->findAll();
        return $med;
    }
}
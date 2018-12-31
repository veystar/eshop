<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Repository\PharmGroupRepository;

class ViewPharmCategoryExtension extends AbstractExtension
{
    private  $pharmRepository;

    public function __construct(PharmGroupRepository $pharmRepo)
        {
            $this->pharmRepository = $pharmRepo;
        }

    public function getFunctions()
    {
        return array(
            new TwigFunction('showPharm', array($this, 'showPharmCategories')),
        );
    }

    public function showPharmCategories()
    {
        $pharm = $this->pharmRepository->findAll();
        return $pharm;
    }
}
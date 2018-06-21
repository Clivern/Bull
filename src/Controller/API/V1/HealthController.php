<?php

namespace App\Controller\API\V1;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HealthController extends Controller
{
    /**
     * @Route("/api/v1/health", name="api.v1.health")
     */
    public function index()
    {
        return $this->json([
            'status' => 'Ok'
        ]);
    }
}

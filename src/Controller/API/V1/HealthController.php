<?php

namespace App\Controller\API\V1;

use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Health Controller
 */
class HealthController extends Controller
{
    private $logger;

    /**
     * Class Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/api/v1/health", name="api.v1.health")
     */
    public function index()
    {
        return $this->json([
            'status' => "Ok"
        ]);
    }
}

<?php

namespace App\Controller\API\V1;

use App\Utils\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Health Controller.
 *
 * @since 1.0.0
 * @package App\Controller\API\V1
 */
class HealthController extends Controller
{
    private $logger;

    /**
     * Class Constructor.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/api/v1/health", name="api.v1.health")
     */
    public function index()
    {
        return $this->json([
            'status' => 'Ok',
        ]);
    }
}

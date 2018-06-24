<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Web;

use App\Contract\Module\Service\Response;
use App\Utils\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Home Controller.
 *
 * @since 1.0.0
 */
class HomeController extends Controller
{
    private $logger;
    private $response;

    /**
     * Class Constructor.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger, Response $response)
    {
        $this->logger = $logger;
        $this->response = $response;
    }

    /**
     * @Route("/", name="web.home")
     */
    public function index()
    {
        return $this->json(
            $this->response->setResponse(['status' => 'Ok'])->getResponse(),
            Response::HTTP_OK
        );
    }
}

<?php namespace MealJournal\Http\Controllers;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * Class ApiController
 *
 * @package MealJournal\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @var int
     */
    private $statusCode = SymfonyResponse::HTTP_OK;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respond($headers)
    {
        return
    }

    public function respondWithError($headers)
    {
        return 
    }


    /**
     * @param string $message
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)
            ->respond();
    }

    /**
     * @param string $message
     */
    public function respondCreated($message = 'Resource was Created')
    {

    }
}
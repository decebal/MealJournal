<?php namespace MealJournal\Http\Controllers;

use Illuminate\Http\JsonResponse;
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

    public function respond($data, $headers = [])
    {
        return JsonResponse::create($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message)
    {
        $data = [
            'error' => [
                'message' => $message,
                'http_code' => $this->getStatusCode()
            ]
        ];

        return $this->respond($data);
    }


    /**
     * @param string $message
     *
     * @return SymfonyResponse|static
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)
                     ->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return SymfonyResponse|static
     */
    public function respondCreated($message = 'Resource was Created')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_CREATED)
                     ->respond(
                         ['message' => $message]
                     );
    }

    public function respondNotModified($message = 'Resource was not modified')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_NOT_MODIFIED)
                     ->respond(
                         ['message' => $message]
                     );
    }

    public function respondBadRequest($message = 'Bad request!')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_BAD_REQUEST)
                     ->respondWithError($message);
    }

    public function respondUnauthorized($message = 'Unauthorized!')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_UNAUTHORIZED)
            ->respondWithError($message);
    }

    public function respondForbidden($message = 'Forbidden!')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_FORBIDDEN)
            ->respondWithError($message);
    }

    public function respondUnprocessableEntity($message = 'Entity not found!')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respondWithError($message);
    }

    public function respondInternalServerError($message = 'Internal Server Error!')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR)
            ->respondWithError($message);
    }
}
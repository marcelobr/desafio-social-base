<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Cache\Repository;

/**
 * Class MessageRepository
 * Repository pattern for the message model
 *
 * @package App\Repositories
 */
class MessageRepository
{
    /**
     * The message repository instance.
     */
    protected $message = null;

    /**
     * Create a new repository instance.
     *
     * @param Message $message
     * @param Repository $cache
     */
    public function __construct(Message $message, Repository $cache)
    {
        $this->message = $message;
        $this->cache = $cache;
    }

    /**
     * Find all messages in the message repository.
     *
     * @return mixed
     */
    public function findAll()
    {
        if(!$this->cache->has('messages'))
        {
            $this->cache->put('messages', $this->message->getAllMessages(), 1);
        }

        $messages = $this->cache->get('messages');

        return $messages;
    }

    /**
     * Find messages by user in the message repository.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function findMessagesByUser($id)
    {
        return $this->message->getMessagesByUser($id);
    }

    /**
     * Insert a new message in the message repository.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request)
    {
        return $this->message->createMessage($request);
    }
}
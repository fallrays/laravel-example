<?php

namespace App\Services;

use App\Interfaces\BoardRepositoryInterface;
use App\DTO\Board\GetDTO;
use App\DTO\Board\CreateDTO;
use App\DTO\Board\UpdateDTO;
use App\Utils\Attach;
use AWS;

class BoardService
{
    use Attach;

    public $boardRepo;

    public function __construct(BoardRepositoryInterface $boardRepo)
    {
        $this->boardRepo = $boardRepo;
    }

    /**
     * List
     */
    public function list($request)
    {
        return $this->boardRepo->list($request);
    }

    /**
     * Detail
     */
    public function getBoard($id): GetDTO
    {
        $board = $this->boardRepo->findById($id);

        $boardDTO = new GetDTO(
            $board['id'],
            $board['name'],
            $board['email'],
            $board['password'],
            $board['title'],
            $board['content'],
            $board['attach'],
            $board['created_at'],
            $board['updated_at']
        );

        return $boardDTO;
    }

    /**
     * Create
     *  Return : Board
     */
    //public function create(CreateDTO $board)
    public function create($request)
    {
        $data = [
            'name' => $request['name'],
            'email' => !empty($request['email']) ? $request['email'] : '',
            'password' => $request['password'],
            'title' => $request['title'],
            'content' => $request['content']
        ];

        if (!empty($request['attach'])) {
            $attach = $request['attach'];
            $extension  = $attach->extension();
            $bucket = config('aws.buckets.fallrays');
            $s3_path = "www";
            $file_name = 'test_'.time() . '.' . $extension;

            // Upload
            $path = $this->s3Upload($attach, $bucket, $s3_path, $file_name);

            $data['attach'] = $path;
        }

        return $this->boardRepo->create($data);
    }

    /**
     * Update
     *  Return : Boolean
     */
    public function update($request)
    {
        $data = [
            'name' => $request['name'],
            'email' => !empty($request['email']) ? $request['email'] : '',
            'password' => $request['password'],
            'title' => $request['title'],
            'content' => $request['content']
        ];

        if (!empty($request['attach'])) {
            $attach = $request['attach'];
            $extension  = $attach->extension();
            $bucket = config('aws.buckets.fallrays');
            $s3_path = "www";
            $file_name = 'test_'.time() . '.' . $extension;

            // Delete
            $getBoard = $this->getBoard($request['id']);
            if (!empty($getBoard->getAttach())) {
                $delete = $this->s3Delete($bucket, $getBoard->getAttach());
            }

            // Upload
            $path = $this->s3Upload($attach, $bucket, $s3_path, $file_name);

            $data['attach'] = $path;
        }

        return $this->boardRepo->update($request['id'], $data);
    }

    /**
     * Delete
     *  Return : Boolean
     */
    public function delete($id): bool
    {
        return $this->boardRepo->delete($id);
    }
}
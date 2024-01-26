<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Board\CreateRequest;
use App\Http\Requests\Board\UpdateRequest;
use App\DTO\Board\CreateDTO;
use App\DTO\Board\UpdateDTO;
use App\Services\BoardService;
use App\Exceptions\Board\InvalidDataException;
use Illuminate\Support\Facades\Auth;
use Ratchet\Client\connect;

class BoardController extends Controller
{
    public $service;

    public function __construct(BoardService $service)
    {
        $this->service = $service;
    }

    /**
     * List
     */
    public function index(Request $request)
    {
        $boardData = $this->service->list($request->all());

        return view('board.list', compact('boardData'));
    }

    /**
     * Fetch Data
     */
    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $boardData = $this->service->list($request->all());

            return view('board.list_data', compact('boardData'))->render();
        }
    }

    /**
     * Create
     */
    public function write(Request $request)
    {
        return view('board.write');
    }

    public function create(CreateRequest $request)
    {
        $result = $this->service->create($request->validated());

        return redirect("/board");
    }

    /**
     * Update
     */
    public function modify(Request $request)
    {
        if (!$request->id) {
            throw new InvalidDataException("Id value Required!");
        }

        $boardDto = $this->service->getBoard($request->id);

        $boardData = [
            'name' => $boardDto->getName(),
            'email' => $boardDto->getEmail(),
            'password' => $boardDto->getPassword(),
            'title' => $boardDto->getTitle(),
            'content' => $boardDto->getContent(),
            'attach' => $boardDto->getAttach(),
            'id' => $boardDto->getId()
        ];

        /*
        // websocket test
        $connector = new \Ratchet\Client\Connector($loop);
        $connector('wss://fallrays:8085')->then(function($conn) {
            $conn->send("새글등록!!!");
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });
        */

        return view('board.modify', compact('boardData'));
    }

    public function update(UpdateRequest $request)
    {
        $result = $this->service->update($request->validated());

        return redirect("/board");
    }

    /**
     * Delete
     */
    public function delete($id)
    {
        $result = $this->service->delete($id);

        return redirect("/board");
    }
}

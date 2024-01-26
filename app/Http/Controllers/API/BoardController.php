<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\CreateRequest;
use App\Http\Requests\Board\UpdateRequest;
use App\DTO\Board\CreateDTO;
use App\DTO\Board\UpdateDTO;
use App\Services\BoardService;
use App\Exceptions\Board\InvalidDataException;
use App\Utils\Response;

/**
* @OA\Info(
*     title="Boards", version="0.1", description="Board API Documentation",
*     @OA\Contact(
*         email="fallrays@gmail.com",
*         name="Board"
*     )
* )
*/
class BoardController extends Controller
{
    use Response;

    public $service;

    public function __construct(BoardService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get (
     *     path="/api/boards",
     *     tags={"게시판"},
     *     summary="게시글 목록",
     *     description="게시글을 목록",
     *     @OA\RequestBody(
     *         description="게시글 정보",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema (
     *                 @OA\Property (property="board_title", type="string", description="게시글 제목", example="공지사항입니다."),
     *                 @OA\Property (property="board_content", type="string", description="게시글 내용", example="공지사항 내용입니다.")
     *             )
     *         )
     *     ),
     *     @OA\Parameter(
     *          name="page",
     *          description="페이지번호",
     *          in="path",
     *          required=false,
     *          example="1",
     *          @OA\Schema(type="int")
     *     ),
     *     @OA\Parameter(
     *          name="perPage",
     *          description="페이지당 출력수",
     *          in="path",
     *          required=false,
     *          example="10",
     *          @OA\Schema(type="int")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="400", description="Fail")
     * )
     */
    public function index(Request $request)
    {
        $boardData = $this->service->list($request->all());

        return response()->json($boardData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json(['errors'=>$request->validator->messages()], 400);
        }

        $result = $this->service->create($request->validated());

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (!$id) {
            throw new InvalidDataException("Id value Required!");
        }

        $boardDto = $this->service->getBoard($id);

        $boardData = [
            'id' => $boardDto->getId(),
            'name' => $boardDto->getName(),
            'email' => $boardDto->getEmail(),
            'password' => $boardDto->getPassword(),
            'title' => $boardDto->getTitle(),
            'content' => $boardDto->getContent()
        ];

        //return response()->json(['data'=>$boardData], 200);
        return $this->apiResponse('success', '', $boardData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json($request->validator->messages(), 400);
        }

        $result = $this->service->update($request->validated());

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->service->delete($id); 

        return response()->json($result);
    }
}

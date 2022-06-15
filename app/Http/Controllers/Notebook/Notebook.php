<?php

namespace App\Http\Controllers\Notebook;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteFilterRequest;
use App\Http\Resources\NotebookResource;
use App\Http\Resources\OneNoteResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class Notebook extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/notebook",
     *      description="Get All notes",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *     @OA\PathItem (
     *     ),
     * )
     */
    public function index()
    {
        return NotebookResource::collection(\App\Models\Notebook::orderBy('created_at', 'desc')->get());
    }


    /**
     * @OA\Post(
     *     path="/api/v1/create/notebook",
     *     description="Create a new note",
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="User name",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="surname",
     *                   description="User surname",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="patronymic",
     *                   description="User patronymic",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="email",
     *                   description="User email",
     *                   type="string",
     *                   default="string@gmail.com",
     *               ),
     *               @OA\Property(
     *                   property="company",
     *                   description="User company",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="phone",
     *                   description="User phone",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="date_of_birth",
     *                   description="User date_of_birth",
     *                   type="string",
     *               ),
     *           )
     *       )
     *   ),
     *     @OA\Response(
     *         response=201,
     *         description="successfully created",
     *     ),
     * )
     */
    public function create(NoteFilterRequest $filterRequest): \Illuminate\Http\JsonResponse
    {
        $filtered = $filterRequest->validated();
        \App\Models\Notebook::create([
            'name' => $filtered['name'],
            'surname' => $filtered['surname'],
            'patronymic' => $filtered['patronymic'],
            'email' => $filtered['email'],
            'phone' => $filtered['phone'],
            'company' => $filtered['company'] || null,
            'date_of_birth' => $filtered['date_of_birth'] || null
        ]);
        return response()->json('Note is created', 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/api/v1/show/notebook/{id}",
     *      description="Show one note",
     *   @OA\Parameter(
     *        name="id",
     *        in="path",
     *        description="User id"
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *     @OA\PathItem (
     *     ),
     * )
     */
    public function show($id)
    {
        return new NotebookResource(\App\Models\Notebook::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/v1/update/notebook/{id}",
     *     description="Update note note",
     *     operationId="addPet",
     *     description="Update note",
     *   @OA\Parameter(
     *        name="id",
     *        in="path",
     *        description="User id"
     *     ),
     *   @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *              @OA\Property(
     *                   property="name",
     *                   description="User name",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="surname",
     *                   description="User surname",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="patronymic",
     *                   description="User patronymic",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="email",
     *                   description="User email",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="company",
     *                   description="User company",
     *                   type="string",
     *               ),
     *               @OA\Property(
     *                   property="phone",
     *                   description="User phone",
     *                   type="string",
     *               ),
     *     @OA\Property(
     *                   property="date_of_birth",
     *                   description="User date_of_birth",
     *                   type="string",
     *               ),
     *           )
     *       )
     *   ),
     *     @OA\Response(
     *         response=201,
     *         description="successfully created",
     *     ),
     * )
     */
    public function update(Request $request, \App\Models\Notebook $notebook, $id)
    {
//        dd($id);
        $updateNote = \App\Models\Notebook::find($id);
        if ($updateNote !== null) {
            $updateNote->update($request->input());
            return response()->json('note is updated', 201);
        } else {
            return response()->json('Note is not found', 404);
        }
    }

    /**
     * @OA\Delete (
     *      path="/api/v1/delete/notebook/{id}",
     *      description="Delete note",
     *      @OA\Response(
     *          response=401,
     *          description="Successful deleted",
     *      ),
     *   @OA\Parameter(
     *        name="id",
     *        in="path",
     *        description="User id for delete"
     *     ),
     *     @OA\PathItem (
     *     ),
     * )
     */
    public function destroy($id)
    {
        $deleteNote = \App\Models\Notebook::find($id);
        if ($deleteNote !== 0) {
            $deleteNote->delete();
            return response()->json('note is deleted', 410);
        } else {
            return response()->json('note is not found', 404);
        }
    }
}

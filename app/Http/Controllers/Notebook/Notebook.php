<?php

namespace App\Http\Controllers\Notebook;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteFilterRequest;
use App\Http\Resources\NotebookResource;
use App\Http\Resources\OneNoteResource;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class Notebook extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return NotebookResource::collection(\App\Models\Notebook::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return int
     */
    public function create(NoteFilterRequest $filterRequest)
    {
        $filterRequest->validated();
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
     * Display the specified resource.
     *
     * @param int $id
     * @return NotebookResource
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, \App\Models\Notebook $notebook, $id)
    {
//        dd($id);
        $updateNote = \App\Models\Notebook::find($id);
        if ($updateNote !== null) {
            $updateNote->update($request->input());
            return response()->json('note is updated',201);
        } else {
            return response()->json('Note is not found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $deleteNote = \App\Models\Notebook::find($id);
        if($deleteNote !== 0){
            $deleteNote->delete();
            return response()->json('note is deleted',410);
        }else{
            return response()->json('note is not found',404);
        }
    }
}

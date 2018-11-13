<?php
/**
 * Created by PhpStorm.
 * User: mahdy
 * Date: 11/11/18
 * Time: 3:29 PM
 */

namespace App\Http\Controllers;


use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'location' => 'required|alpha'
        ]);

        try {
            $author = Author::create($request->all());

            return response()->json($author, 201);
        } catch(\PDOException $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    /** Note: in postman use x-www-form-urlencoded with put method */
    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);

        $author->update($request->all());
//        dd($request);
        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();

        return response()->json('Deleted Successfully', 200);
    }
}
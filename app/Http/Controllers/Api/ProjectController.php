<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        if($posts) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json(compact('posts', 'success'));
    }

    public function technologies()
    {
        $technologies = Technology::all();

        if($technologies) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json(compact('technologies', 'success'));	
    }


    public function types()
    {
        
        $types = Type::all();

        if($types) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json(compact('types', 'success'));
    }

    public function id($id)
    {
        
        $id = Post::find($id);

        if($id) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json(compact('id', 'success'));
    }
}

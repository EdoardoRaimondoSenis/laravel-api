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

        return Response()->json(compact('posts'));
    }

    public function technologies()
    {
        $technologies = Technology::all();

        if($technologies) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json($technologies);
    }


    public function types()
    {
        
        $types = Type::all();

        if($types) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json($types);
    }
}

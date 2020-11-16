<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as REQ;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    public function getAllPictures()
    {
        $pictures = Picture::all();
        if (REQ::is('api/*'))
            return response()->json(['pictures' => $pictures], 200);
        return view('pictures')->with('pictures', $pictures);
    }

    // Get a single picture
    public function getSinglePicture($pictureId)
    {
        $picture = Picture::find($pictureId);
        if (!$picture) {
            return response()->json(['error' => "Picture not found"], 404);
        }
        return response()->json(['picture' => $picture], 200);
    }

    // Post picture
    public function postPicture(Request $request)
    {
        $this->path = null;

        // Validate if the request sent contains this parameters
        $validator = Validator::make($request->all(), [
            'file' => 'required',
            'date' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false], 404);
        }

        if ($request->hasFile('file')) {
            $this->file_path = $request->file('file')->store('pictures');
        } else return response()->json(['message' => 'Add a picture file'], 404);

        $picture = new Picture();
        $picture->date = $request->input('date');
        $picture->file = $this->file_path;

        $picture->save();

        if (REQ::is('api/*'))

            return response()->json(['picture' => $picture], 201);
        return back()->with('message', 'Picture added successfully');
    }

    public function putPicture(Request $request, $pictureId)
    {
        $picture = Picture::find($pictureId);
        if (!$picture) {
            return response()->json(['error' => 'Picture not found'], 404);
        }

        $picture->update([
            'date' => $request->input('date'),
        ]);

        $picture->save();

        if (REQ::is('api/*'))
            return response()->json(['picture' => $picture], 200);
        return back()->with('message', 'Picture edited successfully');
    }

    // Delete picture
    public function deletePicture($pictureId)
    {
        $picture = Picture::find($pictureId);
        if (!$picture) {
            return response()->json(['error' => 'Picture does not exist'], 204);
        }

        $picture->delete();

        if (REQ::is('api/*'))
            return response()->json(['picture' => 'Picture deleted successfully'], 200);
        return back()->with('message', 'Picture deleted successfully');
    }

    public function viewPictureFile($pictureId)
    {
        $picture = Picture::find($pictureId);
        if (!$picture) {
            return response()->json(['error' => 'Picture not exists'], 404);
        }
        $pathToFile = storage_path('/app/' . $picture->file);
        return response()->download($pathToFile);
    }

    // *****************
    // *****************
    // *****************

    public function getTodayPosts()
    {
        $pictures = Picture::all();
        $videos = Video::all();

        if (REQ::is('api/*'))
            return response()->json(['pictures' => $pictures, 'videos' => $videos]);
        return view('today')->with(['pictures' => $pictures, 'videos' => $videos]);
    }
}

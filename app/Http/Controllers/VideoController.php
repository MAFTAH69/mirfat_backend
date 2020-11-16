<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as REQ;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function getAllVideos()
    {
        $videos = Video::all();
        if (REQ::is('api/*'))
            return response()->json(['videos' => $videos], 200);
        return view('videos')->with('videos', $videos);
    }

    // Get a single video
    public function getSingleVideo($videoId)
    {
        $video = Video::find($videoId);
        if (!$video) {
            return response()->json(['error' => "Video not found"], 404);
        }
        return response()->json(['video' => $video], 200);
    }

    // Post video
    public function postVideo(Request $request)
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
            $this->file_path = $request->file('file')->store('videos');
        } else return response()->json(['message' => 'Add a video file'], 404);

        $video = new Video();
        $video->date = $request->input('date');
        $video->file = $this->file_path;

        $video->save();

        if (REQ::is('api/*'))

            return response()->json(['video' => $video], 201);
        return back()->with('message', 'Video added successfully');
    }

    public function putVideo(Request $request, $videoId)
    {
        $video = Video::find($videoId);
        if (!$video) {
            return response()->json(['error' => 'Video not found'], 404);
        }

        $video->update([
            'date' => $request->input('date'),
        ]);

        $video->save();

        if (REQ::is('api/*'))
            return response()->json(['video' => $video], 200);
        return back()->with('message', 'Video edited successfully');
    }

    // Delete video
    public function deleteVideo($videoId)
    {
        $video = Video::find($videoId);
        if (!$video) {
            return response()->json(['error' => 'Video does not exist'], 204);
        }

        $video->delete();

        if (REQ::is('api/*'))
            return response()->json(['video' => 'Video deleted successfully'], 200);
        return back()->with('message', 'Video deleted successfully');
    }

    public function viewVideoFile($videoId)
    {
        $video = Video::find($videoId);
        if (!$video) {
            return response()->json(['error' => 'Video not exists'], 404);
        }
        $pathToFile = storage_path('/app/' . $video->file);
        return response()->download($pathToFile);
    }
}

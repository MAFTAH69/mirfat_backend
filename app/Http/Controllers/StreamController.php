<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as REQ;
use Illuminate\Support\Facades\Validator;

class StreamController extends Controller
{
    public function getLiveStream()
    {
        $streams = Stream::all();

        if (REQ::is('api/*'))
            return response()->json(['streams' => $streams]);
        return view('live_stream')->with('streams', $streams);
    }

    public function postLiveStream(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'speaker' => 'required',
            'topic' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => false], 404);
        }

        $stream = new Stream();
        $stream->url = $request->input('url');
        $stream->speaker = $request->input('speaker');
        $stream->topic = $request->input('topic');

        $stream->save();

        if (REQ::is('api/*'))
            return response()->json(['stream' => $stream], 200);
        return back()->with('message', 'Stream Added successfully');
    }

    public function putLiveStream(Request $request, $streamId)
    {
        $stream = Stream::find($streamId);
        if (!$stream) {
            return response()->json(['error' => 'Stream not found'], 404);
        }

        $stream->update([
            'url' => $request->input('url'),
            'speaker' => $request->input('speaker'),
            'topic' => $request->input('topic')
        ]);

        $stream->save();

        if (REQ::is('api/*'))
            return response()->json(['stream' => $stream], 200);
        return back()->with('message', 'Stream edited successfully');
    }

    public function deleteLiveStream($streamId)
    {
        $stream = Stream::find($streamId);
        if (!$stream) {
            return response()->json(['error' => 'Stream does not exist'], 404);
        }

        $stream->delete();
        if (REQ::is('api/*'))
            return response()->json(['message' => 'Stream deleted successfully'], 200);
        return back()->with('message', 'Stream deleted successfully');
    }
}

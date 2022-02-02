<?php

namespace App\Http\Controllers;

use App\Models\CommentClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CommentClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $commentClient = CommentClient::orderBy('id', 'DESC')->get();
            return DataTables::of($commentClient)
            ->addIndexColumn()
            ->addColumn('action', function($commentClient) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/comment-client/'.$commentClient['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                $action .= '<a href="'.url('admin/comment-client/'.$commentClient['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$commentClient['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('comment-client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commentClient = null;
        return view('comment-client.editor', compact('commentClient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'title' => 'required',
            'message' => 'required'
        ], [
            'image.required' => 'This field is required',
            'name.required' => 'This field is required',
            'title.required' => 'This field is required',
            'message.required' => 'This field is required'
        ]);

        $outputFile = 'comment-client';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        CommentClient::create([
            'image' => $path,
            'name' => $request->name,
            'title' => $request->title,
            'message' => $request->message
        ]);

        return redirect('admin/comment-client')->with('status', 'Data success created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CommentClient $commentClient)
    {
        return view('comment-client.detail', compact('commentClient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentClient $commentClient)
    {
        return view('comment-client.editor', compact('commentClient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'title' => 'required',
            'message' => 'required'
        ], [
            'image.required' => 'This field is required',
            'name.required' => 'This field is required',
            'title.required' => 'This field is required',
            'message.required' => 'This field is required'
        ]);

        $commentClient = CommentClient::find($id);

        $outputFile = 'comment-client';
        Storage::disk('public')->delete($outputFile, $commentClient->image);

        $outputFile = 'comment-client';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        CommentClient::where('id', $id)->update([
            'image' => $path,
            'name' => $request->name,
            'title' => $request->title,
            'message' => $request->message
        ]);

        return redirect('admin/comment-client')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentClient $commentClient)
    {
        $outputFile = 'comment-client';
        Storage::disk('public')->delete($outputFile, $commentClient->image);
        CommentClient::where('id', $commentClient->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}

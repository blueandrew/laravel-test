<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\NoteList;
class NoteListEditController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $usre_id =  Auth::id();
        $noteList = NoteList::where('user_id', $usre_id)->get();
        return view('noteListEdit', compact('noteList'));
    }

    public function noteEdit(Request $request){
        $user_id =  Auth::id();
        $noteId =  $request->input('noteId');
        $title =  $request->input('title');
        $url =  $request->input('url');
        $request_node_id = NoteList::where('id', $noteId)->where('user_id', $user_id)
                        ->update(['title'=>$title, 'url'=>$url]);

        if($request_node_id>0){
            return redirect()->route('noteListEdit');
        }else{
            return redirect()->route('noteListEdit');
        }
    }

    public function delNote(Request $request){
        $user_id =  Auth::id();
        $noteId =  $request->input('delNoteId');

        $request_node_id = NoteList::where('id', $noteId)->where('user_id', $user_id)
                            ->delete();
        
        if($request_node_id>0){
            return redirect()->route('noteListEdit');
        }else{
            return redirect()->route('noteListEdit');
        }
    }

    public function getNoteData($id){
        $NoteList = NoteList::find($id);
        return $NoteList;
        // return $NoteList;
    }

    public function createNoteShow(){
        return view('createNote');
    }

    public function createNote(Request $request){
        $user_id =  Auth::id();
        $title =  $request->input('title');
        $url =  $request->input('url');

        $request_node_id = NoteList::insert(
                                ['user_id' => $user_id, 'title' => $title, 'url' => $url]
                            );
        
        if($request_node_id>0){
            return redirect()->route('noteListEdit');
        }else{
            return redirect()->route('noteListEdit');
        }
    }
}

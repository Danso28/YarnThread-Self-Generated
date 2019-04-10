<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Comment;
use App\YarnThread;

class CommentsController extends Controller
{
  use AuthorizesRequests, ValidatesRequests;

  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($yarnthread_id)
    {
      $yarnthread = YarnThread::find($yarnthread_id);
      return view('comments.create')->with('yarnthread', $yarnthread);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $yarnthread_id )
    {
      $this->validate($request, [
          'name' => 'required',
          'comment' => 'required'
      ]);

      $comments = new Comment();
      $comments->name = $request->input('name');
      $comments->comment = $request->input('comment');
      $comments->user_id = auth()->user()->id;
      $comments->yarn_threads_id = $yarnthread_id;

      $comments->save();

      return redirect('../yarnthreads/' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($yarnthread_id,$id)
    {
      $yarnthreads = YarnThread::find($yarnthread_id);
      $comments = Comment::find($id);
      $list = array(
          'yarnthread' => $yarnthreads,
          'comments' => $comments
      );
      if(auth()->user()->id !== $comments->user_id){
        return redirect('/');
      }

      return view('comments.edit')->with($list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $yarnthread_id,$id)
    {
      $comments = Comment::find($id);
      $comments->name = $request->input('name');
      $comments->comment = $request->input('comment');
      $comments->user_id = auth()->user()->id;
      $comments->yarn_threads_id = $yarnthread_id;

      $comments->save();
      return redirect('../yarnthreads/' . $yarnthread_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($yarnthread_id,$id)
    {
      $comments = Comment::find($id);
      $comments->delete();

      return redirect('../yarnthreads/' . $yarnthread_id);
    }
}

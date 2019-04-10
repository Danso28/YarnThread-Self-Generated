<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\YarnThread;
use App\Comment;
class YarnThreadController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth', ['except' =>['index', 'show']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $yarnthreads = YarnThread::all();
      return view('yarnthreads.index')->with('yarnthreads', $yarnthreads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yarnthreads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'yarnthread' => 'required'

      ]);

      $yarnthreads = new YarnThread();
      $yarnthreads->yarnname = $request->input('yarnthread');
      $yarnthreads->save();
      return redirect('/')->with('success', 'Yarn Theread Created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $yarnthreads = YarnThread::find($id);
          $comments = Comment::all();
        $list = array(
            'yarnthread' => $yarnthreads,
            'comments' => $comments
        );
          return view('yarnthreads.show')->with($list);
    }



}

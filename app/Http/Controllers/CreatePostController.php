<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CreatePostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\post;
use App\User;



class CreatePostController extends Controller
{
    function __construct(CreatePostRepository $createpost)
    {
        $this->createpost = $createpost;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createpost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
        'image' => 'file|image|max:5000'
    ]);
        $this->createpost->store($request);


                return redirect('/');


}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $publishedpost = post::where('is_published', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $usernames = User::all()
            ->pluck('name')
            ->toArray();

        return view('welcome', compact('usernames', 'publishedpost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function validaterequest(){

    }



}

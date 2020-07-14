<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use League\CommonMark\Input\MarkdownInput;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('cartorios.index');
    }

    /**
     * Show the application README.
     *
     * @return \Illuminate\Http\Response
     */
    public function readme()
    {
        $markdownReadmeText = file_get_contents('../README.MD');
        $markdownReadmeHTML = Markdown::parse($markdownReadmeText);

        return view('readme.index', ['page_title' => 'README', 'markdownReadme' => $markdownReadmeHTML]);
    }
}

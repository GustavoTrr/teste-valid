<?php

namespace App\Http\Controllers;

use Illuminate\Mail\Markdown;

class ReadmeController extends Controller
{
    /**
     * Show the application README.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $markdownReadmeText = file_get_contents(base_path() . '/README.MD');
        $markdownReadmeHTML = Markdown::parse($markdownReadmeText);

        return view('readme.index', ['page_title' => 'README', 'markdownReadme' => $markdownReadmeHTML]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Support\UploadedFileFromUrl;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $urlFile = 'https://placehold.co/600x400';

        dd(UploadedFileFromUrl::fromUrl($urlFile, 'filename')->store('public/placeholders'));

        return view('welcome');
    }
}

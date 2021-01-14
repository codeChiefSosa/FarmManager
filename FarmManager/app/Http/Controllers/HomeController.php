<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


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
        $user = auth()->user();
        return view('users.index', compact('user'));
    }
    public function randomDog()
    {
        $client = new Client();
        $url = 'http://shibe.online/api/shibes?count=1&urls=true&httpsUrls=true';

        $response = $client->request('GET', $url);
        $responseBody = json_decode($response->getBody());
        $dogImage = $responseBody[0];

        return view('randomDog', compact('dogImage'));
    }
}

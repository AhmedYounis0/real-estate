<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewsletterMail;
use App\Mail\SubscribeCreateMail;
use App\Models\Subscribe;
use App\Notifications\SendNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function index()
    {
        $title = 'Subscribers';
        $subscribers = Subscribe::all();
        return view('admin.subscribe.index', compact('title', 'subscribers'));
    }

    public function create()
    {
        $title = 'Subscribers';
        return view('admin.subscribe.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'title' => 'Required|string',
           'content' => 'Required|string',
        ]);

        $subscribers = Subscribe::all();

        foreach ($subscribers as $subscriber) {
            $subscriber->notify(new SendNewsletter($data['title'], $data['content']));
        }

        return to_route('dashboard.subscribers.index')->with('success', 'Newsletter has been created');
    }
}

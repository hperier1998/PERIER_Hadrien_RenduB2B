<?php

namespace App\Http\Controllers;
use App\Models\Attachment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function test()
    {
        $at = Attachment::factory()->create(['user_id' => 0]);
        dump($at);
    }
}

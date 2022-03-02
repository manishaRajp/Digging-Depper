<?php

namespace App\Http\Controllers;

use App\Models\Example;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\Facades\Mail;

use Event;
use App\Events\SendMail;

class ExampleController extends Controller
{
    public function  chache()
    {
        echo Cache::set("Item", "Hello Cache");
        echo Cache::get('Item');
        return  Item::all();
        return $data = Cache::rememberForever('bigM', function () {
            return Item::all();
        });
    }

    public function contracts(Factory $cache)
    {
        // $cache->put('name', "contactrs testing done");
        dd($cache->get('name'));
    }

    public function collaction()
    {
        // $collaction = collect([1,2,3,4,5,6,7,8,9,0,11,12]);
        // dd($collaction);
        // return $collaction;
        // $data = $collaction->avg();
        // $data = $collaction->last();
        // return $data;


        $collection = collect(['product_id' => 1, 'price' => 100]);

        $merged = $collection->merge(['price' => 200, 'discount' => false]);

        $merged->all();


        $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);

        $merged2 = $collection->mergeRecursive([
            'product_id' => 2,
            'price' => 200,
            'discount' => false
        ]);

        //  return $merged2->all();

        //  return $collection->random(2);

        $collection = collect([['John Doe', 35], ['Jane Doe', 33]]);

        $collection->eachSpread(function ($name, $age) {

            return true;
        });
    }


    public function mail()
    {
        $user = User::find(1)->toArray();
        
        Mail::send('mailExample', $user, function ($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Welcome Mail');
        });
        dd('Mail Send Successfully');
    }

    
    public function eventexample()
    {
        Event::dispatch(new SendMail(1));
        dd("Please cheak your gmail");
        // return view('mailExample');
    }

     public function Localization(Request $request,$locale) {
        app()->setLocale($locale);
        return view('welcome');
     }
}

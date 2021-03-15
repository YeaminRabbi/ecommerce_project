<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
        // Here we show politics 
        public function index(){
            return view('pages.index');
        }
        public function about(){
            return view('pages.about');
        }

        public function cart(){
            return view('pages.cart');
        }

        public function shop(){
            return view('pages.shop');
        }

        public function singleProduct(){
            return view('pages.singleProduct');
        }

        public function ordertrack(){
            return view('pages.ordertrack');
        }

        public function faq(){
            return view('pages.faq');
        }

        public function terms(){
            return view('pages.terms');
        }

        public function user(){
            return view('pages.user');
        }

        
    // Here we show all post 
    public function post(){
        $posts = Post::All();
        return view('pages.allpost',compact('posts'));
    }


        
    
    

}

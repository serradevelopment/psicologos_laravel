<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['storeFirstUser','register','registerForm']]);
    }
    
    public function index(){
        $allRatings = Rating::orderBy('created_at','desc')->get();
        $ratings = Rating::where('locked',0)->orderBy('created_at','desc')->paginate(9);
        return view('admin.ratings.index')->with(['ratings'=>$ratings,'allRatings'=>$allRatings]);
    }

    
    public function block(Rating $rating) {
        $this->authorize('block', $rating);

        $rating->locked = true;

        $rating->save();

        return redirect()->route('ratings.index')->with('flash.success', 'Avaliação bloqueada com sucesso');
    }

    public function unblock(Rating $rating) {

        $this->authorize('unblock', $rating);

        $rating->locked = false;

        $rating->save();

        return redirect()->route('ratings.index')->with('flash.success', 'Avaliação desbloqueada com sucesso');
    }

    public function destroy(Rating $rating) {

        Rating::where('id',$rating->id)->delete();

        return redirect()->route('ratings.index')->with('flash.success', 'Avaliação deletada com sucesso');
    }
}

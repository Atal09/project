<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use function Termwind\renderUsing;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function auth(){
       $this->middleware('auth');

    }

    public function index()
    {
        $this->admin();
        return redirect()->route('');

    }

    protected function admin()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('home');
        }
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ShopUser;
use Carbon\Carbon;

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
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $lat = Auth::user()->latitude;
        $lon = Auth::user()->longitude;

        $shops_per_page = 12;

        $query = "SELECT s.id as id, name, picture \n"
            ."FROM shops s \n"
            ."LEFT JOIN shop_users su \n"
            ."ON s.id = su.shop_id \n"
            ."WHERE `like` IS NULL \n"
            ."OR `like`=-1 AND CURRENT_TIMESTAMP()>=date+INTERVAL 2 HOUR \n"
            ."ORDER BY (latitude-$lat)*(latitude-$lat) + (longitude-$lon)*(longitude-$lon) \n"
            ."LIMIT ".($shops_per_page)." OFFSET ".($shops_per_page*($page-1));

        $shops = DB::select(DB::raw($query));

        $shop_count = DB::select(DB::raw("SELECT count(*) as shop_count FROM shops"))[0]->shop_count;

        $pages = ceil((float)$shop_count/$shops_per_page);

        return view('main', [
            'shops' => $shops,
            'count' => count($shops),
            'pages' => $pages,
            'page' => $page
            ]);
    }

    public function like($id)
    {
        $user_id = Auth::user()->id;

        $shop_user = ShopUser::firstOrNew(['user_id' => $user_id, 'shop_id' => $id]);

        $shop_user->like = 1;
        $shop_user->date = Carbon::now()->toDateTimeString();

        $shop_user->save();

        return redirect()->route('main');
    }

    public function dislike($id)
    {
        $user_id = Auth::user()->id;

        $shop_user = ShopUser::firstOrNew(['user_id' => $user_id, 'shop_id' => $id]);

        $shop_user->like = -1;
        $shop_user->date = Carbon::now()->toDateTimeString();

        $shop_user->save();

        return redirect()->route('main');
    }


    /**
     * Show the preferred shops.
     * 
     * @return \Illuminate\Http\Response
     */
    public function prefs(){

        $query = "SELECT s.id as id, name, picture \n"
            ."FROM shop_users su \n"
            ."INNER JOIN shops s \n"
            ."ON s.id = su.shop_id \n"
            ."WHERE `like`=1";

        $shops = DB::select(DB::raw($query));

        return view('prefs', [
            'shops' => $shops,
            'count' => count($shops)
            ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\game;
use App\Models\room;

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
        return view('welcome');
    }

    // public function welcome(){

    //     $objs = category::where('status', 1)->get();
    //     $data['objs'] = $objs;
        
    //     return view('welcome', compact('objs'));
    // }

    // public function games($id){

    //     $objs = DB::table('games')->select(
    //         'games.*',
    //         'games.id as id_q',
    //         'games.status as status1',
    //         'categories.*',
    //         )
    //         ->leftjoin('categories', 'categories.id',  'games.cat_id')
    //         ->where('games.cat_id', $id)
    //         ->get();
        
    //     return view('games', compact('objs'));

    // }

    public function welcome(){

        $game = room::where('room_status', 1)->inRandomOrder()->limit(10)->get();

        $objs = DB::table('games')->select(
                    'games.*',
                    'games.id as id_q',
                    'games.status as status1',
                    'categories.*',
                    )
                    ->leftjoin('categories', 'categories.id',  'games.cat_id')
                    ->where('games.cat_id', 1)
                    ->get();

                //    dd($game);
                
                return view('games', compact('objs', 'game'));

    }

    public function game_room(Request $request){

      //  dd($request->id);
        
        $objs = room::where('casino', $request->id)->where('room', $request->room)->first();
     
        $game = game::where('game_name_short', $objs->game_id)->first();

        return view('game-room', compact('objs', 'game'));

    }

    public function rooms(Request $request){

        $game = game::where('game_name_short', $request->casino)->first();
        $objs = room::where('casino', $request->casino)->get();

        return view('rooms', compact('objs', 'game'));
    }

    public function rooms_slot(Request $request){

        $game = game::where('game_name_short', $request->casino)->first();
        $objs = room::where('casino', $request->casino)->get();
  
        return view('rooms-slot', compact('objs', 'game'));
    }

    public function api_rooms_slot(Request $request){
        
        $fruits = array('ไม่มีฟังก์ชั่น' => '40','ฟรีสปิน' => '20', 'Turbo' => '20', 'ซื้อเบ็ท' => '20');
        $func2 = array('1-3' => '70','4-7' => '20', '8-10' => '10');
        $objs = room::where('casino', $request->casino)->get();

        if($objs){
            foreach($objs as $u){

                            $newFruits = array();
                            foreach ($fruits as $fruit => $value) {
                                $newFruits = array_merge($newFruits, array_fill(0, $value, $fruit));
                            }
                            $coin = $newFruits[array_rand($newFruits)];

                            $u['coin'] = $coin;
                            if($coin == 'ไม่มีฟังก์ชั่น'){ $u['fname'] = 'https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun6.png'; }
                            if($coin == 'ฟรีสปิน'){ $u['fname'] = 'https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun2.png'; }
                            if($coin == 'Turbo'){ $u['fname'] = 'https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun1.png'; }

                            if($coin == 'ซื้อเบ็ท'){

                                $news = array();
                                foreach ($func2 as $func => $valuex) {
                                    $news = array_merge($news, array_fill(0, $valuex, $func));
                                }
                                $coin2 = $news[array_rand($news)];

                                if($coin2 == '1-3'){ $u['fname'] = 'https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun3.png'; }
                                if($coin2 == '4-7'){ $u['fname'] = 'https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun4.png'; }
                                if($coin2 == '8-10'){ $u['fname'] = 'https://kingbar.sgp1.cdn.digitaloceanspaces.com/game/func/fun5.png'; }

                            }
            }
        }
  
        return response()->json(
            $objs
          );
    }

    public function call_percent(){

        $room = room::where('room_status', 1)->get();
        if(isset($room)){
            foreach($room as $u){

                // $per = rand(75,100);

                room::where('id', $u->id)
                ->update([
                    'percent' => rand(75,100)
                    ]);

            }
        }
        

        return response()->json([
            'data' => [
              'msg' => 'success'
            ]
          ]);


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // LATIHAN LARAVEL QUERY BUILDER >>>>>>>>>>>>>>>>>>>>

        DB::enableQueryLog();
        // $logs = Log::select('qty_in', 'qty_out')->sum('qty_in', 'qty_out');
        // $logs = Log::select(DB::raw('SUM(qty_in) AS qty_in, SUM(qty_out) AS qty_out'))->get();
        // $logs = DB::select("SELECT SUM(qty_in) AS qty_in, SUM(qty_out) AS qty_out FROM logs");

        # Retrieving A Single Row / Column From A Table
        // $logs = DB::table('categories')->where('code', 'GA')->value('name');
        // $logs = Category::where('code', 'GA')->value('name');
        // $logs = DB::table('categories')->find(2);

        # Retrieving A List Of Column Values
        // $logs = DB::table('categories')->pluck('name', 'code');

        # Chunking Results
        // dd(DB::table('users')->chunk());
        // $data = DB::table('users')->orderBy('id')->offset(3)->chunkById(3, function($data) {
        //     foreach ($data as $key => $user) {
        //         $dataUser[] = DB::table('users')->where('id', $user->id)->update(['is_active' => false]);
        //     }
        //     return false;
        // });

        # Streaming Results Lazily
        // $data = DB::table('users')->orderBy('id')->lazy()->each(function($user) {
        //     DB::table('users')->where('id', $user->id)->update(['is_active' => true]);
        // });

        $data = DB::table('users')->orderBy('id')->lazyById()->each(function($user) {
            DB::table('users')->where('id', $user->id)->update(['is_active' => true]);
        });

        // $logs = Log::latest('id')->select('id as id_log', 'date as date_log', 'asset_id as asset', 'qty_in as jumlah_masuk')->first();
        // $logs = DB::select('select `id` as `id_log`, `date` as `date_log` from `logs` order by `id` desc limit 1');
        // $logs = Log::latest('id')->select('id as id_log', 'date as date_log', 'asset_id as asset', 'qty_in as jumlah_masuk')->get()->chunk(30);
        // $map = collect([1, 2, 3, 4, 5]);

        ## Aggregates
        // $data = DB::table('assets')->count();
        $data = DB::table('assets')->max('code');
        $data = DB::table('assets')->min('code');
        $data = DB::table('assets')->where('code', 'LIKE', '%IT%')->sum('quantity');
        // $code = 'IT';
        // $data = DB::select("SELECT * FROM assets");
        $data = DB::table('assets')->where('code', 'LIKE', '%IT%')->avg('quantity');
        $data = DB::table('assets')->where('code', 'LIKE', '%IT%')->get('quantity');

        # Determining If Records Exist
        $data = DB::table('logs')->where('notes', 'LIKE', '%samsung%')->exists();
        $data = DB::table('logs')->where('notes', 'LIKE', '%samsung%')->doesntExist();

        ## Select Statements
        # Specifying A Select Clause
        $data = DB::table('logs')->select('notes as catatan')->get();
        $data = DB::table('logs')->where('notes', 'LIKE', '%acer%')->distinct()->get();

        $data = DB::table('logs')->select('notes');
        $data = $data->addSelect('asset_id')->get();

        ## Raw Expressions
        $data = DB::table('logs')->select(DB::raw('count(*) as jumlahRecordByType, type'))->where('type', '<=', 10)->groupBy('type')->get()->toArray();

        ## Raw Methods
        # selectRaw
        $data = DB::table('logs')->selectRaw('qty_in * ? as quantity', [2])->get()->toArray();

        # whereRaw / orWhereRaw
        $data = DB::table('logs')->select('id', 'type', 'qty_in')
                ->whereRaw('qty_in > IF(type = 10, ?, 4)', [7])
                ->get()->toArray();

        # havingRaw / orHavingRaw
        $data =  DB::table('logs')
                ->select('type', DB::raw('SUM(qty_in) as total_sales'))
                ->groupBy('type')
                ->orderBy('type', 'DESC')
                ->havingRaw('SUM(qty_in) < ?', [8])
                ->get()->toArray();

        # orderByRaw
        $data = DB::table('logs')->select('id', 'updated_at', 'created_at', 'qty_in', 'qty_out')
                ->orderByRaw('updated_at - created_at DESC')
                ->get();

        # groupByRaw
        $data = DB::table('logs')
                ->select('type', 'qty_out')
                ->groupByRaw('type, qty_out')
                ->get();

        ## Joins
        # Inner Join Clause
        $data = DB::table('menu')
                ->join('sub_menu', 'menu.id', '=', 'sub_menu.menu_id')
                ->join('content', 'menu.id', '=', 'content.menu_id')
                ->select('menu.*', 'sub_menu.*', 'content.*')
                ->get();

        # Left Join / Right Join Clause
        $data = DB::table('comments')
                ->leftJoin('commentables', 'comments.id', '=', 'commentables.comment_id')
                ->get();

        $data = DB::table('assets')
                ->rightJoin('logs','assets.id','=','logs.asset_id')->get()
                ->toArray();

        # Cross Join Clause
        $data = DB::table('assets')->crossJoin('logs','assets.id','=','logs.asset_id')->get()->toArray();

        # Advanced Join Clauses
        $data = DB::table('assets')->join('logs', function($join) {
                    $join->on('assets.id', '=', 'logs.asset_id');
                })->get()->toArray();

        $data = DB::table('menu')->join('content', function($join) {
                    $join->on('menu.id', '=', 'content.menu_id')
                    ->orOn('menu.id', '=', 'content.sub_menu_id');
                })->get()->toArray();

        $data = DB::table('assets')->join('logs', function($join) {
                    $join->on('assets.id', '=', 'logs.asset_id')->where('logs.asset_id', '<', '5');
                })->get()->toArray();

        # Subquery Joins
        $logs = DB::table('logs')->select('asset_id', DB::raw('MIN(qty_in) as jumlah'))
                ->where('employee_id', NULL)->groupBy('asset_id');
        $data = DB::table('assets')->joinSub($logs, 'catatan', function($join) {
                    $join->on('assets.id', '=', 'catatan.asset_id');
                })->get()->toArray();

        $logs = DB::table('logs')->select('asset_id', DB::raw('MIN(qty_in) as jumlah'))
                ->where('employee_id', NULL)->groupBy('asset_id');
        $data = DB::table('assets')->leftJoinSub($logs, 'catatan', function($join) {
                    $join->on('assets.id', '=', 'catatan.asset_id');
                })->get()->toArray();

        $logs = DB::table('logs')->select('asset_id', DB::raw('MIN(qty_in) as jumlah'))
                ->where('employee_id', NULL)->groupBy('asset_id');
        $data = DB::table('assets')->rightJoinSub($logs, 'catatan', function($join) {
                    $join->on('assets.id', '=', 'catatan.asset_id');
                })->get()->toArray();

        ## Unions
        $first = DB::table('logs')->whereNull('employee_id');
        $data = DB::table('logs')->whereNull('notes')->unionAll($first)->get();

        ## Basic Where Clauses
        ## Where Clauses
        $data = DB::table('logs')
                ->where('type', 8)
                ->where('qty_in', '>', 5)
                ->get();

        $data = DB::table('logs')->where('qty_in', '!=', 5)->get();

        $data = DB::table('logs')->where('notes', 'like', '%volt%')->get();

        $data = DB::table('logs')->where([
                    ['type', 8],
                    ['qty_in', '>', 5]
                ])->get();

        ## Or Where Clauses
        $data = DB::table('logs')->where('employee_id', 2)->orWhere('type', 50)->get();
        // orWhere, mengambil data jika data yang dimaksud berdasarkan "where/orWhere" ada dalam database

        $data = DB::table('logs')->where('employee_id', 2)->orWhere(function($query) {
                    $query->where('type', 12)->where('asset_id', 12);
                })->get();

        ## Where Not Clauses
        // HANYA ADA DI LARAVEL 9
        // $data = DB::table('logs')->whereNot(function($query) {
        //             $query->where('employee_id', NULL);
        //         })->get();

        // CARA INI DAPAT LANGSUNG MEMANGGIL NAMA COLUMNNYA
        $data = DB::table('logs')->whereType('1')->get();
        $data = DB::table('logs')->whereNotes('Laptop Asus')->get();

        ## JSON Where Clauses

        ## Additional Where Clauses
        $data = DB::table('logs')->whereBetween('id', [5, 8])->get();
        $data = DB::table('logs')->whereNotBetween('id', [5, 8])->get();
        $data = DB::table('logs')->whereIn('id', [3, 4, 5])->get();
        $data = DB::table('logs')->whereNotIn('id', [1, 2, 3])->get();
        $data = DB::table('logs')->whereNull('employee_id')->get();
        $data = DB::table('logs')->whereNotNull('employee_id')->get();
        $data = DB::table('logs')->whereDate('created_at', '2022-04-03')->get();
        $data = DB::table('logs')->whereMonth('created_at', '04')->get();
        $data = DB::table('logs')->whereDay('created_at', '03')->get();
        $data = DB::table('logs')->whereYear('created_at', '2019')->get();
        $data = DB::table('logs')->whereTime('created_at', '=', '16:52:23')->get();
        $data = DB::table('assets')->whereColumn('created_by', 'updated_by')->get();
        $data = DB::table('logs')->whereColumn('created_at', '>', 'updated_at')->get();
        $data = DB::table('logs')->whereColumn([
                    ['date', '=', 'created_at'],
                    ['created_at', '>', 'updated_at']
                ])->get();

        ## Logical Grouping
        $data = DB::table('logs')
                ->where('notes', 'like', '%laptop%')
                ->where(function ($query) {
                    $query->where('asset_id', '<', 5)
                        ->orWhere('notes', 'like', '%macbook%');
                })->get();

        ## Advanced Where Clauses
        ## Where Exists Clauses
        $data = DB::table('assets')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('logs')
                        ->whereColumn('logs.asset_id', 'assets.id');
                })->get();

        ## Subquery Where Clauses
        $data = Asset::where(function ($query) {
                    $query->select('type')
                        ->from('logs')
                        ->whereColumn('logs.asset_id', 'assets.id')
                        ->orderByDesc('logs.asset_id')->limit(1);
                }, 10)->get()->toArray();

        $data = Log::where('qty_in', '<', function($query) {
                    $query->selectRaw('AVG(l.qty_in)')->from('logs as l');
                })->get()->toArray();

        ## Ordering, Grouping, Limit & Offset
        ## Ordering

        # The orderBy Method
        $data = DB::table('logs')
                ->orderBy('id', 'desc')
                ->orderBy('asset_id', 'asc')
                ->get();

        # The latest & oldest Methods
        // MENGAMBIL DATA BERDASARKAN CREATED_AT YANG PALING AKHIR
        $data = DB::table('logs')->latest()->first();

        # Random Ordering
        $data = DB::table('logs')->inRandomOrder()->first();

        # Removing Existing Orderings
        $query = DB::table('logs')->orderBy('created_at');
        $data = $query->reorder()->get();

        $query = DB::table('logs')->orderBy('created_at');
        $data = $query->reorder('id', 'desc')->get();

        ## Grouping
        # The groupBy & having Methods
        $data = DB::table('assets')
                ->selectRaw('count(id) as number_of_orders, category_id')
                ->groupBy('category_id')
                ->having('category_id', [3])
                ->get();

        $data = DB::table('assets')
                ->selectRaw('count(id) as number_of_orders, category_id')
                ->groupBy('category_id')
                ->havingBetween('number_of_orders', [1, 10])
                ->get();

        $data = DB::table('users')
                ->groupBy('email')
                ->having('account_id', '>=', 2)
                ->get();

        $data = DB::table('assets')
                ->groupBy('code')
                ->having('category_id', '>=', 2)
                ->get();

        ## Limit & Offset
        # The skip & take Methods
        $data = DB::table('assets')->skip(5)->take(5)->get();

        $data = DB::table('assets')->offset(5)->limit(5)->get();

        ## Conditional Clauses
        $role = Role::find(2)->id;
        // $role = false;
        $data = DB::table('role_permission')
                ->when($role, function ($query, $role) {
                    return $query->where('role_id', $role);
                })->get();

        $role = Role::find(2)->id;
        // $role = false;
        $data = DB::table('role_permission')
                ->when($role, function ($query, $role) {
                    return $query->where('role_id', $role);
                }, function($query) {
                    return $query->orderBy('id', 'DESC');
                })->get();

        ## Insert Statements
        // $data = DB::table('users')->insert([
        //     'email' => 'kayla@example.com',
        //     'votes' => 0
        // ]);

        // $data = DB::table('users')->insert([
        //     ['email' => 'picard@example.com', 'votes' => 0],
        //     ['email' => 'janeway@example.com', 'votes' => 0],
        // ]);

        // DB::table('users')->insert([
        //     ['id' => 1, 'email' => 'sisko@example.com'],
        //     ['id' => 2, 'email' => 'archer@example.com'],
        // ]);

        // DB::table('users')->insertOrIgnore([
        //     ['id' => 1, 'email' => 'sisko@example.com'],
        //     ['id' => 2, 'email' => 'archer@example.com'],
        // ]);

        ## Auto-Incrementing IDs
        // $data = DB::table('users')->insertGetId(
        //     ['account_id' => 1, 'name' => 'john2', 'email' => 'john2@example.com', 'is_active' => 1, 'password' => Hash::make('12345678')]
        // );

        ## Upserts
        // DB::table('categories_assets')->upsert([
        //     ['name' => 'AC', 'code' => 'TESTAC', 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()]
        // ], ['name', 'code'], ['code']);

        ## Update Statements
        # Update Or Insert
        // DB::table('categories_assets')->updateOrInsert(
        //     ['name' => 'AC2', 'code' => 'AC2', 'created_by' => 1, 'updated_by' => 1, 'created_at' => now(), 'updated_at' => now()],
        //     ['code' => 'AC UPDATE']
        // );

        // DB::table('categories_assets')->updateOrInsert(
        //     ['name' => 'AC2'],
        //     ['code' => 'AC UPDATE']
        // );

        ## Increment & Decrement
        // $data = DB::table('assets')->increment('quantity');
        // $data = DB::table('assets')->increment('quantity', 10);

        // $data = DB::table('assets')->decrement('quantity');
        // $data = DB::table('assets')->decrement('quantity', 35);

        // $data = DB::table('assets')->decrement('quantity', 3,
        //     [
        //         'category_id' => 2,
        //         'vendor_id' => 1,
        //         'has_item' => 0
        //     ]
        // );

        ## Delete Statements
        // DB::table('videos')->truncate();

        ## Pessimistic Locking
        // $data = DB::table('users')
        //         ->where('account_id', '>=', 2)
        //         ->sharedLock()
        //         ->get();

        // $data = DB::table('users')
        //         ->where('account_id', '>=', 2)
        //         ->lockForUpdate()
        //         ->get();

        ## Debugging
        // DB::table('users')->where('account_id', '>=', 2)->get()->dd();
        DB::table('users')->where('account_id', '>=', 2)->get()->dump();

        // dd($data);
        dd($data, DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

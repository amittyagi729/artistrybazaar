<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use DB;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class UserActivityController extends Controller
{
    public function index()
    {
        $latestActivities = UserActivity::latest()->where('user_id', "=", null)->where('email', "=", null)->paginate(100);
        $userActivities = UserActivity::latest()->where('user_id', "!=", null)->orWhere('email', "!=", null)->paginate(100);
        return view('admin.UserActivity.index', ['activity' => $latestActivities, 'userActivities' => $userActivities]);
    }

    public function filter(Request $request)
    {
        $query = DB::table('user_activities');
        $query1 = DB::table('user_activities');

        if ($request->useremail) {
            $users = DB::table('users')
                ->where('email', 'LIKE', '%' . $request->useremail . '%')
                ->pluck('id');

            if ($users->isNotEmpty()) {
                $query1->whereIn('user_id', $users);
            } else {
                return $this->returnEmptyView();
            }
        }

        if ($request->coupon_email) {
            $query->where('email', 'LIKE', '%' . $request->coupon_email . '%');
            $query1->where('email', 'LIKE', '%' . $request->coupon_email . '%');
        }

        if (!$request->useremail && !$request->coupon_email) {
            $query1->whereNotNull('user_id')->orWhereNotNull('email');
        }

        if ($request->filled(['startdate', 'enddate'])) {
            $startDateTime = Carbon::createFromFormat('m/d/Y', $request->startdate)->startOfDay();
            $endDateTime = Carbon::createFromFormat('m/d/Y', $request->enddate)->endOfDay();
            $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
            $query1->whereBetween('created_at', [$startDateTime, $endDateTime]);
        }

        $latestActivities = $query->whereNull(['user_id', 'email'])->latest()->paginate(100);
        $userActivities = $query1->latest()->paginate(100);

        $latestActivities->appends($request->all());
        $userActivities->appends($request->all());

        return view('admin.UserActivity.index', [
            'activity' => $latestActivities,
            'userActivities' => $userActivities,
        ]);
    }

    private function returnEmptyView()
    {
        $emptyPaginator = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 100);

        return view('admin.UserActivity.index', [
            'activity' => $emptyPaginator,
            'userActivities' => $emptyPaginator,
        ]);
    }

}

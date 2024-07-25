<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\LeaveQuota;
use App\Models\Transaction;
use App\Models\BusinessTrip;
use Illuminate\Http\Request;
use App\Models\WfhTransaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employeeId = 1;

        // Memeriksa total cuti karyawan
        $leaveTaken = Transaction::where('employee_id', $employeeId)
                        ->whereYear('created_at', '=', date('Y'))
                        ->whereFor('Cuti')
                        ->whereStatus('Disetujui')
                        ->count();
        // Memeriksa total unpaid leave karyawan
        $unpaidLeave = Transaction::where('employee_id', $employeeId)
                        ->whereYear('created_at', '=', date('Y'))
                        ->whereFor('Izin')
                        ->whereSubPermission('Lainnya')
                        ->whereStatus('Disetujui')
                        ->count();

        // Menampilkan semua data pengajuan cuti yang disetuji
        $cutiTransactions = Transaction::with('employee')
                        ->selectRaw('employee_id, sum(total_day) as total')
                        ->groupBy('employee_id')
                        ->whereYear('created_at', '=', date('Y'))
                        ->whereFor('Cuti')
                        ->whereStatus('Disetujui')
                        ->orderBy('total', 'desc')
                        ->limit(5)
                        ->get();

        // Membuat line chart
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        $monthCustom = [
            '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'
        ];

        $getTransactions = [];
        foreach ($monthCustom as $value) {
            $getTransactions[] = Transaction::whereStatus('Disetujui')
                            ->whereFor('Cuti')
                            ->whereMonth('leave_date', $value)
                            ->whereYear('created_at', '=', date('Y'))
                            ->count();
        }

        return view('index', compact([
            'leaveTaken', 'unpaidLeave',
            'cutiTransactions',
        ]))
        ->with('monthNames', json_encode($monthNames,JSON_NUMERIC_CHECK))
        ->with('getTransactions', json_encode($getTransactions,JSON_NUMERIC_CHECK));
    }


}

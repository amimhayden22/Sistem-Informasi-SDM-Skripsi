<?php

namespace App\Console\Commands;

use Log;
use Mail;
use Carbon\Carbon;
use App\Models\EmailLog;
use App\Models\Employee;
use Illuminate\Console\Command;
use App\Mail\ContractCompletionNotification;

class SendContractCompletionNotificationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:contract-completion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To notify the manager that there are employees whose contracts are almost finished';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dateNow = Carbon::now()->toDateString();
        $employees = Employee::where('status', 'Active')->get();

        foreach ($employees as $employee) {

            $name = null;
            $email = null;

            switch ($employee->part->name) {
                case 'Marketing and Partnerships':
                    if ($employee->position->name === 'Marketing and Partnerships Manager') {
                        $positionName = 'Chief Executive Officer';
                    } else {
                        $positionName = 'Marketing and Partnerships Manager';
                    }
                    break;
                case 'Product Development':
                    $positionName = 'Chief Executive Officer';
                    break;
                case 'Finance Accounting Tax':
                    if ($employee->position->name === 'Finance Accounting Tax Manager') {
                        $positionName = 'Chief Executive Officer';
                    } else {
                        $positionName = 'Finance Accounting Tax Manager';
                    }
                    break;
                default:
                    $positionName = 'Chief Executive Officer';
                    break;
            }

            $checkEmployee = Employee::whereHas('position', function ($query) use ($positionName) {
                $query->where('positions.name', $positionName);
            })->first();

            if (is_null($checkEmployee)) {
                Log::info("No employee found");
            }

            $name = $checkEmployee->name;
            $email = $checkEmployee->email;

            // Kirim email
            try {
                // Kirim email dengan masa kontrak karyawan yang hampir habis
                if ($dateNow > Carbon::parse($employee->end_of_contract)->subDays(30)) {
                    // Memeriksa apakah sudah mengirim pengingat ke manager
                    $emailLog = EmailLog::where('employee_id', $employee->id)->whereYear('sent_at', Carbon::now()->year)->first();
                    if (is_null($emailLog)) {
                        if ($employee->code != 'SDS-001') {
                            $createLog = EmailLog::create([
                                'employee_id'   => $employee->id,
                                'sent_at'       => Carbon::now(),
                            ]);

                            // Mengirim pengingat ke manager
                            Mail::to($email)->cc('majus386@gmail.com')->send(new ContractCompletionNotification($employee, $name));
                            // $this->info("Sending email to: $email");
                            // $this->info($employee->name." Belum ada pengingat ke manager");
                        }
                    }
                    $this->info("Sudah ada pengingat ke manager pada ".$emailLog->sent_at);
                }
            } catch (\Exception $e) {
                // Tangani pengecualian di sini
                Log::error('Gagal mengirim email pemberitahuan masa kontrak karyawan karena: ' . $e->getMessage());
            }
        }
    }
}

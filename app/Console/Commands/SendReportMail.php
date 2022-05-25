<?php

namespace App\Console\Commands;

use App\Mail\ReportMail;
use App\Repositories\Order\OrderRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReportMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly-report:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Report Email Weekly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        OrderRepository $orderRepo
    ) {
        parent::__construct();

        $this->userRepo = $userRepo;
        $this->orderRepo = $orderRepo;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = $this->userRepo->getAdmins();
        $total = $this->orderRepo->getSales();

        foreach ($users as $user) {
            $mail = new ReportMail($user, $total);
            Mail::to($user->email)->queue($mail);
        }
    }
}

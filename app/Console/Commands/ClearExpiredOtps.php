<?php

namespace App\Console\Commands;

use App\Models\PasswordResetOtp;
use Illuminate\Console\Command;
use Log;
use Schedule;

class ClearExpiredOtps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'otps:clear-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Clean Expired Tokens from Password Reset OTPs Table';

    /**
     * Execute the console command.
     */
    public function handle()
    {

       // Log::info('Clearing expired OTPs...');
       PasswordResetOtp::where('expires_at', '<', now())->delete(); 
    }
}

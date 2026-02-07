<?php

namespace App\Livewire;

use App\Mail\OtpMail;
use App\Models\PasswordResetOtp;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Log;
use Mail;

class ResetPassword extends Component
{
    public $email=null;
    public $reset_sent=false;
    public $otp=null;
    public $password=null;
    public $password_confirmation=null;

    public function resetPass(){
        if($this->reset_sent==false){
            $this->validate([
                "email"=>[Rule::requiredIf(!$this->reset_sent),"email","exists:users,email"]
            ]);
        PasswordResetOtp::where('email', $this->email)->delete();

        $otp = rand(100000, 999999); // 6-digit
        $expiresAt = now()->addMinutes(10);
        $pas=PasswordResetOtp::create([
            'email' => $this->email,
            'otp' => $otp,
            'expires_at' => $expiresAt,
        ]);
        try {
            Mail::to($this->email)->send(new OtpMail($otp));
            Log::info("Email sent to: " . $this->email);
        } catch (\Exception $e) {
            Log::error("Mail send failed: " . $e->getMessage());
        }
        $this->reset_sent=true;
    }elseif($this->reset_sent==true){
            $otpRecord = PasswordResetOtp::where('email', $this->email)
                ->where('otp', $this->otp)
                ->where('expires_at', '>', now())
                ->first();

            if ($otpRecord) {
                // OTP is valid, proceed with password reset
                $this->validate([
                'password' => [Rule::requiredIf($this->reset_sent!==false), 'confirmed', 'min:8'],
                ]);

                // Update the user's password
                $user = $otpRecord->user;
                $user->password = bcrypt($this->password);
                $user->save();

                // Delete the OTP record
                $otpRecord->delete();

                // Optionally, log the password reset
                Log::info("Password reset successful for email: {$this->email}");

                // Provide feedback to the user
                session()->flash('message', 'Your password has been reset successfully.');
                return redirect()->route('register');
            } else {
                // OTP is invalid or expired
                session()->flash('error', 'Invalid or expired OTP.');
            }
        }
    }
    public function render()
    {
        return view('livewire.reset-password')->layout('components.layouts.guest');
    }
}

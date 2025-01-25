<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Mail;

use App\Mail\UserCreated;
use App\Mail\resetMail;

class Login extends Component
{
    public $email, $modalReset = null;
    public $password = null;
    public $remember_me = false;  
    public $showSuccesNotification, $showFailureNotification = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount() 
    {
        if(auth()->user()){
            redirect('/dashboard');
        }
        $this->fill(['email' => 'admin@email.com', 'password' => '21246813']);
    }
    public function login() 
    {    
        $user = User::where('email', '=', $this->email)->first();
        
        if($user->count() > 0){
            if($user->email == $this->email and password_verify($this->password, $user->password)) 
            {
                auth()->login($user, $this->remember_me);
                return redirect()->intended('/dashboard'); 

            }else
            {
                return $this->addError('email', trans('auth.failed')); 
            }
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
    public function resetPassword()
    {
        $this->modalReset = true;
    }
    public function recoverPassword()
    {
        $user = User::where('email', '=', $this->email)->first();
        
        //dd($user);

        if(isset($user))
        {
            //dd($user->email);
            //return view('livewire.auth.reset');
            Mail::to($user->email)->send(new resetMail());
            $this->showSuccesNotification = true;
        }
        else
        {
            $this->showFailureNotification = true;
        }
    }
}

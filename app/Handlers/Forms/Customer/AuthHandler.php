<?php
namespace App\Handlers\Forms\Customer;

use App\Support\Facades\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Lavender\Contracts\Form;

class AuthHandler
{

    public function login(Form $form)
    {
        $auth = Auth::customer();

        $request = $form->request->all();

        if(!$auth->logAttempt($request, config('store.signup_confirm'))){

            if($auth->isThrottled($request)){

                $error = trans('account.alerts.too_many_attempts');

            } elseif($auth->existsButNotConfirmed($request)){

                $error = trans('account.alerts.instructions_sent');

            } else {

                $error = trans('account.alerts.wrong_credentials');
            }

            Message::addError($error);

        }

    }

    public function register(Form $form)
    {
        $auth = Auth::customer();

        $request = $form->request->all();

        if(!$auth->findByEmail($request['email'])){

            $auth->register($request);

            $user = $auth->findByEmail($request['email']);

            if($user->id){

                if(config('store.signup_email')){

                    Mail::queueOn(
                        'default',
                        config('store.email_account_confirmation'),
                        compact('user'),
                        function ($message) use ($user){
                            $message->to($user->email)->subject(trans('account.email.confirmation.subject'));
                        }
                    );

                    Message::addSuccess(trans('account.alerts.instructions_sent'));
                } else{

                    Message::addSuccess(trans('account.alerts.account_created'));
                }
            } else{

                foreach($user->errors()->all(':message') as $error){

                    Message::addError($error);

                }
            }
        } else{

            Message::addError(trans('account.alerts.duplicated_credentials'));
        }
    }

    public function reset_password(Form $form)
    {
        $auth = Auth::customer();

        $request = $form->request->all();

        if($auth->resetPassword($request)){

            Message::addSuccess(trans('account.alerts.password_reset'));

        } else {

            Message::addError(trans('account.alerts.wrong_password_reset'));
        }
    }

    public function forgot_password(Form $form)
    {
        $auth = Auth::customer();

        $request = $form->request->all();

        if($auth->forgotPassword($request['email'])){

            Message::addSuccess(trans('account.alerts.password_forgot'));

        } else {

            Message::addError(trans('account.alerts.wrong_password_forgot'));

        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Form\Customer\Register',
            'App\Handlers\Forms\Customer\AuthHandler@register',
            10
        );

        $events->listen(
            'App\Form\Customer\Login',
            'App\Handlers\Forms\Customer\AuthHandler@login',
            10
        );

        $events->listen(
            'App\Form\Customer\ForgotPassword',
            'App\Handlers\Forms\Customer\AuthHandler@forgot_password',
            10
        );

        $events->listen(
            'App\Form\Customer\ResetPassword',
            'App\Handlers\Forms\Customer\AuthHandler@reset_password',
            10
        );
    }

}
<?php
namespace App\Handlers\Forms\Admin;

use App\Support\Facades\Message;
use Illuminate\Support\Facades\Auth;
use Lavender\Contracts\Form;

class AuthHandler
{
    public function login(Form $form)
    {
        $request = $form->request->all();

        if(!Auth::admin()->logAttempt($request, $mustBeConfirmed = false)){

            if(Auth::admin()->isThrottled($request)){

                $error = trans('account.alerts.too_many_attempts');

            } else {

                $error = trans('account.alerts.wrong_credentials');
            }

            Message::addError($error);

            throw new \Exception($error);

        }
    }

    public function reset_password(Form $form)
    {
        $request = $form->request->all();

        if(!Auth::customer()->resetPassword($request)){

            throw new \Exception(trans('account.alerts.wrong_password_reset'));
        }

        Message::addSuccess(trans('account.alerts.password_reset'));

    }

    public function forgot_password(Form $form)
    {
        $request = $form->request->all();

        if(!Auth::customer()->forgotPassword($request['email'])){

            $error = trans('account.alerts.wrong_password_forgot');

            Message::addError($error);

            throw new \Exception($error);
        }

        Message::addSuccess(trans('account.alerts.password_forgot'));

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
            'App\Form\Admin\Login',
            'App\Handlers\Forms\Admin\AuthHandler@login'
        );
    }

}
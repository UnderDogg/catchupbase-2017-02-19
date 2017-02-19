<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Access\ChangePasswordRequest;
use App\Models\Access\User\User;
use App\Repositories\Frontend\User\UserContract;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PasswordController.
 */
class PasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var string
     */
    protected $redirectPath = '/dashboard';

    /**
     * @param Guard $auth
     * @param PasswordBroker $passwords
     * @param UserContract $user
     */
    public function __construct(Guard $auth, PasswordBroker $passwords, UserContract $user)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;
        $this->user = $user;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getEmail()
    {
        return view('frontend.auth.password');
    }

    /**
     * @param Request $request
     *
     * @throws GeneralException
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postEmail(Request $request)
    {
        /*
         * First of all check if the input is a valid email
         */
        $this->validate($request, ['email' => 'required|email']);

        /*
         * Make sure user is confirmed before resetting password.
         */
        $user = User::where('email', $request->get('email'))->first();

        if ($user) {
            if ($user->isconfirmed == 0) {
                throw new GeneralException('Your account is not confirmed. Please click the confirmation link in your e-mail, or ' . '<a href="' . route('account.confirm.resend', $user->id) . '">click here</a>' . ' to resend the confirmation e-mail.');
            }
        } else {
            throw new GeneralException('There is no user with that e-mail address.');
        }

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    /**
     * @param null $token
     *
     * @return mixed
     */
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException();
        }

        return view('frontend.auth.reset')->withToken($token);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getChangePassword()
    {
        return \Theme::view('auth.change-password');
    }

    /**
     * @param ChangePasswordRequest $request
     *
     * @return mixed
     */
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $this->user->changePassword($request->all());

        return redirect()->route('frontend.dashboard')->withFlashSuccess(trans('strings.password_successfully_changed'));
    }
}

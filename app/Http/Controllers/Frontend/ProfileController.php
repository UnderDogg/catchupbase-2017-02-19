<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\User\UserContract;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        return view('frontend.user.profile.edit')
            ->withUser(auth()->user());
    }

    /**
     * @param UserContract $user
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UserContract $user, UpdateProfileRequest $request)
    {
        $user->updateProfile($request->all());

        return redirect()->route('frontend.dashboard')->withFlashSuccess(trans('strings.profile_successfully_updated'));
    }
}

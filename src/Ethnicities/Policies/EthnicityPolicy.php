<?php

namespace Myrtle\Core\Ethnicities\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Ethnicities\Models\Ethnicity;

class EthnicityPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

	public function admin(User $user)
	{
		return $user->allPermissions->contains(function ($ability, $key)
		{
			return $ability->name === 'ethnicities.admin';
		});
	}

    /**
     * Determine whether the user can view the ethnicity.
     *
     * @param  App\User  $user
     * @param  App\Ethnicity  $ethnicity
     * @return mixed
     */
    public function view(User $user, Ethnicity $ethnicity)
    {
        return $user->allPermissions->contains(function($ability, $key) use ($ethnicity) {
            return $ability->name === 'ethnicities.manage' || $ability->name === 'ethnicities.view.' . $ethnicity->id;
        });
    }

    /**
     * Determine whether the user can create ethnicities.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->allPermissions->contains(function($ability, $key) use ($user) {
            return $this->admin($user) || $ability->name === 'ethnicities.create';
        });
    }

    /**
     * Determine whether the user can update the ethnicity.
     *
     * @param  App\User  $user
     * @param  App\Ethnicity  $ethnicity
     * @return mixed
     */
    public function update(User $user, Ethnicity $ethnicity)
    {
        return $user->allPermissions->contains(function($ability, $key) use ($ethnicity, $user) {
            return $this->admin($user)
            || $ability->name === 'ethnicities.edit'
            || $ability->name === 'ethnicities.edit.' . $ethnicity->id;
        });
    }

    /**
     * Determine whether the user can delete the ethnicity.
     *
     * @param  App\User  $user
     * @param  App\Ethnicity  $ethnicity
     * @return mixed
     */
    public function delete(User $user, Ethnicity $ethnicity)
    {
        return $user->allPermissions->contains(function($ability, $key) use ($ethnicity) {
			return $this->admin($user) || $ability->name === 'ethnicities.delete';
        });
    }
}

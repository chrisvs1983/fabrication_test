<?php

namespace Cvs\Fabrication\Policies;

use App\User;
use Cvs\Fabrication\Models\Material;

class MaterialPolicy
{

    /**
     * Determine if the given user can view the material.
     *
     * @param User $user
     * @param Material $material
     *
     * @return bool
     */
    public function view(User $user, Material $material)
    {
        if ($user->canDo('fabrication.material.view') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.view') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $material->user_id;
    }

    /**
     * Determine if the given user can create a material.
     *
     * @param User $user
     * @param Material $material
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('fabrication.material.create');
    }

    /**
     * Determine if the given user can update the given material.
     *
     * @param User $user
     * @param Material $material
     *
     * @return bool
     */
    public function update(User $user, Material $material)
    {
        if ($user->canDo('fabrication.material.update') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.update') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $material->user_id;
    }

    /**
     * Determine if the given user can delete the given material.
     *
     * @param User $user
     * @param Material $material
     *
     * @return bool
     */
    public function destroy(User $user, Material $material)
    {
        if ($user->canDo('fabrication.material.delete') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('blocks.block.delete') 
        && $user->is('manager')
        && $block->user->parent_id == $user->id) {
            return true;
        }

        return $user->id === $material->user_id;
    }

    /**
     * Determine if the given user can verify the given material.
     *
     * @param User $user
     * @param Material $material
     *
     * @return bool
     */
    public function verify(User $user, Material $material)
    {
        if ($user->canDo('fabrication.material.verify') && $user->is('admin')) {
            return true;
        }

        if ($user->canDo('fabrication.material.verify') 
        && $user->is('manager')
        && $material->user->parent_id == $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given material.
     *
     * @param User $user
     * @param Material $material
     *
     * @return bool
     */
    public function approve(User $user, Material $material)
    {
        if ($user->canDo('fabrication.material.approve') && $user->is('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}

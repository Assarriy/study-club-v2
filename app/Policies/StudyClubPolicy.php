<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\StudyClub;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudyClubPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:StudyClub');
    }

    public function view(AuthUser $authUser, StudyClub $studyClub): bool
    {
        return $authUser->can('View:StudyClub');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:StudyClub');
    }

    public function update(AuthUser $authUser, StudyClub $studyClub): bool
    {
        return $authUser->can('Update:StudyClub');
    }

    public function delete(AuthUser $authUser, StudyClub $studyClub): bool
    {
        return $authUser->can('Delete:StudyClub');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:StudyClub');
    }

    public function restore(AuthUser $authUser, StudyClub $studyClub): bool
    {
        return $authUser->can('Restore:StudyClub');
    }

    public function forceDelete(AuthUser $authUser, StudyClub $studyClub): bool
    {
        return $authUser->can('ForceDelete:StudyClub');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:StudyClub');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:StudyClub');
    }

    public function replicate(AuthUser $authUser, StudyClub $studyClub): bool
    {
        return $authUser->can('Replicate:StudyClub');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:StudyClub');
    }

}
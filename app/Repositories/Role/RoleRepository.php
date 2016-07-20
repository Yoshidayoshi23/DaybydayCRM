<?php
namespace App\Repositories\Role;

use App\Role;
use App\Permissions;

class RoleRepository implements RoleRepositoryContract
{

    public function listAllRoles()
    {
        return Role::lists('name', 'id');
    }

    public function allPermissions()
    {
        return Permissions::all();
    }

    public function allRoles()
    {
        return Role::all();
    }

    public function permissionsUpdate($requestData)
    {
        $allowed_permissions = [];
        foreach ($requestData->input('permissions') as $permissionId => $permission) {
            if ($permission === '1') {
                $allowed_permissions[] = (int)$permissionId;
            }
        }
       
        $role = Role::find($requestData->input('role_id'));

        $role->permissions()->sync($allowed_permissions);
        $role->save();
    }

    public function create($requestData)
    {
        $roleName = $requestData->name;
        $roleDescription = $requestData->description;
        Role::create([
        'slug' => $roleName,
             'description' => $roleDescription
             ]);
    }

    public function destroy($id)
    {
        $role = Role::findorFail($id);
        if ($role->id !== 1) {
            $role->delete();
        } else {
            Session()->flash('flash_message_warning', 'Can not delete Administrator role');
        }
    }
}

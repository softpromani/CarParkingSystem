<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrPermission = ['dashboard', 'dashboard_create', 'dashboard_read', 'dashboard_edit', 'dashboard_delete', 'god_eye_create', 'god_eye', 'god_eye_read', 'god_eye_edit', 'god_eye_delete', 'employee', 'employee_create', 'employee_read', 'employee_edit', 'employee_delete', 'guard',
            'guard_create', 'guard_read', 'guard_edit', 'guard_delete', 'user_enquiry', 'user_enquiry_create', 'user_enquiry_read', 'user_enquiry_edit', 'customer', 'customer_create', 'customer_read', 'customer_edit',
            'customer_delete', 'coupan', 'coupan_create', 'coupan_read', 'coupan_edit', 'coupan_delete', 'wallet', 'wallet_create', 'wallet_read',
            'wallet_edit', 'wallet_delete', 'faq', 'faq_create', 'faq_read', 'faq_edit', 'faq_delete', 'parking_facilities', 'parking_facilities_create', 'parking_facilities_read',
            'parking', 'parking_create', 'parking_read', 'parking_edit', 'parking_delete', 'business_setting'];

        foreach ($arrPermission as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $r = Role::where('name', 'admin')->first();
        $r->syncPermissions($arrPermission);
    }
}

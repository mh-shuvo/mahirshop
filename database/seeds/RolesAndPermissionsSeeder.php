<?php
	use Illuminate\Database\Seeder;
	use Spatie\Permission\Models\Role;
	use Spatie\Permission\Models\Permission;
	
	class RolesAndPermissionsSeeder extends Seeder
	{
		public function run()
		{
			// Reset cached roles and permissions
			app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
			
			// create permissions
			Permission::create(['name' => 'edit account']);
			Permission::create(['name' => 'delete account']);
			Permission::create(['name' => 'view account']);
			
			Permission::create(['name' => 'edit product']);
			Permission::create(['name' => 'delete product']);
			Permission::create(['name' => 'view product']);
			
			Permission::create(['name' => 'edit order']);
			Permission::create(['name' => 'delete order']);
			Permission::create(['name' => 'view order']);
			
			Permission::create(['name' => 'edit user_manager']);
			Permission::create(['name' => 'delete user_manager']);
			Permission::create(['name' => 'view user_manager']);
			
			Permission::create(['name' => 'edit withdrawal']);
			Permission::create(['name' => 'delete withdrawal']);
			Permission::create(['name' => 'view withdrawal']);
			
			Permission::create(['name' => 'edit dealer_management']);
			Permission::create(['name' => 'delete dealer_management']);
			Permission::create(['name' => 'view dealer_management']);
			
			// create roles and assign created permissions
			
			// this can be done as separate statements
			$role = Role::create(['name' => 'accountant'])
			->givePermissionTo(['edit account', 'delete account', 'view account']);
			
			$role = Role::create(['name' => 'manager'])
			->givePermissionTo(['edit product', 'delete product', 'view product']);
			
			$role = Role::create(['name' => 'admin'])
			->givePermissionTo(Permission::all());
			
			$role = Role::create(['name' => 'user'])
			->givePermissionTo(['edit withdrawal', 'delete withdrawal', 'view withdrawal']);
			
			$role = Role::create(['name' => 'free']);
			$role = Role::create(['name' => 'dealer'])
			->givePermissionTo(['edit dealer_management', 'delete dealer_management', 'view dealer_management']);
			
		}
	}																		
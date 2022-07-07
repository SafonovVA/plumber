<?php

namespace Database\Seeders\VoyagerBase;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run(): void
    {
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural' => __('voyager::seeders.data_types.user.plural'),
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'images');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'images',
                'display_name_singular' => 'Изображение',
                'display_name_plural' => 'Изображения',
                'icon' => 'voyager-images',
                'model_name' => 'App\\Models\\Image',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'contents');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'contents',
                'display_name_singular' => 'Контент',
                'display_name_plural' => 'Контент',
                'icon' => 'voyager-file-text',
                'model_name' => 'App\\Models\\Content',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'services');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'services',
                'display_name_singular' => 'Service',
                'display_name_plural' => 'Services',
                'icon' => 'voyager-company',
                'model_name' => 'App\\Models\\Service',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural' => __('voyager::seeders.data_types.menu.plural'),
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural' => __('voyager::seeders.data_types.role.plural'),
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param $field
     * @param $for
     * @return mixed [type] [description]
     */
    protected function dataType($field, $for): mixed
    {
        return DataType::firstOrNew([$field => $for]);
    }
}

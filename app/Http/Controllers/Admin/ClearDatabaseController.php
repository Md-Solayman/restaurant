<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ClearDatabaseController extends Controller
{
    public function index()
    {
        try {
            return view('admin.clear_database.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {
        try {

            // clear database
            Artisan::call('migrate:fresh');

            // seed the db
            Artisan::call('db:seed', ['--class'  => 'UserSeeder']);
            Artisan::call('db:seed', ['--class' => 'MenuBuilderSeeder']);
            Artisan::call('db:seed', ['--class' => 'GeneralSettingsSeeder']);
            Artisan::call('db:seed', ['--class' => 'PaymentSettingsSeeder']);
            Artisan::call('db:seed', ['--class' => 'SectionTitleSeeder']);

            // remove images
            $this->removeAllImages();

            return response(['message'  => 'Database Has Been Cleared Successfully', 'status' => 'success']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function removeAllImages()
    {
        try {
            $path = public_path('/uploads');
            $preserveFiles = ['naim.jpg', 'admin.jpg', 'demo.jpg'];
            $allFiles = File::allFiles($path);

            foreach ($allFiles as $file) {
                $fileName = $file->getFilename();

                if (!in_array($fileName, $preserveFiles)) {
                    File::delete($file->getPathname());
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

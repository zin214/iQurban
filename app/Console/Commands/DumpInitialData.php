<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use App\Configuration;

class DumpInitialData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initial:default';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will dump initial data using default values';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roles_name = array('Admin','Organizer','Customer');

        $configurations = array('theme' => 'dark',
                                'appName' => config('app.name'),
                                'navbarColor'=>'dark',
                                'sidebarColor' => 'primary',
                                'cardColor' => 'primary',
                                'logo' => 'configuration/logo.png');

        foreach($roles_name as $role){
            Role::create([
                'name' => $role,
            ]);
        }

        $user = User::create([
            'username' => 'admin',
            'name' => config('app.client_name'),
            'role_id' => 1,
            'email' => config('app.email'),
            'password' => bcrypt('123456')
        ]);

        foreach ($configurations as $key => $configuration) {
            Configuration::create([
                'key' => $key,
                'value' => $configuration
            ]);
        }
    }
}

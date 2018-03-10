<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stanel:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create SuperAdmin';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Hi ! Welcome to Stanel, you are about to create the superuser :)');

        $email = $this->ask('Email');
        $password = $this->secret('Password');

        User::create([
            'name' => 'root',
            'email' => $email,
            'password' => bcrypt($password),
            'is_admin' => true,
        ]);
        $this->info('Good job ! All is ready,');
        $this->info('Username : '.$email);
    }
}

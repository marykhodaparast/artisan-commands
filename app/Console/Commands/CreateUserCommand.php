<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user';

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
        $name = Str::random(8);
        $password = Str::random(12);
        User::create([
            'name' => $name,
            'email' => $name. '@gmail.com',
            'password' => bcrypt($password)
        ]);
        $this->info('successfully created Email:'. $name .'@gmail.com & passoword:'. $password );
    }
}

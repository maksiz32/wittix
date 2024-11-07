<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add {first_name} {last_name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new user with auto-generated username and password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $first_name = $this->argument('first_name');
        $last_name = $this->argument('last_name');

        // Generate
        $username = strtolower(Str::slug($first_name . ' ' . $last_name));
        $password = Str::random(8);

        User::create([
            'username' => $username,
            'password' => Hash::make($password),
            'first_name' => $first_name,
            'last_name' => $last_name,
        ]);

        $this->info('User ' . $username . ' created with password ' . $password);
    }
}

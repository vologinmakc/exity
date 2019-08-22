<?php
/**
 * Created by PhpStorm.
 * User: gluck
 * Date: 22.11.2018
 * Time: 23:34
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It make user';

    public function handle()
    {
        $name = $this->ask(
            'User name?',
            null
        );
        $email = $this->ask(
            'User email?',
            null
        );
        $password = $this->ask(
            'User password?',
            '123456'
        );

        /** @var User $user */
        $params = [
            'password' => Hash::make($password),
            'email' => $email,
            'name' => $name
        ];
        $filled = array_filter($params, function ($param) {
            return !is_null($param);
        });

        $user = factory(User::class)->make($filled);
        $user->save();
        $this->info('User created successfully.');
        $this->table(['name', 'email'], [[$user->name, $user->email]]);
    }
}

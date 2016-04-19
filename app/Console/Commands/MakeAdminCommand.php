<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class MakeAdminCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {username : 用户名} {--password= : 用户密码}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '新建一个管理员帐号';

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
        $user = User::create([
            'username' => $this->argument('username'),
            'password' => bcrypt($this->option('password'))
        ]);

        if ($user) {
            $this->info('用户 ' . $user->username . ' 创建成功');
        }
    }
}

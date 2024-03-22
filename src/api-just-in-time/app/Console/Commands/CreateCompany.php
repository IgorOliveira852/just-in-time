<?php

namespace App\Console\Commands;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Console\Command;

class CreateCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:create {nome} {cnpj} {endereco}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma nova empresa e um usuário admin associado';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nome = $this->argument('nome');
        $cnpj = $this->argument('cnpj');
        $endereco = $this->argument('endereco');

        $user = User::create([
            'phone' => $this->ask('Digite o número de telefone do admin:'),
            'role' => UserRoleEnum::ADMIN->value
        ]);

        $company = Company::create([
            'nome' => $nome,
            'cnpj' => $cnpj,
            'endereco' => $endereco,
            'user_id' => $user->id
        ]);

        $this->info("Empresa {$company->nome} e usuário admin criados com sucesso!");
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertCitiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert cities in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios';
            $data = file_get_contents($url);
            $municipalities = json_decode($data, true);

            foreach ($municipalities as $municipality) {
                $exists = DB::table('cities')->where('id', $municipality['id'])->exists();

                if (!$exists) {
                    DB::table('cities')->insert([
                        'id' => $municipality['id'],
                        'name' => $municipality['nome'],
                        'state_id' => $municipality['microrregiao']['mesorregiao']['UF']['id']
                    ]);
                }
            }

            $this->info('Inserido com sucesso');
        } catch (\Throwable $th) {
            $this->error(throw $th);
        }
    }
}

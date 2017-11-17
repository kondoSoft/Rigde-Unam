<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Acceso;

class accesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Usuario administrador del sistema',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Usuario ISI',
                'descripcion' => 'Acceso a usuario Institución',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Usuario DGIRE',
                'descripcion' => 'Acceso a usuario DGIRE',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Supervisor',
                'descripcion' => 'Permiso de supervisor',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Jefe de claustro',
                'descripcion' => 'Permiso de Jefe de Claustro',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        ];
        foreach ($datos as $dato) {
            try {
                $acceso = new Acceso;
                $acceso->insert($dato);
                $this->command->info('Se guardo correctamente el acceso ' . $dato['nombre']);
            } catch (Exception $e) {

                $this->command->error($e->getMessage());
            }


        }

    }
}

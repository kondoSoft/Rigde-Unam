<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Grupo;

class GruposTableSeeder extends Seeder
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
                'nombre' => 'Claustro II - Químico biologicas y de la salud',
                'descripcion' => 'Se dedica a validar el área Químico biologicas y de la salud',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Claustro III - Ciencias Sociales',
                'descripcion' => 'Dedicado a Ciencias Sociales',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Claustro prueba',
                'descripcion' => 'Test',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Claustro 4 - Humanidades y Artes',
                'descripcion' => 'Dedicada a Humanidades y Artes',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Claustro de Licenciaturas',
                'descripcion' => 'Dedicado a Licenciaturas',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Claustro 1-',
                'descripcion' => 'Demo',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Prueba',
                'descripcion' => 'Prueba',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]

        ];
        foreach ($datos as $dato) {
            try {
                $grupo = new Grupo;
                $grupo->insert($dato);
                $this->command->info('Se guardo correctamente el dato ' . $dato['nombre']);
            } catch (Exception $e) {

                $this->command->error($e->getMessage());
            }


        }
    }
}

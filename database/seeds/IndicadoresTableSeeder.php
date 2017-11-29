<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Indicador;

class IndicadoresTableSeeder extends Seeder
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
                'clave' => 'Usuario administrador del sistema',
                'tipo' => 'Prueba tipo',
                'origen' => 'prueba origen',
                'objetivo' => 'prueba objetivo',
                'pertinencia' => 'prueba pertinencia',
                'periodicidad' => 'prueba periodicidad',
                'activo' => 1,
                'responsableSeguimiento' => 1,
                'responsableEjecucion' => 1,
                'dimension' => 1,
                'extra' => 'prueba extra',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        foreach ($datos as $dato) {
            try {
                $model = new Indicador;
                $model->insert($dato);
                $this->command->info('Se guardo correctamente el dato ' . $dato['nombre']);
            } catch (Exception $e) {
                $this->command->error($e->getMessage());
            }


        }
    }
}

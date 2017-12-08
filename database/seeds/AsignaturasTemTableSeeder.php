<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Asignatura;

class AsignaturasTemTableSeeder extends Seeder
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
                'nombre' => 'Biología I',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Biología II',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Biología III',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Biología IV',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Ciencias de la Salud I',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Ciencias de la Salud II',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física I',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física II',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física III',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física IV',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Psicología I',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Psicología II',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química I',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química II',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química III',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química IV',
                'planEstudio' => 'CCH',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Biología IV',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Biología V Área I',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Biología V Área II',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Temas Selectos de Biología',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Educación para la Salud',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Temas Selectos de Morfología y Fisiología',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física III',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física IV Área I',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Física IV Área II',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Psicología',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química III',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química IV Área I',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Química IV Área II',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Físico Química',
                'planEstudio' => 'ENP',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        foreach ($datos as $dato) {
            try {
                $model = Asignatura::firstOrCreate([
                    'nombre' => $dato['nombre'],
                    'planEstudio' => $dato['planEstudio'],
                ]);
                $this->command->info('Se guardo correctamente el dato ' . $dato['nombre']);
            } catch (Exception $e) {
                $this->command->error($e->getMessage());
            }
        }
    }
}

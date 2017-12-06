<?php

use Illuminate\Database\Seeder;
use App\TipoMaterial;
use App\UnidadMedida;
use App\MaterialRequerimiento;
use App\Asignatura;
use App\Material;

class MaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ruta de los archivos que contienen los datos
        $paths = [
            base_path('database/seeds/MinBiolCCH.csv'),
            base_path('database/seeds/MinBiolTSBENP.csv'),
            base_path('database/seeds/MinFisCCH.csv'),
            base_path('database/seeds/MinFisENP.csv'),
            base_path('database/seeds/MinPsiCCH.csv'),
            base_path('database/seeds/MinQuiCCH.csv'),
            base_path('database/seeds/MinQuiFQENP.csv'),
            base_path('database/seeds/MinE.P.S.T.S.M.F.ENP.csv'),
            base_path('database/seeds/MinCSCCH.csv')
        ];
        $answer = $this->command->ask('Desea truncar las tablas unidadesMedida, tipoMateriales, materialesRequerimiento, materiales? (y/n)');
        if ($answer === 'y') {
            DB::statement('TRUNCATE unidadesMedida');
            $this->command->info('Tabla unidadesMedida truncada correctamente!');
            DB::statement('TRUNCATE tipoMateriales');
            $this->command->info('Tabla tipoMateriales truncada correctamente!');
            DB::statement('TRUNCATE materialesRequerimiento');
            $this->command->info('Tabla materialesRequerimiento truncada correctamente!');
            DB::statement('TRUNCATE materiales');
            $this->command->info('Tabla unidadesMedida materiales correctamente!');
        }
        //Recorremos cada ruta
        foreach ($paths as $path) {
            $this->command->info('Se usara el archivo ' . $path);
            //Usamos la libreria Excel para abrir el csv
            Excel::load($path, function($reader) {
                //Extraemos la primera fila y obtenemos el nombre de las columnas
                //(Una o mas columnas deben contener el id de la materia donde se guardaran los datos).
                $columnsName = $reader->get()[0]->keys();
                //Buscamos en la tabla asignatura con el array.
                //Debe devolver unicamente el o los id's que existan.
                //Esto nos sirve para conocer el nombre de la columna (el id de la asignatura).
                $idAsig = Asignatura::whereIn('id', $columnsName)->get()->pluck('id');
                //Recorremos cada fila
                foreach ($reader->toArray() as $row) {
                    //Si existe, nos retorna el id, de lo contrario, lo guarda como nuevo registro y nos regresa el id
                    $idTipoMaterial = TipoMaterial::firstOrCreate(['nombre' => trim($row['tipo'])])->id;
                    $idUnidadMedida = Unidadmedida::firstOrCreate(['nombre' => trim($row['unidad_de_medida'])])->id;
                    //Recorremos los id's de las columnas para obtener el rubro de la minima y la cantidad minima,
                    //ya que este se encuentra en una sola columna y se requiere separarlos.
                    foreach ($idAsig as $id) {
                        $cantidad = 0;
                        try {
                            $explode = explode('x', $row[$id]);
                            $rubroMinima = trim($explode[1]);
                            $cantidadMinima = trim($explode[0]);
                        } catch (Exception $e) {

                        }
                        if (array_key_exists('cantidad', $row) === false) {

                            $row['cantidad'] = $rubroMinima == 'equipo' ? 35 / 5 * $cantidadMinima : $cantidadMinima;
                            //$this->command->info('no existe la columna cantidad, se reaiza el calculo manual. cantidad minima: ' . print_r($row));
                        }
                        $idMaterialRequerimiento = MaterialRequerimiento::firstOrCreate([
                            'id_asignatura' => trim($id),
                            'rubroMinima' => $rubroMinima,
                            'cantidadMinima' => $cantidadMinima,
                            'cantidad' => trim($row['cantidad']),
                            'valorTotalPorcentual' => trim($row['porcentaje'])
                        ])->id;
                    }
                    $material = 0;
                    $material = Material::firstOrNew([
                        'nombre' => trim($row['material'])
                    ],
                    [
                        'id_unidadMedida' => $idUnidadMedida,
                        'id_tipoMaterial' => $idTipoMaterial,
                        'id_materialRequerimiento' => $idMaterialRequerimiento
                    ]);
                    $material->save();
                }
            });
            $this->command->info('Se termino de guardar con exito.');
        }
    }
}

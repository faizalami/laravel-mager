<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:14
 */

namespace Faizalami\LaravelMager\Components\Generators;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class MigrationGenerator implements GeneratorInterface
{
    use GeneratorTrait {
        generate as baseGenerate;
    }

    private $doGenerate = true;

    public function __construct($config)
    {
        $this->type = 'migration';
        $this->config = $config;
        $this->outputPath = base_path('database/migrations');
    }

    public function render()
    {
        $template = 'mager::template.migration';
        $config = $this->config;
        $latest = null;
        $latestId = null;

        $histories = $this->config['history'];

        if(count($histories) == 0) {
            $this->doGenerate = false;
            return $this;
        }

        foreach ($histories as $id => $history) {
            $migration = dir(base_path('database/migrations'));
            while (false !== ($migrationFile = $migration->read())) {
                if(strpos($migrationFile, $history->time) !== false && strpos($migrationFile, $this->config['table']) !== false) {
                    $this->outputFile = $migrationFile;
                    $latest = $history;
                    $latestId = $id;
                }
            }
        }

        if($latest != null) {
            if($latestId != count($histories) - 1) {
                $template = 'mager::template.migration-update';

                $config['version'] = count($histories)-1;

                $this->outputFile = $histories[count($histories) - 1]->time . '_update_' . $this->config['table'] . '_table_' . $config['version'] . '.php';

                $old = $latest->table;
                $new = $this->config['columns'];

                $created = (array) $new;
                $deleted = (array) $old;

                foreach ($old as $column => $item) {
                    foreach ($new as $newColumn => $newValue) {
                        if($column == $newColumn) {
                            unset($created[$column]);
                            unset($deleted[$column]);
                        }
                    }
                }

                $config['columns'] = compact('created', 'deleted');

                $this->outputString = $this->renderBlade($template, $config);
            } else {
                $this->outputString = File::put(base_path('database/migrations/' . $this->outputFile));
            }
        } else {
            $this->outputFile = $histories[count($histories) - 1]->time . '_create_' . $this->config['table'] . '_table.php';
            $this->outputString = $this->renderBlade($template, $config);
        }

        return $this;
    }

    public function generate()
    {
        if($this->doGenerate) {
            $this->baseGenerate();

            Artisan::call('migrate');
        }
    }
}

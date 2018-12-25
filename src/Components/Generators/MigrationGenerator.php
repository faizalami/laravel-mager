<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:14
 */

namespace Faizalami\LaravelMager\Components\Generators;


use Illuminate\Support\Facades\Artisan;

class MigrationGenerator implements GeneratorInterface
{
    use GeneratorTrait {
        generate as baseGenerate;
    }

    public function __construct($config)
    {
        $this->type = 'migration';
        $this->config = $config;
        $this->outputPath = base_path('database/migrations');
        $this->outputFile = date('Y_m_d_His_') . 'create_' . $this->config['table'] . '_table.php';
    }

    public function render()
    {
        $template = 'mager::template.migration';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }

    public function generate()
    {
        $this->baseGenerate();

        Artisan::call('migrate');
    }
}

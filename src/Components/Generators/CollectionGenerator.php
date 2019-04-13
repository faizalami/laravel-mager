<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 13/04/19
 * Time: 14:50
 */

namespace Faizalami\LaravelMager\Components\Generators;


class CollectionGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'model';
        $this->config = $config;
        $this->outputPath = app_path('Http/Resources');
        $this->outputFile = $this->config['name'] . 'Collection.php';
    }

    public function render()
    {
        $template = 'mager::template.database.collection';

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }
}
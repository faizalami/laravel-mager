<?php


namespace Faizalami\LaravelMager\Components\Generators;

class RestConfigGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'theme';
        $this->config = $config;
        $this->outputPath = config_path('global');
        $this->outputFile = 'rest.php';
    }

    public function render()
    {
        $template = 'mager::template.config.rest';

        $rest = json_encode($this->config, JSON_PRETTY_PRINT);
        $rest = str_replace('{', '[', $rest);
        $rest = str_replace('"', '\'', $rest);
        $rest = str_replace(':', '=>', $rest);
        $rest = str_replace('}', ']', $rest);

        $this->outputString = $this->renderBlade($template, compact('rest'));

        return $this;
    }
}

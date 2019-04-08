<?php


namespace Faizalami\LaravelMager\Components\Generators;


class ModelFactoryGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'model';
        $this->config = $config;
        $this->outputPath = database_path('factories');
        $this->outputFile = $this->config['name'] . '.php';
    }

    public function render()
    {
        $template = 'mager::template.database.factory';

        foreach ($this->config['dummy'] as $key => $column) {
            $fakerString = '';
            switch ($column['type']) {
                case 'number':
                    $fakerString = '$faker->numberBetween(' . $column['option']['min'] . ', ' . $column['option']['max'] . '),';
                    break;
                case 'name':
                    switch ($column['option']['type']) {
                        case 'full-name':
                            if($column['option']['gender'] == 'both') {
                                $fakerString = '$faker->name(),';
                            } else {
                                $fakerString = '$faker->name(' . $column['option']['gender'] . '),';
                            }
                            break;
                        case 'first-name':
                            if($column['option']['gender'] == 'both') {
                                $fakerString = '$faker->firstName(),';
                            } else {
                                $fakerString = '$faker->firstName(' . $column['option']['gender'] . '),';
                            }
                            break;
                        case 'last-name':
                            $fakerString = '$faker->lastName,';
                            break;
                    }
                    break;
                case 'phone':
                    $fakerString = '$faker->phoneNumber,';
                    break;
                case 'address':
                    if(in_array($column['option']['type'], ['latitude', 'longitude'])) {
                        $fakerString = '$faker->' . $column['option']['type'] . '(),';
                    } else {
                        $fakerString = '$faker->' . $column['option']['type'] . ',';
                    }
                    break;
                case 'email':
                    $fakerString = '$faker->safeEmail,';
                    break;
                case 'domain':
                    $fakerString = '$faker->domainName,';
                    break;
                case 'jobTitle':
                    $fakerString = '$faker->jobTitle,';
                    break;
                case 'sentence':
                    $fakerString = '$faker->sentence(' . $column['option']['amount'] . '),';
                    break;
            }

            $this->config['dummy'][$key]['faker'] = $fakerString;
         }

        $this->outputString = $this->renderBlade($template, $this->config);

        return $this;
    }

}
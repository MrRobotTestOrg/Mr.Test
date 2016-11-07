<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\StoreModuloRequest as StoreRequest;
use App\Http\Requests\UpdateModuloRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest;
use Behat\Mink\Exception\Exception;

class ModuloController extends CrudController
{
    public function __construct() {
        parent::__construct();

        $this->crud->setModel("App\Modulo");
        $this->crud->setRoute("admin/modulo");
        $this->crud->setEntityNameStrings('modulo', 'modulos');

        $this->crud->setColumns(['nome','caminho_base']);
        $this->crud->setColumnDetails('caminho_base', [
            'label' => 'Caminho Base da aplicação a ser testada'
        ]);
        $this->crud->addField([
            'name' => 'nome',
        ]);
        $this->crud->addField([
            'name' => 'caminho_base',
            'label' => 'Caminho Base da aplicação a ser testada',
            'type' => 'text'
        ]);
    }

    public function store(CrudRequest $request)
    {
         mkdir(base_path("behat/{$request->get('nome')}", 0755));
         mkdir(base_path("behat/{$request->get('nome')}/bootstrap", 0755));
         mkdir(base_path("behat/{$request->get('nome')}/features", 0755));
        mkdir(base_path("behat/{$request->get('nome')}/features/erros", 0755));
         mkdir(base_path("behat/{$request->get('nome')}/resultados", 0755));

         touch(base_path("behat/{$request->get('nome')}/bootstrap/FeatureContext.php"));

        $modulo = '$this->nomeModulo';
        $nomeModulo = $request->get('nome');
        $fileData = "<?php

use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use app\BaseContext;
class FeatureContext extends BaseContext
{
    public function __construct()
    {
        $modulo = '$nomeModulo';
    }


}
";
        file_put_contents(base_path("behat/{$request->get('nome')}/bootstrap/FeatureContext.php"),$fileData);


        $behatValue = "phantom:
    extensions:
        Tonic\Behat\ParallelScenarioExtension: ~
        emuse\BehatHTMLFormatter\BehatHTMLFormatterExtension:
            name: html
            renderer: Twig,Behat2
            file_name: index
        Behat\MinkExtension:
            base_url: {$request->get('caminho_base')}
            selenium2:
                    wd_host: \"http://localhost:8643/wd/hub\"
    translation:
        locale: pt
    formatters:
            pretty: true
            html:
                  output_path: %paths.base%/resultados
    autoload:
            - %paths.base%/bootstrap/
selenium:
    extensions:
        Tonic\Behat\ParallelScenarioExtension: ~
        emuse\BehatHTMLFormatter\BehatHTMLFormatterExtension:
            name: html
            renderer: Twig,Behat2
            file_name: index
        Behat\MinkExtension:
            base_url: {$request->get('caminho_base')}
            javascript_session: selenium2
            browser_name: firefox
            selenium2:
                browser: \"firefox\"
                capabilities: { \"browser\": \"firefox\"}
    translation:
        locale: pt
    formatters:
            pretty: true
            html:
                  output_path: %paths.base%/resultados
    autoload:
            - %paths.base%/bootstrap/";
        touch(base_path("behat/{$request->get('nome')}/behat.yaml"));

        file_put_contents(base_path("behat/{$request->get('nome')}/behat.yaml"),$behatValue);

        return parent::storeCrud();
    }

    public function update(CrudRequest $request)
    {
        return parent::updateCrud();
    }
}

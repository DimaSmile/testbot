<?php
namespace App\Http\Controllers\Backend;
require_once(__DIR__ . '../../../../../vendor/springimport/swagger-magento2-client/autoload.php');
// require_once(__DIR__ . '/vendor/autoload.php');

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use springimport\magento2\apiv1\Configuration,
//     springimport\magento2\apiv1\ApiFactory;
use SpringImport\Swagger\Magento2\Client\ApiClient,
    SpringImport\Swagger\Magento2\Client\Configuration;
class DashboardController extends Controller
{
    function index(){

        // $configuration = new Configuration;
        // $configuration->setBaseUri('http://maga2.loc/');
        // $configuration->setConsumerKey('f0kjk008h8sph150bx01qq6s6trpqul2');
        // $configuration->setConsumerSecret('2qafh9r865tavgx82wsq8o45i0cb00qr');
        // $configuration->setToken('1k4df60jqlt1sil3dujys4wwn6vwxvf3');
        // $configuration->setTokenSecret('70mv5vo3oqiprh1c68qkvowsk2icic9s');

        // $api = new ApiFactory($configuration);
        // $client = $api->getApiClient();
        // // $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        // var_dump($client->getConfiguration());
        // return view('backend.index');
        
        
        $configuration = new Configuration;
        $configuration->setHost('http://maga2.loc/rest');
        // $configuration->setConsumerKey('f0kjk008h8sph150bx01qq6s6trpqul2');
        // $configuration->setConsumerSecret('2qafh9r865tavgx82wsq8o45i0cb00qr');
        $configuration->setUsername('test123');
        $configuration->setPassword('test123');
        $configuration->setAccessToken('1k4df60jqlt1sil3dujys4wwn6vwxvf3');

        $configuration->addDefaultHeader('Content-Type', 'application/json');
        $configuration->addDefaultHeader('Authorization', 'Bearer 5ljkcfhalf7320m3y3ehubrhxtekfcdb');
        $api = new ApiClient($configuration);
        // dd($api->callApi('rest/V1/integration/admin/token', 'POST', [], []));
        // $configuration->setAccessToken('1k4df60jqlt1sil3dujys4wwn6vwxvf3');
        // $configuration->setTokenSecret('70mv5vo3oqiprh1c68qkvowsk2icic9s');
        $api_instance = new \SpringImport\Swagger\Magento2\Client\Api\CatalogProductRepositoryV1Api($api);
        echo '<pre>';
        // var_dump($api_instance->getApiClient());exit;
        try {
            $result = $api_instance->catalogProductRepositoryV1GetGet('test');
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling BackendModuleServiceV1Api->backendModuleServiceV1GetModulesGet: ', $e->getMessage(), PHP_EOL;
        }
    }
}

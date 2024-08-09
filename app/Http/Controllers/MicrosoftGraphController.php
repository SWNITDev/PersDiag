<?php

namespace App\Http\Controllers;

use App\Services\MicrosoftGraphService;
use Microsoft\Graph\Model;
use Microsoft\Graph\Core\Authentication\GraphPhpLeagueAuthenticationProvider;
use Microsoft\Kiota\Abstractions\ApiException;
use Microsoft\Kiota\Authentication\Oauth\ClientCredentialContext;
use Microsoft\Graph\GraphServiceClient;
use Microsoft\Graph\Http\GraphRequest;
use Microsoft\Graph\Core\GraphConstants;
use Microsoft\Graph\Core\GraphConfig;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Authentication\TokenStore\TokenCacheInterface;
use Microsoft\Graph\Authentication\Provider\Bearer;
use Microsoft\Graph\Authentication\Provider\JWT;
use Microsoft\Graph\GraphException;
use Microsoft\Graph\Http\GraphResponse;
use Microsoft\Graph\Http\GraphRequestOptions;
use Microsoft\Graph\Authentication\Provider\MultiTenantAuthProvider;
use Microsoft\Graph\Core\Tasks\PageIterator;
use DateTimeInterface;
//NEW2
use Illuminate\Support\Facades\Session;


class MicrosoftGraphController extends Controller
{
    protected $graphService;

    
    public function __construct()
    {
        $clientId = env('MICROSOFT_GRAPH_CLIENT_ID');
        $clientSecret = env('MICROSOFT_GRAPH_CLIENT_SECRET');
        $tenantId = env('MICROSOFT_GRAPH_TENANT_ID');
        $clientCredentialProvider = new ClientCredentialContext($tenantId, $clientId, $clientSecret);

        $this->graphService = new GraphServiceClient($clientCredentialProvider);
    }

    public function showManager()
    {
        // Sicherstellen, dass die Session gestartet ist
        if (!Session::isStarted()) {
            Session::start();
        }

        // Debugging: Überprüfen, ob die Session-Daten vorhanden sind
        \Log::info('Session Data: ', Session::all());

        // Zugriff auf die Session-Daten direkt über die Session-Facade
        $userId = Session::get('user.userId');
        $user = Session::get('user');

        // Debugging: Überprüfen, ob die userId vorhanden ist
        \Log::info('User ID in session: ', ['userId' => $userId]);

        // Prüfen, ob userId gesetzt ist
        if (!$userId) {
            return response()->json(['error' => 'User ID not found in session'], 404);
        }

        $manager = $this->graphService->users()->byUserId($userId)->manager()->get()->wait();

        if ($manager) {
            // Manager-Daten in die Session speichern
            Session::put('manager', [
                'managerName' => $manager->getDisplayName(),
                'managerMail' => $manager->getMail(),
            ]);

            return response()->json([
                'userName' => Session::get('user.userName'),
                //'userMail' => Session::get('user.userMail'),
                'managerName' => $manager->getDisplayName(),
                'managerMail' => $manager->getMail(),
            ]);
        } else {
            return response()->json(['error' => 'Manager not found'], 404);
        }
    }


    public function showReportees($userId)
    {
        if (!Session::isStarted()) {
            Session::start();
        }
        


        $result = $this->graphService->users()->byUserId($userId)->directReports()->get()->wait();
        
        $items = [];
        
        $pageIterator = new PageIterator($result, $this->graphService->getRequestAdapter());
        
        if ($result){
            $pageIterator->setHeaders(['Content-Type' => 'application/json']);
            $pageIterator->iterate(function ($result) use (&$items) {
                //NEWNEWNEW
                //Hier kann der Rückgabewert für alle Mitarbeitenden unter einem Manager angepasst werden. Siehe: https://learn.microsoft.com/de-de/graph/api/user-list-directreports?view=graph-rest-1.0&tabs=http
                //NEWNEWNEW
                $items []= $result->getMail().PHP_EOL;
                return true;
            });

            //NEW2
            Session::put('reportees', $items);
            //NEW2

            return $items;
        } else {
            return response()->json(['error' => 'Reporter not found'], 404);
        }
    }
}
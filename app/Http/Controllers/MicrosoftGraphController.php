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

    public function showManager($userId)
    {
        $manager = $this->graphService->users()->byUserId($userId)->manager()->get()->wait();

        if ($manager) {
            return response()->json([
            'manager' => $manager->getDisplayName(),
            'email' => $manager->getMail(),
            ]);
        } else {
            return response()->json(['error' => 'Manager not found'], 404);
        }
    }

    public function showReportees($userId)
    {
        $result = $this->graphService->users()->byUserId($userId)->directReports()->get()->wait();
        
        $items = [];
        
        $pageIterator = new PageIterator($result, $this->graphService->getRequestAdapter());
        
        if ($result){
            $pageIterator->setHeaders(['Content-Type' => 'application/json']);
            $pageIterator->iterate(function ($result) use (&$items) {
                $items []= $result->getMail().PHP_EOL;
                return true;
            });
            return $items;
        } else {
            return response()->json(['error' => 'Reporter not found'], 404);
        }
    }
}
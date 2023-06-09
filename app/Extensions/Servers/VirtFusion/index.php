<?php

use App\Helpers\ExtensionHelper;
use Illuminate\Support\Facades\Http;

function VirtFusion_getConfig()
{
    return [
        [
            'name' => 'host',
            'type' => 'text',
            'friendlyName' => 'Hostname',
            'required' => true,
        ],
        [
            'name' => 'apikey',
            'type' => 'text',
            'friendlyName' => 'API key',
            'required' => true,
        ],
    ];
}

function VirtFusion_getProductConfig()
{
    return [
        [
            'name' => 'package',
            'type' => 'text',
            'friendlyName' => 'Package ID',
            'required' => true,
        ],
        [
            'name' => 'hypervisor',
            'type' => 'text',
            'friendlyName' => 'Hypervisor ID',
            'required' => true,
        ],
        [
            'name' => 'ips',
            'type' => 'text',
            'friendlyName' => 'Number IPs',
            'required' => true,
        ],
    ];
}

function VirtFusion_createServer($user, $params, $order)
{
    $apikey = ExtensionHelper::getConfig('VirtFusion', 'apikey');
    $host = ExtensionHelper::getConfig('VirtFusion', 'host');
    $package = $params['package'];

    $user = VirtFusion_getUser($user);
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apikey,
        'Accept' => 'Application/json',
        'Content-Type' => 'application/json',
    ])->post(
        $host . '/api/v1/servers',
        [
            'packageId' => $package,
            'userId' => $user,
            'hypervisorId' => $params['hypervisor'],
            'ipv4' => $params['ips'],
        ]
    );
    ExtensionHelper::setOrderProductConfig('server_id', $response->json()['data']['id'], $params['config_id']);

    return true;
}

function VirtFusion_getUser($user)
{
    $apikey = ExtensionHelper::getConfig('VirtFusion', 'apikey');
    $host = ExtensionHelper::getConfig('VirtFusion', 'host');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apikey,
        'Accept' => 'Application/json',
        'Content-Type' => 'application/json',
    ])->get(
        $host . '/api/v1/users/' . $user->id . '/byExtRelation'
    );
    if (isset($response->json()['data'])) {
        return $response->json()['data']['id'];
    } else {
        // Create user
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apikey,
            'Accept' => 'Application/json',
            'Content-Type' => 'application/json',
        ])->post(
            $host . '/api/v1/users',
            [
                'name' => $user->name,
                'email' => $user->email,
                'extRelationId' => $user->id,
            ]
        );
        if ($response->status() == 200) {
            return $response->json()['data']['id'];
        } else {
            error_log('Failed to create user | VirtFusion');

            return;
        }
    }
}

function VirtFusion_suspendServer($user, $params, $order)
{
    $apikey = ExtensionHelper::getConfig('VirtFusion', 'apikey');
    $host = ExtensionHelper::getConfig('VirtFusion', 'host');
    $server = $params['config']['server_id'];

    $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apikey,
            'Accept' => 'Application/json',
            'Content-Type' => 'application/json',
        ])->post(
            $host . '/api/v1/servers/' . $server . '/suspend'
        );
    if ($response->status() == 204) {
        return true;
    } else {
        error_log('Failed to suspend server | VirtFusion');

        return;
    }

    return true;
}

function VirtFusion_unsuspendServer($user, $params, $order)
{
    $apikey = ExtensionHelper::getConfig('VirtFusion', 'apikey');
    $host = ExtensionHelper::getConfig('VirtFusion', 'host');
    $server = $params['config']['server_id'];

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apikey,
        'Accept' => 'Application/json',
        'Content-Type' => 'application/json',
    ])->post(
        $host . '/api/v1/servers/' . $server . '/unsuspend'
    );
    if ($response->status() == 204) {
        return true;
    } else {
        error_log('Failed to unsuspend server | VirtFusion');

        return;
    }

    return true;
}

function VirtFusion_terminateServer($user, $params, $order)
{
    $apikey = ExtensionHelper::getConfig('VirtFusion', 'apikey');
    $host = ExtensionHelper::getConfig('VirtFusion', 'host');
    $server = $params['config']['server_id'];

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apikey,
        'Accept' => 'Application/json',
        'Content-Type' => 'application/json',
    ])->delete(
        $host . '/api/v1/servers/' . $server . '?delay=5'
    );
    if ($response->status() == 204) {
        return true;
    } else {
        error_log('Failed to terminate server | VirtFusion');

        return;
    }
    
    return true;
}
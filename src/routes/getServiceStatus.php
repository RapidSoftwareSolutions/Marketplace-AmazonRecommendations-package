<?php

$app->post('/api/AmazonRecommendations/getServiceStatus', function ($request, $response, $args) {
    
    $settings =  $this->settings;
    
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','apiSecret','appName','appVersion','region','merchantId']);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    
    $serviceUrl = $settings['endpoints'][$post_data['args']['region']];
    
    $config = array(
    'ServiceURL' => $serviceUrl,
    'ProxyHost' => null,
    'ProxyPort' => -1,
    'ProxyUsername' => null,
    'ProxyPassword' => null,
    'MaxErrorRetry' => 3,
    );
    $service = new MWSRecommendationsSectionService_Client(
        $post_data['args']['apiKey'],
        $post_data['args']['apiSecret'],
        $post_data['args']['appName'],
        $post_data['args']['appVersion'],
        $config
    );
    
    
    try {
        $xml = simplexml_load_string($service->GetServiceStatus($req)->toXML());
        $json = json_encode($xml);
        $res = json_decode($json,TRUE);
        
        $result['callback'] = 'success';
        $result['contextWrites']['to'] = is_array($res) ? $res : json_decode($res);
        if(empty($result['contextWrites']['to'])) {
            $result['contextWrites']['to']['status_msg'] = "Api return no results";
        }

    } catch (\MWSRecommendationsSectionService_Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    } catch (\Exception $e) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $e->getMessage();
    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    
});

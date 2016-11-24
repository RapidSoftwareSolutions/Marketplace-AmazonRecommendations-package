<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class AmazonRecommendationsTest extends BaseTestCase {
    
    public function testGetLastUpdatedTimeForRecommendations() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "marketplaceId":"",
                        "merchantId":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonRecommendations/getLastUpdatedTimeForRecommendations', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testListRecommendations() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "marketplaceId":"",
                        "merchantId":"",
                        "recommendationCategory":"",
                        "categoryQueryList":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonRecommendations/listRecommendations', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testListRecommendationsByNextToken() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "merchantId":"",
                        "nextToken":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonRecommendations/listRecommendationsByNextToken', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetServiceStatus() {
        
        $var = '{  
                    "args":{  
                        "apiKey":"",
                        "apiSecret":"",
                        "appName":"",
                        "appVersion":"",
                        "region":"",
                        "merchantId":""
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/AmazonRecommendations/getServiceStatus', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
}

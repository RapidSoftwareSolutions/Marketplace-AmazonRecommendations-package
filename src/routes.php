<?php
$routes = [
    'getLastUpdatedTimeForRecommendations',
    'listRecommendations',
    'listRecommendationsByNextToken',
    'getServiceStatus',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}


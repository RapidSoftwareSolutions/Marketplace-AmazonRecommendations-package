# AmazonRecommendations Package
The Recommendations API section of Amazon MWS enables you to programmatically retrieve Amazon Selling Coach recommendations by recommendation category. A recommendation is an actionable, timely, and personalized opportunity to increase your sales and performance.
* Domain: amazon.com
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Item one 
1. Item two


## AmazonRecommendations.getLastUpdatedTimeForRecommendations
The GetLastUpdatedTimeForRecommendations operation enables you to check whether there are active recommendations for you in a given recommendation category, and if there are, to check when the recommendations for that category were last updated.

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Required: API key obtained from Amazon.
| apiSecret    | credentials| Required: API secret  obtained from Amazon.
| appName      | String     | Required: The Application name.
| appVersion   | String     | Required: The version of the application.
| region       | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan)
| marketplaceId| String     | Required: The marketplace identifier for the marketplace from which you want to retrieve recommendations.
| merchantId   | String     | Required: The merchant ID.


## AmazonRecommendations.listRecommendations
The ListRecommendations operation returns the most recent recommendations for you in a given category or for all categories.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| Required: API key obtained from Amazon.
| apiSecret             | credentials| Required: API secret  obtained from Amazon.
| appName               | String     | Required: The Application name.
| appVersion            | String     | Required: The version of the application.
| region                | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan)
| marketplaceId         | String     | Required: The marketplace identifier for the marketplace from which you want to retrieve recommendations.
| merchantId            | String     | Required: The merchant ID.
| recommendationCategory| String     | Optional: Specifies a category for the recommendations to retrieve. To retrieve all recommendations, do not specify a value for this parameter.
| categoryQueryList     | JSON       | Optional: Array of objects. A list of category-specific filters that you can specify to narrow down the types of recommendations returned for each category.  See the appropriate section below.

#### categoryQueryList format
```json
{  
    "CategoryQuery":[  
        {  
            "FilterOptions":{  
                "FilterOption":[  
                    "BrandName=DEWALT",
                    "ProductCategory=Home Improvement",
                    "IncludeCommonRecommendations=true"
                ]
            },
            "RecommendationCategory":"Selection"
        }
    ]
}
```

## AmazonRecommendations.listRecommendationsByNextToken
The ListRecommendationsByNextToken operation returns the next page of recommendations using the NextToken value that was returned by your previous request to either ListRecommendations or ListRecommendationsByNextToken. If NextToken is not returned, there are no more pages to return.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Required: API key obtained from Amazon.
| apiSecret | credentials| Required: API secret  obtained from Amazon.
| appName   | String     | Required: The Application name.
| appVersion| String     | Required: The version of the application.
| region    | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan)
| merchantId| String     | Required: The merchant ID.
| nextToken | String     | Required: A string token returned in the response of your previous request to either ListRecommendations or ListRecommendationsByNextToken.


## AmazonRecommendations.getServiceStatus
The GetServiceStatus operation returns the operational status of the Recommendations API section of Amazon Marketplace Web Service (Amazon MWS). Status values are GREEN, YELLOW, and RED.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Required: API key obtained from Amazon.
| apiSecret | credentials| Required: API secret  obtained from Amazon.
| appName   | String     | Required: The Application name.
| appVersion| String     | Required: The version of the application.
| region    | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan)
| merchantId| String     | Required: The merchant ID.


### categoryQueryList fields

| Name | Description | Required | Valid values |
| --- | --- | --- | --- |
| RecommendationCategory | Specifies a category for the recommendations to retrieve. Type: string | Yes | RecommendationCategory values:

*Selection*, *Fulfillment*, *ListingQuality*, *GlobalSelling*, *Advertising*. Note: If you specify a RecommendationCategory value here that was not specified in the RecommendationCategory request parameter to the ListRecommendations operation, then this value is ignored. |
| FilterOptions | Specifies the filters to apply to narrow down the recommendations to return for the given recommendation category.

Filters are specified as a list of FilterName=FilterValue pairs. | Yes | FilterOptions values for *ListingQuality* recommendations:

- QualitySet=Defect Filter for listings that have a defect, but the listing is still valid. For example, this query will return listings where there is no detailed description.
- QualitySet=Quarantine Filter for listings that are being suppressed from the catalog because they do not meet Amazon's standards. For example, this query will return listings where there is no main image.
- ListingStatus=Active Filter for active inventory items only. Returns items within inventory that are set to active status.
- ListingStatus=Inactive Filter for inactive inventory items only. Returns items within inventory that are set to inactive status.

FilterOptions values for *Selection*, *Fulfillment*, *GlobalSelling*, and *Advertising* recommendations:

- BrandName=<BrandName> - Filter for recommendations that apply to the specified brand name.
- ProductCategory=<ProductCategory> - Filter for recommendations that apply to the specified product category.

FilterOptions values for *Selection* recommendations:

- IncludeCommonRecommendations=true - Include Selection recommendations common to all sellers in addition to seller-specific recommendations.
- ncludeCommonRecommendations=false - Do not include Selection recommendations common to all sellers. Only include seller-specific recommendations. |
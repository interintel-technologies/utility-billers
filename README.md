**API Specification**  **Utility Billers**  **API OAUTH 2.0 v1**

| API Name | Utility Billers API using OAUTH 2.0 |
| --- | --- |
| Description | Utility Billers API using OAUTH 2.0 |
| Version | v1 |
| Owner | Implementation Team |
| Contact | Implementation Team |
| Links | TBC |
| Supported Formats | JSON |

Base URL

Production:[https://interintel.co/api/v1/{{service}}](https://interintel.co/api/v1/%7B%7Bservice%7D%7D)

**Authentication**

OAUTH 2.0 has been implemented for this API hence the developer needs to get the OAUTH 2.0 login details (client\_id, username and authorization\_grant\_type) from the InterIntel portal under Developer-\>Settings section. You will also need to use your existing password

**Rate Limiting**

N/A

**Endpoints**

1. Get Access Token and Refresh token

Description: This request returns the access\_token and refresh\_token. Which lasts for 36000s (10 hours)

HTTP Method: POST

URL: /token

Example Request Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |
|
 |
 |
 |
|
 |
 |
 |

Request Parameters

| ID | Name | Type | Description | Required |
| --- | --- | --- | --- | --- |
| 1 | client\_id | String | OAUTH 2.0 details obtained from Developer-\>Settings section | Yes |
| 2 | username | String | Your username | Yes |
| 3 | password | String | Existing password | Yes |
| 4 | grant\_type | String | OAUTH 2.0 details Obtained from Developer-\>Settings section | Yes |

Sample Request Body:

{

"client\_id" : "xxxxxxxx",

"username" : "company1",

"password" : "sdfsdnfjksdf",

"grant\_type" : "password"

}

Response Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |

Response Parameters

| ID | Name | Type | Description |
| --- | --- | --- | --- |
| 1 | access\_token | String | access token to be used to as Bearer token |
| 2 | expires\_in | number | validity period in seconds |
| 3 | token\_type | String | Authentication method that uses access\_token in our case the value for this will be Bearer |
| 4 | scope | String | scope of the token |
| 5 | refresh\_token | String | Used to generate an access\_token |

Sample Response Body

{

"access\_token" : "access token value",

"expires\_in" : 36000,

"token\_type" : "Bearer",

"scope" : "read write groups",

"refresh\_token": "refresh token value"

}

Error Responses

TBC

1. Get Refresh token

Description: This request returns the refresh\_token, which lasts for 36000s (10 hours) whenever the access token expires

HTTP Method: POST

URL: /token

Example Request Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |
|
 |
 |
 |
|
 |
 |
 |

Request Parameters

| ID | Name | Type | Description | Required |
| --- | --- | --- | --- | --- |
| 1 | client\_id | String | OAUTH 2.0 details obtained from Developer-\>Settings section | Yes |
| 2 | username | String | Your username | Yes |
| 3 | password | String | Existing password | Yes |
| 4 | grant\_type | String | refresh\_token | Yes |

Sample Request Body:

{

"client\_id" : "harhfurhaeufhrehfuherf===",

"username" : "company1",

"password" : "sdfsdnfjksdf",

"grant\_type" : "refresh\_token"

}

Response Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |

Response Parameters

| ID | Name | Type | Description |
| --- | --- | --- | --- |
| 1 | access\_token | String | access token to be used to as Bearer token |
| 2 | expires\_in | number | validity period in seconds |
| 3 | token\_type | String | Authentication method that uses access\_token in our case the value for this will be Bearer |
| 4 | scope | String | scope of the token |
| 5 | refresh\_token | String | Used to generate an access\_token |

Sample Response Body

{

"access\_token" : "access token value",

"expires\_in" : 36000,

"token\_type" : "Bearer",

"scope" : "read write groups",

"refresh\_token": "refresh token value"

}

Error Responses

TBC

1. Bill Payment

Description: This request will send a Bill payment request

HTTP Method: POST

URL: /bill\_payment/

Example Request Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |
| 2 | Authorization | Bearer \<access\_token\> |
|
 |
 |
 |

Request Parameters

| ID | Name | Type | Description | Required |
| --- | --- | --- | --- | --- |
| 1 | gateway\_host | String | Defines the gateway host | Yes |
| 2 | credentials | Array | Array of username and password | Yes |
| 3 | account\_number | String | Unique Account No | Yes |
| 4 | amount | String | Amount to be paid | Yes |
| 5 | product\_item\_id | String | Product Item ID, this provided | Yes |
| 6 | ext\_outbound\_id | String | Transaction ID | No |
| 7 | scheduled\_send | Date Time | d/m/Y H:M (am/pm) | No |

Response Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |

Response Parameters

| ID | Name | Type | Description |
| --- | --- | --- | --- |
| 1 | response\_status | String | Status code, 00 indicates success |
| 2 | response | String | Message accompanying the status |

Error Responses

TBC

1. Bill Status

Description: This request will query the bill status.

HTTP Method: POST

URL: /bill\_status/

Example Request Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |
| 2 | Authorization | Bearer \<access\_token\> |
|
 |
 |
 |

Request Parameters

| ID | Name | Type | Description | Required |
| --- | --- | --- | --- | --- |
| 1 | gateway\_host | String | Defines the gateway host | Yes |
| 2 | credentials | Array | Array of username and password | Yes |
| 3 | account\_number | String | Unique Account No | Yes |
| 4 | amount | String | Amount to be paid | Yes |
| 5 | product\_item\_id | String | Product Item ID, this provided | Yes |
| 6 | ext\_outbound\_id | String | Transaction ID | No |
| 7 | scheduled\_send | Date Time | d/m/Y H:M (am/pm) | No |

Response Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |

Response Parameters

| ID | Name | Type | Description |
| --- | --- | --- | --- |
| 1 | response\_status | String | Status code, 00 indicates success |
| 2 | response | String | Message accompanying the status |

Error Responses

TBC

1. Bill Query

Description: This request query a bill payment.

HTTP Method: POST

URL: /bill\_query/

Example Request Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |
| 2 | Authorization | Bearer \<access\_token\> |
|
 |
 |
 |

Request Parameters

| ID | Name | Type | Description | Required |
| --- | --- | --- | --- | --- |
| 1 | gateway\_host | String | Defines the gateway host | Yes |
| 2 | credentials | Array | Array of username and password | Yes |
| 3 | account\_number | String | Unique Account No | Yes |
| 4 | amount | String | Amount to be paid | Yes |
| 5 | product\_item\_id | String | Product Item ID, this provided | Yes |
| 6 | ext\_outbound\_id | String | Transaction ID | No |
| 7 | scheduled\_send | Date Time | d/m/Y H:M (am/pm) | No |

Response Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |

Response Parameters

| ID | Name | Type | Description |
| --- | --- | --- | --- |
| 1 | response\_status | String | Status code, 00 indicates success |
| 2 | response | String | Message accompanying the status |

Error Responses

TBC

1. Biller Float

Description: This request will query biller float

HTTP Method: POST

URL: /biller-float/

Example Request Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |
| 2 | Authorization | Bearer \<access\_token\> |
|
 |
 |
 |

Request Parameters

| ID | Name | Type | Description | Required |
| --- | --- | --- | --- | --- |
| 1 | gateway\_host | String | Defines the gateway host | Yes |
| 2 | credentials | Array | Array of username and password | Yes |
| 3 | account\_number | String | Unique Account No | Yes |
| 4 | amount | String | Amount to be paid | Yes |
| 5 | product\_item\_id | String | Product Item ID, this provided | Yes |
| 6 | ext\_outbound\_id | String | Transaction ID | No |
| 7 | scheduled\_send | Date Time | d/m/Y H:M (am/pm) | No |

Response Headers

| ID | Name | Value |
| --- | --- | --- |
| 1 | Content-Type | application/json |

Response Parameters

| ID | Name | Type | Description |
| --- | --- | --- | --- |
| 1 | response\_status | String | Status code, 00 indicates success |
| 2 | response | String | Message accompanying the status |

Error Responses

TBC

Changelog

N/A

Version 1.0 (7th Dec 2022)

Added: Utility Billers using OAUTH 2.0

Deprecated: N/A

Conventions

N/A

Dependencies

1. Institution has to be created on the backend
2. Float top up to account
3. Issuing of product item ids

Known Issues

N/A

18

  ----------------------------------- -----------------------------------
  API Name                            Utility Billers API using OAUTH 2.0

  Description                         Utility Billers API using OAUTH 2.0

  Version                             v1

  Owner                               Implementation Team

  Contact                             Implementation Team

  Links                               TBC

  Supported Formats                   JSON
  ----------------------------------- -----------------------------------

Base URL

Production:
[https://interintel.co/api/{{service}}](https://interintel.co/api/%7b%7bservice%7d%7d)

**Authentication**

OAUTH 2.0 has been implemented for this API hence the developer needs to
get the OAUTH 2.0 login details (client_id, username and
authorization_grant_type) from the Nenasasa portal under
Developer-\>Settings section. You will also need to use your existing
password

**Rate Limiting**

N/A

**Endpoints**

1.  Get Access Token and Refresh token

Description: This request returns the access_token and refresh_token.
Which lasts for 36000s (10 hours)

HTTP Method: POST

URL: /token

Example Request Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json

                                             

                                             
  --------- -------------------------------- -----------------------------

Request Parameters

  ---- --------------- ------------- ----------------------- --------------
  ID   Name            Type          Description             Required

  1    client_id       String        OAUTH 2.0 details       Yes
                                     obtained from           
                                     Developer-\>Settings    
                                     section                 

  2    username        String        Your username           Yes

  3    password        String        Existing password       Yes

  4    grant_type      String        OAUTH 2.0 details       Yes
                                     Obtained from           
                                     Developer-\>Settings    
                                     section                 
  ---- --------------- ------------- ----------------------- --------------

Sample Request Body:

{

> \"client_id\" : \"harhfurhaeufhrehfuherf===\",
>
> \"username\" : \"company1\",
>
> \"password\" : \"sdfsdnfjksdf\",
>
> \"grant_type\" : \"password\"

}

Response Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json
  --------- -------------------------------- -----------------------------

Response Parameters

  ----- ------------------- ---------------- -----------------------------
  ID    Name                Type             Description

  1     access_token        String           access token to be used to as
                                             Bearer token

  2     expires_in          number           validity period in seconds

  3     token_type          String           Authentication method that
                                             uses access_token in our case
                                             the value for this will be
                                             Bearer

  4     scope               String           scope of the token

  5     refresh_token       String           Used to generate an
                                             access_token
  ----- ------------------- ---------------- -----------------------------

Sample Response Body

{

> \"access_token\" : \"access token value\",
>
> \"expires_in\" : 36000,
>
> \"token_type\" : \"Bearer\",
>
> \"scope\" : \"read write groups\",
>
> \"refresh_token\": \"refresh token value\"

}

Error Responses

TBC

2.  Get Refresh token

Description: This request returns the refresh_token, which lasts for
36000s (10 hours) whenever the access token expires

HTTP Method: POST

URL: /token

Example Request Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json

                                             

                                             
  --------- -------------------------------- -----------------------------

Request Parameters

  ---- --------------- ------------- ----------------------- --------------
  ID   Name            Type          Description             Required

  1    client_id       String        OAUTH 2.0 details       Yes
                                     obtained from           
                                     Developer-\>Settings    
                                     section                 

  2    username        String        Your username           Yes

  3    password        String        Existing password       Yes

  4    grant_type      String        refresh_token           Yes
  ---- --------------- ------------- ----------------------- --------------

Sample Request Body:

{

> \"client_id\" : \"harhfurhaeufhrehfuherf===\",
>
> \"username\" : \"company1\",
>
> \"password\" : \"sdfsdnfjksdf\",
>
> \"grant_type\" : \"refresh_token\"

}

Response Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json
  --------- -------------------------------- -----------------------------

Response Parameters

  ----- ------------------- ---------------- -----------------------------
  ID    Name                Type             Description

  1     access_token        String           access token to be used to as
                                             Bearer token

  2     expires_in          number           validity period in seconds

  3     token_type          String           Authentication method that
                                             uses access_token in our case
                                             the value for this will be
                                             Bearer

  4     scope               String           scope of the token

  5     refresh_token       String           Used to generate an
                                             access_token
  ----- ------------------- ---------------- -----------------------------

Sample Response Body

{

> \"access_token\" : \"access token value\",
>
> \"expires_in\" : 36000,
>
> \"token_type\" : \"Bearer\",
>
> \"scope\" : \"read write groups\",
>
> \"refresh_token\": \"refresh token value\"

}

Error Responses

TBC

3.  Bill Payment

Description: This request will send a Bill payment request

HTTP Method: POST

URL: /bill_payment/

Example Request Headers

  ------ ------------------------ ---------------------------------------
  ID     Name                     Value

  1      Content-Type             application/json

  2      Authorization            Bearer \<access_token\>

                                  
  ------ ------------------------ ---------------------------------------

Request Parameters

  ---- ----------------- ------------- ----------------------- --------------
  ID   Name              Type          Description             Required

  1    gateway_host      String        Defines the gateway     Yes
                                       host                    

  2    credentials       Array         Array of username and   Yes
                                       password                

  3    account_number    String        Unique Account No       Yes

  4    amount            String        Amount to be paid       Yes

  5    product_item_id   String        Product Item ID, this   Yes
                                       provided                

  6    ext_outbound_id   String        Transaction ID          No

  7    scheduled_send    Date Time     d/m/Y H:M (am/pm)       No
  ---- ----------------- ------------- ----------------------- --------------

Response Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json
  --------- -------------------------------- -----------------------------

Response Parameters

  ----- ------------------- ---------------- -----------------------------
  ID    Name                Type             Description

  1     response_status     String           Status code, 00 indicates
                                             success

  2     response            String           Message accompanying the
                                             status
  ----- ------------------- ---------------- -----------------------------

Error Responses

TBC

4.  Bill Status

Description: This request will query the bill status.

HTTP Method: POST

URL: /bill_status/

Example Request Headers

  ------ ------------------------ ---------------------------------------
  ID     Name                     Value

  1      Content-Type             application/json

  2      Authorization            Bearer \<access_token\>

                                  
  ------ ------------------------ ---------------------------------------

Request Parameters

  ---- ----------------- ------------- ----------------------- --------------
  ID   Name              Type          Description             Required

  1    gateway_host      String        Defines the gateway     Yes
                                       host                    

  2    credentials       Array         Array of username and   Yes
                                       password                

  3    account_number    String        Unique Account No       Yes

  4    amount            String        Amount to be paid       Yes

  5    product_item_id   String        Product Item ID, this   Yes
                                       provided                

  6    ext_outbound_id   String        Transaction ID          No

  7    scheduled_send    Date Time     d/m/Y H:M (am/pm)       No
  ---- ----------------- ------------- ----------------------- --------------

Response Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json
  --------- -------------------------------- -----------------------------

Response Parameters

  ----- ------------------- ---------------- -----------------------------
  ID    Name                Type             Description

  1     response_status     String           Status code, 00 indicates
                                             success

  2     response            String           Message accompanying the
                                             status
  ----- ------------------- ---------------- -----------------------------

Error Responses

TBC

5.  Bill Query

Description: This request query a bill payment.

HTTP Method: POST

URL: /bill_query/

Example Request Headers

  ------ ------------------------ ---------------------------------------
  ID     Name                     Value

  1      Content-Type             application/json

  2      Authorization            Bearer \<access_token\>

                                  
  ------ ------------------------ ---------------------------------------

Request Parameters

  ---- ----------------- ------------- ----------------------- --------------
  ID   Name              Type          Description             Required

  1    gateway_host      String        Defines the gateway     Yes
                                       host                    

  2    credentials       Array         Array of username and   Yes
                                       password                

  3    account_number    String        Unique Account No       Yes

  4    amount            String        Amount to be paid       Yes

  5    product_item_id   String        Product Item ID, this   Yes
                                       provided                

  6    ext_outbound_id   String        Transaction ID          No

  7    scheduled_send    Date Time     d/m/Y H:M (am/pm)       No
  ---- ----------------- ------------- ----------------------- --------------

Response Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json
  --------- -------------------------------- -----------------------------

Response Parameters

  ----- ------------------- ---------------- -----------------------------
  ID    Name                Type             Description

  1     response_status     String           Status code, 00 indicates
                                             success

  2     response            String           Message accompanying the
                                             status
  ----- ------------------- ---------------- -----------------------------

Error Responses

TBC

6.  Biller Float

Description: This request will query biller float

HTTP Method: POST

URL: /biller-float/

Example Request Headers

  ------ ------------------------ ---------------------------------------
  ID     Name                     Value

  1      Content-Type             application/json

  2      Authorization            Bearer \<access_token\>

                                  
  ------ ------------------------ ---------------------------------------

Request Parameters

  ---- ----------------- ------------- ----------------------- --------------
  ID   Name              Type          Description             Required

  1    gateway_host      String        Defines the gateway     Yes
                                       host                    

  2    credentials       Array         Array of username and   Yes
                                       password                

  3    account_number    String        Unique Account No       Yes

  4    amount            String        Amount to be paid       Yes

  5    product_item_id   String        Product Item ID, this   Yes
                                       provided                

  6    ext_outbound_id   String        Transaction ID          No

  7    scheduled_send    Date Time     d/m/Y H:M (am/pm)       No
  ---- ----------------- ------------- ----------------------- --------------

Response Headers

  --------- -------------------------------- -----------------------------
  ID        Name                             Value

  1         Content-Type                     application/json
  --------- -------------------------------- -----------------------------

Response Parameters

  ----- ------------------- ---------------- -----------------------------
  ID    Name                Type             Description

  1     response_status     String           Status code, 00 indicates
                                             success

  2     response            String           Message accompanying the
                                             status
  ----- ------------------- ---------------- -----------------------------

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

1.  Institution has to be created on the backend

2.  Float top up to account

Known Issues

N/A


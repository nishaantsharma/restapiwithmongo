# Simple REST based E-Commerce App

## Introduction:
A simple REST Api based application for E-Commerce with JWT Authentication. The following app uses Lumen as Back end framework powered with MongoDB as database.

# Technologies:
Project is created with:

PHP v7.3.21 ; MongoDb v4.4 ; Lumen v8.0

# Libraries / Packages:
chuckrincon/lumen-config-discover: ^1.0

jenssegers/mongodb: ^3.8

tymon/jwt-auth: ^1.0

# API Docs
## Show Products

_URL_ : **/products/{id}**

_Method_: **GET**

_URL Params_: **id** (In case of getting a single product detail)

_Data params_: **None**

**_Success Response_**:

_Code_: 200

_Content_: **[{ id : 12 , productName : "Mouse" },{ id : 10 , productName : "Keyboard"}**]

OR

_Code_: 200

_Content_: **{ id : 12 , productName : "Mouse"}**

OR

_Code_: 200

_Content_: **"Resource is Empty."**

## Create Products

_URL_ : **/products/**

_Method_: **POST**

_URL Params_: **None**

_Data params_: { "pname" : "Mouse", "qty" : 20, "price" : 100 }

**_Success Response_**:

_Code_: 200

_Content_: **Resource added successfuly**

**_Error Response_**:

_Code_: 404

_Content_: **Resource doesn't exist.**

## Patch Products

_URL_ : **/products/{id}**

_Method_: **POST**

_URL Params_: **id{Required}**

_Data params_: { "pname" : "Mouse", "qty" : 20, "price" : 100 }

**_Success Response_**:

_Code_: 200

_Content_: **Resource updated successfuly**

**_Error Response_**:

_Code_: 404

_Content_: **Resource doesn't exist.**

## Delete Products

_URL_ : **/products/{id}**

_Method_: **POST**

_URL Params_: **id{Required}**

_Data params_: **None**

**_Success Response_**:

_Code_: 200

_Content_: **Resource deleted successfuly**

**_Error Response_**:

_Code_: 404

_Content_: **Resource doesn't exist.**


## Register Customer

_URL_ : **/register**

_Method_: **POST**

_URL Params_: **None**

_Data params_: {"name":"John Doe","email":"johnknowsnothing@got.in","password":"randompass","confirm_password":"randompass"}

**_Success Response_**:

_Code_: 200

_Content_: **You are registered successfully**

## Login Customer

_URL_ : **/login**

_Method_: **POST**

_URL Params_: **None**

_Data params_: **{"email":"johnknowsnothing@got.in","password":"randompass"}**

**_Success Response_**:

_Code_: 200

_Content_: **{ 'access_token' : 'Authentication token' , 'token_type' => 'bearer', 'expires_in' : 3600 }**

**_Error Response_**:

_Code_: 401

_Content_: **{ 'error' : 'Unauthorized' }**

## Protected Routes (JWT Authenticated):

## Customer Profile

_URL_ : **/customer**

_Method_: **GET**

_URL Params_: **None**

_Data params_: **None**

_Header Param_ : **Authentication : Bearer AuthenticationTokenObtainedInResponse**

**_Success Response_**:

_Code_: 200

_Content_: **{ 'name':'John Doe' , "email":"johnknowsnothing@got.in" }**

**_Error Response_**:

_Code_: 401

_Content_: **{ 'error' : 'Unauthorized' }**

## Show Orders

_URL_ : **/orders/{id}**

_Method_: **GET**

_URL Params_: **id** (In case of getting a single product detail)

_Data params_: **None**

_Header Param_ : **Authentication : Bearer AuthenticationTokenObtainedInResponse**

**_Success Response_**:

_Code_: 200

_Content_: **[{ id : 12 , productName : "Mouse", "qty" : 2 },{ id : 12 , productName : "Keyboard", "qty" : 4}]**

OR

_Code_: 200

_Content_: **{ id : 12 , productName : "Mouse", "qty" : 2}**

**_Error Response_**:

_Code_: 401

_Content_: **{ 'error' : 'Unauthorized' }**

OR

_Code_: 404

_Content_: **Resource doesn't exist**

## Create Orders

_URL_ : **/orders/**

_Method_: **POST**

_URL Params_: **None**

_Data params_: **{ "productId" : "124", "qty" : 2 }**

_Header Param_ : **Authentication : Bearer AuthenticationTokenObtainedInResponse**

**_Success Response_**:

_Code_: 200

_Content_: **Order Placed Successfully**

**_Error Response_**:

_Code_: 401

_Content_: **{ 'error' : 'Unauthorized' }**


## Logout

_URL_ : **/logout/**

_Method_: **POST**

_URL Params_: **None**

_Data params_: **None**

_Header Param_ : **Authentication : Bearer AuthenticationTokenObtainedInResponse**

**_Success Response_**:

_Code_: 200

_Content_: **You are logged out successfully**

**_Error Response_**:

_Code_: 401

_Content_: **{ 'error' : 'Unauthorized' }**












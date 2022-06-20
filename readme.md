# What is API? 
Application Programming Interface (API) is a software interface that allows two applications to interact with each other without any user intervention

# Introduction to API project
Post method is mainly used at the client (Browser) side to send data to a Specified server in order to create or rewrite a particular resource/data
Using POST API, client request to the server and server will send the releavent response to the client.

POST API
"http://api.mapmycrop.com/polygon" 
here appid is Personal API key

Use following body (Update the coordinates for each new request)
{
        "name": "Polygon Sample",
        "geo_json": {
          "type": "Feature",
          "properties": {
            "name": "rohan"
          },
          "geometry": {
            "type": "Polygon",
            "coordinates": [
              [
               [
                  43.82094740867615,
                  18.46685853003205
                ],
                [
                  43.82116198539734,
                  18.465617007610437
                ],
                [
                  43.82321119308472,
                  18.465901947976928
                ],
                [
                  43.82321119308472,
                  18.466899235533113
                ],
                [
                  43.82094740867615,
                  18.46685853003205
                ]
              ]
            ]
          }
        }
      }

![](https://github.com/ROHAN28SAM/Get-Post-API-assignment/blob/main/images/getPolyidFromResponse.png)


# POST API 
Request to add polygoan and get response which contain polyId
1. Enter the body in textarea
2. Click on Post Data 
3. polyid from the response body will be display in Input bar

# GET API
Get method is mainly used at the client (Browser) side to send a request to a specified server to get certain data or resources

GET API
"http://api.mapmycrop.com/soil?polyid=idValue"
here idValue is polyid received from POST API response.

![](https://github.com/ROHAN28SAM/Get-Post-API-assignment/blob/main/images/getDataFromResponse.png)

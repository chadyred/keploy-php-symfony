# Keploy with Symfony

We have to use Symfony "as a binary", and the most simple way is to use the embedded server.

- I we forget a 404 or to identify asset calls which generate a 404 everytime, it is nice to play this test with all data and assets
installed to be closer of the production server
- Record only what we failed like a page access
- Docker seems to be used and created without taking "compose.yaml" and the "healthcheck" seems to block the record...don't know why

To test : 

```
The rerecord cmd allow user to record new keploy testcases/mocks from the existing test cases for the given testset(s)
Usage:

keploy rerecord -c "node src/app.js" -t "test-set-0"
```

DEMO :

1. make ENV=test start && sleep 2 && make init-db && make fixtures && make ENV=test keploy-record
2. Open browser in ghost mode
3. go to "/"
4. go to "/login" : test@test.com / test
5. stop record
6. m ENV=test keploy-test

TODO : 

- check slack to know how to replace / assert but ignore in body form as string
- try to add fields to show the "rerecord" option with the new filed and without create a new test
- problematic ito the cache / test context because we have a diff...it is specified also for the cache, so we have to
  use "ESI" to cache only the static block and not the variables to be able to ot create systématically the cache
- LAUNCH TEST IN A NEW AND CONFIDENTIAL TAB : FIELDS COULD BE PREFILLED BECAUSE OF THE BROWSER, check how to warn that

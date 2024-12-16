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

1. `make ENV=test keploy-record`
2. Open browser in ghost mode
3. go to "/"
4. go to "/login" : test@test.com / test
5. stop record
6. `make ENV=test keploy-test`

TODO : 

- make the tcp://docker:2715 port accessible and not the /var/docker/docker.sock hardcoded > recompile Keploy (make a diff and apply on CI to test)

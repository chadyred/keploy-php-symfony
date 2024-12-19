# Keploy with Symfony

The topics is : `BOOKS and LIBRARY`

We have to use Symfony "as a binary", and the most simple way is to use the embedded server.

1. `make ENV=test start`
2. `make init-db && make fixtures`
3. Open browser in ghost mode
4. go to "/"
5. go to "http://localhost:8000/login" : test@test.com / test
6. stop record
7. `make ENV=test keploy-record` to record
8. `make ENV=test keploy-test` to test recorded mocks & tests

## Admin area

As we use API platform admin:

1. `make assets`
2. `make init-db && make fixtures`
3. go to "http://localhost:8000/admin"
4. See schema at `http://localhost:8000/api/docs.jsonopenapi`
5. API HTML interaction is `http://localhost:8000/api/docs`

## Make command (to play into "symfony" repository)

```shell
Workflow command:
  start-bdd Start the database with docker up in demonized mode
  start Start the project with docker and build container
  stop Stop the project started with docker
  restart Stop and start the project
  assets Compile assets (take care of message from the command)
  install Create environment docker file, install PHP and node deps
  vendor/autoload_runtime.php Install vendor (use -B to force command)
  composer/% Used to update compose dependencies

CLI command:
  pnpm/% Run a pnpm command like `make pnpm/'run dev'`
  sc/% Run a command console through symfony CLI like `make sc/'c:c'`
  cc Clean all symfony cache, including the file cache and other cache (persisted etc)
  fixtures Load fixtures
  keploy-record Record keploy
  keploy-rerecord Rerecord keploy with TEST as `make ENV=test TEST=books-v1 keploy-rerecord`
  keploy-test Play keploy tests or one test as `make TEST=001-test keploy-test`
  keploy-gen Load keploy record
```

## TODO

Make the tcp://docker:2715 port accessible and not the /var/docker/docker.sock hardcoded > recompile Keploy (make a diff and apply on CI to test)

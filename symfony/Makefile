.DEFAULT_GOAL = help

GIT := $(shell which git)
SUB_MAKE := $(shell which make)
RM := $(shell which rm)
DOCKER := $(shell which docker)
MKDIR := $(shell which mkdir)
DOCKER_COMPOSE := $(DOCKER) compose --env-file .env-compose
DOCKER_COMPOSE_RUN := $(DOCKER_COMPOSE) run --rm
DOCKER_EXEC_PHP := $(DOCKER) exec -it php-s-book-store
PHP := $(DOCKER_COMPOSE) run --rm php-s
USER_ID := $(shell id -u)
GROUP_ID := $(shell id -g)
TEST_REPORT_BASE_PATH := tests/reports
NO_TTY ?= false
PNPM := $(DOCKER_COMPOSE_RUN) node pnpm

ifeq ("$(NO_TTY)","false")
	COMPOSER := $(DOCKER_COMPOSE) run --rm -it php-s composer
else
	COMPOSER := $(DOCKER_COMPOSE) run --rm -T php-s composer
endif

ENV ?= dev
APP_ENV ?= $(ENV)

.PHONY: .env-compose start-bdd start stop restart stop-bdd clean install composer/% keploy-test


## Add variable useful for docker like GUI and UID
.env-compose:
	@echo "UID=$(USER_ID)" > $@
	@echo "GID=$(GROUP_ID)" >> $@
	@echo "APP_ENV=$(APP_ENV)" >> $@


######
Workflow command:

## Start the database with docker up in demonized mode
start-bdd:
	$(DOCKER_COMPOSE) up -d postgres

## Start the project with docker and build container
start: .env-compose
	$(DOCKER_COMPOSE) up -d --build

## Stop the project started with docker
stop:
	$(DOCKER_COMPOSE) down

## Stop and start the project
restart: stop start

stop-bdd:
	$(DOCKER_COMPOSE) down postgres

# Stop and clean docker container (volume and orphans)
clean:
	$(DOCKER_COMPOSE) down --remove-orphans -v

# Run db migration
init-db:
	docker exec -it php-s-book-store sh -c "php bin/console doctrine:migr:migr -n"

## Compile assets (take care of message from the command)
assets: node_modules/.modules.yaml
	$(SUB_MAKE) sc/'asset:install'
	$(SUB_MAKE) pnpm/'run $(ENV)'

node_modules/.modules.yaml:
	$(SUB_MAKE) pnpm/'install'

## Create environment docker file, install PHP and node deps
install: .env-compose vendor/autoload_runtime.php assets

## Install vendor (use -B to force command)
vendor/autoload_runtime.php:
	$(COMPOSER) install

## Used to update compose dependencies
composer/%:
	$(COMPOSER) $*

######
CLI command:

## Run a pnpm command like `make pnpm/'run dev'`
pnpm/%: .env-compose
	$(PNPM) $*

## Run a command console through symfony CLI like `make sc/'c:c'`
sc/%: .env-compose
	$(PHP) bin/console $*

## Clean all symfony cache, including the file cache and other cache (persisted etc)
cc:
	$(SUB_MAKE) sc/'c:p:c --all'
	$(SUB_MAKE) sc/'c:c'

## Load fixtures
fixtures:
	# $(SUB_MAKE) sc/'hautelook:fixtures:load --purge-with-truncate -n'
	$(DOCKER_EXEC_PHP) bin/console hautelook:fixtures:load --purge-with-truncate -n

## Record keploy
keploy-record: install
	$(SUB_MAKE) ENV=test start
	sleep 2  
	$(SUB_MAKE) init-db 
	$(SUB_MAKE) fixtures
	keploy record

## Rerecord keploy with TEST as `make ENV=test TEST=books-v1 keploy-rerecord`
keploy-rerecord: install
	$(SUB_MAKE) ENV=test start
	sleep 2  
	$(SUB_MAKE) init-db 
	$(SUB_MAKE) fixtures
	keploy rerecord -t "$(TEST)"

## Play keploy tests or one test as `make TEST=001-test keploy-test`
keploy-test: install clean cc .env-compose
ifneq ("$(TEST)","")
	keploy test -t $(TEST)
else
	keploy test
endif

## Load keploy record
keploy-gen:  install
	$(SUB_MAKE) ENV=test start
	sleep 2
	$(SUB_MAKE) init-db
	$(SUB_MAKE) fixtures
	keploy generate-tests -s "book.json" --debug

help:
	@awk '/^[a-zA-Z \-_0-9(\\u00a9|\\u00ae|[\\u2000-\\u3300]|\\ud83c[\\ud000-\\udfff]|\\ud83d[\\ud000-\\udfff]|\\ud83e[\\ud000-\\udfff])]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":") - 1); helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} ${GREEN}%s${RESET}\n", helpCommand, helpMessage; \
		} \
		isTopic = match(lastLine, /^###/); \
	    if (isTopic) { printf "\n%s\n", $$0; } \
	} { lastLine = $$0 }' $(MAKEFILE_LIST)


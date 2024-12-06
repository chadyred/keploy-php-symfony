.PHONY: start-bdd
start-bdd:
	docker compose up -d postgres

.PHONY: start-php-server
start-php-server:
	docker compose up -d php

.PHONY: stop-bdd
stop-bdd:
	docker compose down postgres

.PHONY: stop-php-server
stop-php-server:
	docker compose down php

.PHONY: stop
stop:
	docker compose down --remove-orphans -v

init-db:
	docker exec -it postgres-book-store sh -c "psql -U keploy-user -d keploy-test -f /docker-entrypoint-datadb.d/data.sql"

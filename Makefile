COMPOSER ?= composer
PHP = php

clear:
	@echo "Clear Cache and Logs Directory"
	rm -rf var/cache/*
	rm -rf var/logs/*


config:
	@echo "Config Symfony Application"
	cp .env.dist .env
	$(COMPOSER) install


sf-clear:
	@echo "Symfony Cache Clear"
	$(PHP) bin/console cache:clear
	$(PHP) bin/console cache:warmup


syntax-fix:
	./vendor/bin/php-cs-fixer fix


syntax-to-fix:
	./vendor/bin/php-cs-fixer fix --diff --dry-run -v


test: clear config sf-clear
	./bin/phpunit


lint:
	./bin/console lint:yaml config
	@find src tests -type f -name \*.php | while read file; do php -l "$$file" || exit 1; done


validate:
	$(COMPOSER) validate --strict
	./bin/console doctrine:schema:validate --skip-sync -vvv --no-interaction


security:
	./bin/console security:check --end-point=https://security.sensiolabs.org/check_lock


ci: clear config sf-clear syntax-to-fix test lint validate security
	@echo "Nice!"


.PHONY: clear config sf-clear lint validate security
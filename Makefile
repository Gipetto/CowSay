.PHONY: test test-install

COMPOSER = $(shell which composer)
ifeq ($(strip $(COMPOSER)),)
	COMPOSER = php composer.phar
endif

PHPUNIT = $(shell which phpunit)
ifeq ($(strip $(PHPUNIT)),)
	PHPUNIT = vendor/bin/phpunit
endif

PHPUNIT_CONFIG = tests/phpunit.xml
ifeq ($(LEGACY), true)
	PHPUNIT_CONFIG = tests/phpunit-legacy.xml
endif

test-install:
	$(COMPOSER) install --dev

test:
	XDEBUG_MODE=coverage \
	$(PHPUNIT) \
		--coverage-clover clover.xml \
		--coverage-html coverage \
		--colors \
		--configuration $(PHPUNIT_CONFIG);

demo:
	php demo.php
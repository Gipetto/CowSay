.PHONY: test test-install

COMPOSER = $(shell which composer)
ifeq ($(strip $(COMPOSER)),)
	COMPOSER = php composer.phar
endif

PHPUNIT = $(shell which phpunit)
ifeq ($(strip $(PHPUNIT)),)
	PHPUNIT = vendor/bin/phpunit
endif

test-install:
	$(COMPOSER) install --dev

test:
	$(PHPUNIT) -v\
		--coverage-clover clover.xml \
		--coverage-html coverage \
		--colors \
		--configuration tests/phpunit.xml;

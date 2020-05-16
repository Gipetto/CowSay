.PHONY: test test-install

COMPOSER = $(shell which composer)
ifeq ($(strip $(COMPOSER)),)
	COMPOSER = php composer.phar
endif

test-install:
	$(COMPOSER) install --dev

test:
	vendor/bin/phpunit -v\
		--coverage-clover clover.xml \
		--coverage-html coverage \
		--colors \
		--configuration tests/phpunit.xml;
.PHONY: test test-install

COMPOSER = $(shell which composer)
ifeq ($(strip $(COMPOSER)),)
	COMPOSER = php composer.phar
endif

test-install:
	$(COMPOSER) install

test:
	@PATH=vendor/bin:$(PATH) phpunit --coverage-clover clover.xml \
		--colors \
		--configuration tests/phpunit.xml;
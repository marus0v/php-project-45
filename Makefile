install: # установить зависимости
	composer install

validate: # проверка validate
	composer validate

brain-games: # запустить brain-games
	./bin/brain-games

brain-even: # запустить brain-even (проверка на четность)
	./bin/brain-even

lint: # установить CodeSniffer
	composer exec --verbose phpcs -- --standard=PSR12 src bin

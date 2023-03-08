install: # установить зависимости
	composer install

validate: # проверка validate
	composer validate

brain-games: # запустить brain-games
	./bin/brain-games

brain-even: # запустить brain-even (проверка на четность)
	./bin/brain-even

brain-calc: # запустить brain-calc (калькулятор)
	./bin/brain-calc

brain-gcd: # запустить brain-gcd (поиск НОД)
	./bin/brain-gcd

brain-progression: # запустить brain-progression (поиск недостающего значения в прогрессии)
	./bin/brain-progression

lint: # установить CodeSniffer
	composer exec --verbose phpcs -- --standard=PSR12 src bin

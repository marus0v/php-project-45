install: # установить зависимости
	composer install
validate: # проверка validate
	composer validate
brain-games: # запустить braingames
	.bin/brain-games.php
lint: # установить CodeSniffer
	composer exec --verbose phpcs -- --standard=PSR12 src bin

# ЗАДАНИЕ

## Краткое описание:
Реализовать простейшее приложение - симуляция кошельков биткоина.

## Полное описание:
* Все данные должны хранится в своей базе данных.
* Должна быть возможности регистрации нового кошелька (выдаётся пара id кошелька и пароль кошелька)
* Возможность пополнения кошелька: записываем id кошелька, выбираем валюту USD(доллар США) или GBP(фунт стерлингов) или EUR(евро) по API (https://api.coindesk.com/v1/bpi/currentprice.json) переводим из данной валюты в биткоин и пополняем кошелёк.
* Возможность показать список в виде таблице всех кошельков: id кошелька и его баланс в биткоинах, также автоматический пересчёт в USD, GBP, EUR на текущий момент по API (https://api.coindesk.com/v1/bpi/currentprice.json)).
* Должна быть реализована пагинация (например с помощью input text переключаться по страницам), на каждой странице по 5 кошельков.
* Должна быть возможность поиска кошелька по id

Пример работы решения: https://goroshcko.ru/examples/bitcoin_wallet/

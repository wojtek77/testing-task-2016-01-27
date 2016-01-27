## Laravel 5.2 - zadanie testowe

#### Treść zadania

Prosty koszyk.

 * przygotować klasę Cart oraz interfejs dla tej klasy
 * element koszyka ma mieć id, nazwę, ilość, cena brutto i netto (netto kalkulowane automatycznie)
 * klasa ma mieć możliwość dodawania, usuwania, wyświetlania koszyka, dodatkowo potrzebne są funkcje:
  * get($id) która zwróci element koszyka
  * total() która zwróci łączną wartość koszyka
  * count($quantity) która zwróci zsumowane $ilosc elementów w koszyku przy wywołaniu Cart::count() oraz zwróci ilość elementów w koszyku przy użyciu Cart::count(true) - przykład: w koszyku są 2 elementy z $ilość 2 każdy, Cart::count() ma zwrócić 4, Cart::count(true) ma zwrócić 2
 * można (ale nie trzeba :)) używać Collection



#### Instalacja

	git clone https://github.com/wojtek77/testing-task-2016-01-27.git
	cd testing-task-2016-01-27
	composer install
    cp .env.example .env
    php artisan key:generate

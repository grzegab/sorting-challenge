# Uruchomienie

 1. Uruchomienie traefik: https://docs.traefik.io/v2.0/getting-started/quick-start/
 2. Uruchomienie dockera poprzez: docker-compose up -d
 3. Zainstalowanie zależności poprzez: `composer install`
 4. Stworzenie struktury bazy danych: `php bin/console doctrine:migrations:migrate`
 5. Załadowanie przykładowych danych: `php bin/console doctrine:fixtures:load`
 6. Dostępne strony z odpowiedziami `/zadanie-1`, `/zadanie-3`
 7. Zadanie drugie dostępne z pomiomu consoli: `php bin/console random-user` oraz `php bin/console random-user -f`

# Zadanie rekrutacyjne

## 1. 
    Znajdz błąd w zapytaniu: ( PostreSQL )
    SELECT p.id, p.number, SUM(i.premium)
    FROM policy p
    RIGHT JOIN installment i ON i.policy_id = p.id
    HAVING COUNT(i.id) > 1
    
    Napisz zapytania tworzące table do zapytania powyżej, które będą wydajne przy dużej licznie danych.
   
## 2. 
    Napisz prostą aplikację konsolową w jęzuku PHP której wynikiem będzie lista użytkowników 
    zawierająca ("First Name", "Last Name", "Address") w formacie JSON oraz w formie wizualnej. 
    
## 3.
    Stwórz widok HTML ( tabela ) którą będzie można posortować po kolumnach, dane do tabeli powinny być pobierane przez GET ( wykorzystaj kod z zadania 2 )

# Odpowiedzi

## Ad 1.

    - Brakuje `GRUOP BY p.id`:
     `SELECT p.id, p.number, SUM(i.premium) 
     FROM policy p 
     RIGHT JOIN installment i 
     ON i.policy_id = p.id 
     GROUP BY p.id
     HAVING COUNT(i.id) > 1`
     
    - Zapytanie tworzące tabele do zapytania powyżej:
     `INSERT INTO installment
     SELECT p.id, p.number, i.premium
     FROM policy p
     RIGHT JOIN installment i ON i.policy_id = p.id`

    Zazwyczaj łączenia i wstawiania danych są zarządaznie przez ORM, w przypadku Symfony: Doctrine.

## Ad. 2
    - Dodanie pakirtu Faker
    - Stworzenie komendy `random-user` z opcjonalnym parameterem -f, który pokazuje wynik w postaci tabeli
    
## Ad. 3
    Stworzenie prostej tabeli, którą można sortować klikając na nagłówki.
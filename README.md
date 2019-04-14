# Zadanie rekrutacyjne

## 1. 
Znajdz błąd w zapytaniu: ( PostreSQL )
   SELECT p.id, p.number, SUM(i.premium)
   FROM policy p
   RIGHT JOIN installment i ON i.policy_id = p.id
   HAVING COUNT(i.id) > 1
  
   
   Napisz zapytania tworzące table do zapytania powyżej, które będą wydajne przy dużej licznie danych.
   
##2. 
Napisz prostą aplikację konsolową w jęzuku PHP której wynikiem będzie lista użytkowników 
    zawierająca ("First Name", "Last Name", "Address") w formacie JSON oraz w formie wizualnej. 
    
# Odpowiedzi

## Ad 1.

 - Brakuje `GRUOP BY p.id`:
     SELECT p.id, p.number, SUM(i.premium) 
     FROM policy p 
     RIGHT JOIN installment i 
     ON i.policy_id = p.id 
     GROUP BY p.id
     HAVING COUNT(i.id) > 1
     
 - Zapytanie tworzące tabele do zapytania powyżej:
     INSERT INTO installment
     SELECT p.id, p.number, i.premium
     FROM policy p
        RIGHT JOIN installment i ON i.policy_id = p.id

Zazwyczaj łączenia i wstawiania danych są zarządaznie przez ORM, w przypadku Symfony: Doctrine.

## Ad. 2
    - Dodanie pakirtu Faker
    - 
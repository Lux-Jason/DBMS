#1. Find the information of actors whose first name is Russell:
SELECT * FROM actor WHERE first_name = 'Russell';

#2. Find the information of actors whose first name is Russell and last name is Close:
SELECT * FROM actor WHERE first_name = 'Russell' AND last_name = 'Close';

#3. Find the email of customers whose first name is Harry and active is 0:
SELECT email FROM customer WHERE first_name = 'Harry' AND active = 0;

#4. Find the full name of the actor whose id is 99:
SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM actor WHERE actor_id = 99;

#5. Find the title and special features of the films whose replacement cost is lower than 20 and rental rate is higher than 4.0:
SELECT title, special_features FROM film WHERE replacement_cost < 20 AND rental_rate > 4.0;

#6. Find the customer id of the customers who have made a payment on 2005-05-25 but the amount does not exceed 3:
SELECT customer_id FROM payment WHERE payment_date >= '2005-05-25' AND payment_date < '2005-05-26'  AND amount <= 3;

-- 1.Find the films (title) played by Zero Cage.
SELECT title
FROM sakila.film
JOIN sakila.film_actor USING (film_id)
JOIN sakila.actor USING (actor_id) 
WHERE first_name='Zero' AND last_name='Cage'


-- 2.Find the films (title) rented by George Linton. The join condition is ON.
SELECT title
FROM sakila.customer
JOIN sakila.rental ON customer.customer_id = rental.customer_id
JOIN sakila.inventory ON rental.inventory_id = inventory.inventory_id
JOIN sakila.film ON inventory.film_id = film.film_id
WHERE first_name = 'George' AND last_name = 'Linton';


-- 3.Find the customers (name) who have rented some action (category) films. The join condition is USING.
SELECT DISTINCT first_name, last_name
FROM sakila.customer
JOIN sakila.rental USING(customer_id)
JOIN sakila.inventory USING(inventory_id)
JOIN sakila.film USING(film_id)
JOIN sakila.film_category USING(film_id)
JOIN sakila.category USING(category_id)
WHERE name = 'Action';


-- 4.Join the tables film, film_category, and category, using both conditions ON and USING.
SELECT film.title, category.name
FROM sakila.film
JOIN sakila.film_category ON film_category.film_id = film.film_id
JOIN sakila.category USING(category_id);


-- 5.Find all pairs of customers (name) who have rented a same film. Any join condition is fine.
SELECT DISTINCT CONCAT(c1.first_name, " ",c1.last_name) AS name_1, CONCAT(c2.first_name," ",c2.last_name) AS name_2
FROM sakila.rental r1
JOIN sakila.rental r2 ON r1.inventory_id = r2.inventory_id AND r1.customer_id != r2.customer_id
JOIN sakila.customer c1 ON r1.customer_id = c1.customer_id
JOIN sakila.customer c2 ON r2.customer_id = c2.customer_id;


-- 6.Find the films rented by each customer. If a customer has not rented any film, give it a NULL value.
SELECT CONCAT(customer.first_name," ",customer.last_name) AS customer_name, film.title
FROM sakila.customer 
LEFT JOIN sakila.rental USING (customer_id)
LEFT JOIN sakila.inventory USING (inventory_id)
LEFT JOIN sakila.film USING (film_id);
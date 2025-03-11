-- 1. Rewrite the Example (pg. 5) of Set Operation for UNION without the UNION keyword.
SELECT title
FROM film
WHERE language_id = 1
   OR language_id = 2;


-- 2. Display the film_id and language of the English films played by Tim Hackman.
SELECT f.film_id, l.name AS language
FROM film f
JOIN language l ON f.language_id = l.language_id
WHERE l.name = 'English'
  AND f.film_id IN (
      SELECT fa.film_id
      FROM film_actor fa
      JOIN actor a ON fa.actor_id = a.actor_id
      WHERE a.first_name = 'Tim' AND a.last_name = 'Hackman'
  );


-- 3. Verify non-English films played by Tim Hackman, displaying film_id and language.
SELECT f.film_id, l.name AS language
FROM film f
JOIN language l ON f.language_id = l.language_id
WHERE f.film_id IN (
      SELECT fa.film_id
      FROM film_actor fa
      JOIN actor a ON fa.actor_id = a.actor_id
      WHERE a.first_name = 'Tim' AND a.last_name = 'Hackman'
  )
  AND l.name != 'English';


-- 4. Find the id of customers who live in Australia and have not rented any film.
SELECT c.customer_id
FROM customer c
JOIN address a ON c.address_id = a.address_id
JOIN city ci ON a.city_id = ci.city_id
JOIN country co ON ci.country_id = co.country_id
WHERE co.country = 'Australia'
AND c.customer_id NOT IN (
    SELECT DISTINCT customer_id
    FROM rental
);









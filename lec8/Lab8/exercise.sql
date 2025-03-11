ALTER TABLE staff ADD staff_rating INT AFTER password;
UPDATE staff SET staff_rating=10 WHERE staff_id=1;
-- 1.Find the films (title) played by Zero Cage.
SELECT f.title 
FROM film f
WHERE f.film_id IN (
    SELECT fa.film_id
    FROM film_actor fa
    JOIN actor a ON fa.actor_id = a.actor_id
    WHERE a.first_name = 'Zero' AND a.last_name = 'Cage'
);

-- 2.Find the films (title) rented by George Linton.

SELECT film.title 
FROM film,(
    SELECT film_id
    FROM inventory,(
        SELECT inventory_id
        FROM rental,(
            SELECT customer_id
        FROM customer
                WHERE   customer.first_name='George' AND
                                customer.last_name='Linton'
        ) AS C
        WHERE rental.customer_id = C.customer_id
    )AS R
    WHERE inventory.inventory_id = R.inventory_id
)AS I
WHERE film.film_id = I.film_id;

-- 3. Find the customers (name) who have rented some action (category) films.

SELECT DISTINCT customer.first_name, customer.last_name 
FROM customer, (
    SELECT customer_id 
    FROM rental, (
        SELECT inventory_id 
        FROM inventory, (
            SELECT film_id 
            FROM film_category 
            WHERE category_id = (
                SELECT category_id 
                FROM category 
                WHERE name = 'Action'
            )
        ) AS FC 
        WHERE inventory.film_id = FC.film_id
    ) AS I 
    WHERE rental.inventory_id = I.inventory_id
) AS R 
WHERE customer.customer_id = R.customer_id;

-- 4. Find the id of the films which have the lowest rental rate.

SELECT film_id 
FROM film 
WHERE rental_rate = (
    SELECT MIN(rental_rate) 
    FROM film
);

-- 5. Find the actors who have played a same film with Bolger (the last name of an actor).

SELECT DISTINCT a.first_name, a.last_name 
FROM actor a, (
    SELECT actor_id 
    FROM film_actor 
    WHERE film_id IN (
        SELECT film_id 
        FROM film_actor 
        WHERE actor_id IN (
            SELECT actor_id 
            FROM actor 
            WHERE last_name = 'Bolger'
        )
    ) AND actor_id NOT IN (
        SELECT actor_id 
        FROM actor 
        WHERE last_name = 'Bolger'
    )
) AS FA 
WHERE a.actor_id = FA.actor_id;

-- 6. Count the number of customers who have not rented any film. 
SELECT COUNT(*) AS customers_without_rentals
FROM customer
WHERE customer.customer_id NOT IN (
    SELECT DISTINCT customer_id
    FROM rental
);

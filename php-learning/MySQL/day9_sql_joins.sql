-- SQL JOINS

--INNER JOIN

SELECT users.id, users.name, organizations.user_id FROM users INNER JOIN organizations ON user.id= organizations.user_id;
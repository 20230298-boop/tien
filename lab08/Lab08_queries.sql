SELECT b.book_id, b.title, c.name AS category_name, p.name AS publisher_name, b.price, b.stock
FROM books b
JOIN categories c ON b.category_id = c.category_id
JOIN publishers p ON b.publisher_id = p.publisher_id;

SELECT c.name, COUNT(b.book_id) AS total_books
FROM categories c
LEFT JOIN books b ON c.category_id = b.category_id
GROUP BY c.category_id;

SELECT l.loan_id, m.full_name, l.loan_date, l.due_date, l.status
FROM loans l
JOIN members m ON l.member_id = m.member_id;

SELECT m.full_name, b.title, li.qty, l.due_date
FROM loans l
JOIN members m ON l.member_id = m.member_id
JOIN loan_items li ON l.loan_id = li.loan_id
JOIN books b ON li.book_id = b.book_id
WHERE l.status = 'BORROWED';

SELECT b.title, SUM(li.qty) AS total_qty
FROM loan_items li
JOIN books b ON li.book_id = b.book_id
GROUP BY b.book_id
ORDER BY total_qty DESC
LIMIT 5;

SELECT m.full_name, COUNT(DISTINCT l.loan_id) AS total_loans
FROM members m
LEFT JOIN loans l ON m.member_id = l.member_id
GROUP BY m.member_id;

SELECT b.book_id, b.title
FROM books b
LEFT JOIN loan_items li ON b.book_id = li.book_id
WHERE li.book_id IS NULL;

SELECT l.loan_id, m.full_name, l.due_date,
DATEDIFF(CURDATE(), l.due_date) AS overdue_days
FROM loans l
JOIN members m ON l.member_id = m.member_id
WHERE l.status = 'BORROWED'
AND l.due_date < CURDATE();

SELECT c.name, SUM(li.qty) AS total_qty
FROM categories c
JOIN books b ON c.category_id = b.category_id
JOIN loan_items li ON b.book_id = li.book_id
GROUP BY c.category_id
HAVING total_qty >= 5;

SELECT m.full_name, COUNT(l.loan_id) AS total_loans
FROM members m
JOIN loans l ON m.member_id = l.member_id
WHERE l.loan_date >= CURDATE() - INTERVAL 30 DAY
GROUP BY m.member_id
HAVING total_loans >= 3;

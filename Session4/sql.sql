INSERT INTO users(Fullname,Phone,Email,Birthday)
VALUES("Phan Hoàng Lâm","0774293654","lam@email.com","1998-06-12"),
	("Nguyễn Văn Tèo","0123456789","Teo@email.com","1999-06-12"),
    ("Trần Văn Tí","0774293614","Ti@gmail.com","1996-06-12"),
    ("Bành Văn Lên","0122332102","Len@email.com","1996-06-12"),
    ("Cù Văn Xuống","0124564234","Xuong@gmail.com","1997-06-12")
	
SELECT * FROM users WHERE Fullname LIKE"%a%"

UPDATE users SET Email = "test@gmail.com" WHERE Fullname LIKE"%n%" OR Phone LIKE"%5%"

DELETE FROM users WHERE Email LIKE"%gmail.com" AND year(Birthday) = 1997 AND Phone LIKE"%8%"
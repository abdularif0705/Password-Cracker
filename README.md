Reversing an MD5 hash (password cracking)
============================

This application uses a brute force technique where we simply 'forward hash' all possible combinations of characters in strings to reverse an MD5 hash. This would be similar to a situation where an e-commerce site stored hashed passwords in its database, and we somehow have gotten our hands on the database contents, and we want to take the hashed password and determine the actual plaintext passwords.

The simplest brute force approach generally is done by writing a series of nested loops that go through all possible combinations of characters. This is one of the reasons that password policies specify that you include upper case, lower case, numbers, and punctuation in passwords is to make brute force cracking more difficult. Significantly increasing the length of the password to something like 20-30 characters is a very good to make brute force cracking more difficult.

My application can take an MD5 value like "81dc9bdb52d04dc20036dbd8313ed055" (the MD5 for the string "1234") and check all combinations of four-digit "PIN" numbers to see if any of those PINs produce the given hash. 
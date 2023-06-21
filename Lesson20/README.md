# Using docker-compose file
1. Install docker
2. Run console command from Lesson20 folder to run container
    ```bash
    docker-compose up
    ```
3. Restore DB from file
    ```bash
    mysql -h 127.0.0.1 -u dbuser -p lessondb < ./DB/lessondb.sql
    ```
    and enter the password
4. Go to 127.0.0.1:8000 for DB managing
5. No number five!
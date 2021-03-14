![Screenshot from 2021-03-14 10-36-14](https://user-images.githubusercontent.com/34570686/111058005-7a3fa000-84b1-11eb-813a-3a39bfa9c5e1.png)
![Screenshot from 2021-03-14 10-36-18](https://user-images.githubusercontent.com/34570686/111058006-7c096380-84b1-11eb-9e04-a95bdb5ac265.png)
![Screenshot from 2021-03-14 10-36-23](https://user-images.githubusercontent.com/34570686/111058009-80358100-84b1-11eb-91c2-e74195fd4725.png)
![Screenshot from 2021-03-14 10-38-01](https://user-images.githubusercontent.com/34570686/111058010-80358100-84b1-11eb-89d0-98c5aaae35e5.png)
# question 1
i have implemented basic authentication, Admin and user can login same login page.i have used a roll based system.
validate the inputs used by regular expressions

# question 2
i have created a basic crud operation using ajax and i used a php built in function for export the csv.
find the employee migration file as well.

# question 3 

1.i have write rest api to calculate monthly salary based input csv file 
2.parameters  token,csv file
3.testing using : postman 
4.method : post 
5.curl example 
curl --location --request POST 'localhost:8000/api/getmonthlysalary' \
--form 'token="abcd"' \
--form 'file_data=@"/home/murali/Documents/test.csv"'

6. I have attached the test.csv file in the project folder and also the database file .

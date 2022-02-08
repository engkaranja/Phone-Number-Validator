# Phone-Number-Validator
This is a service for querying and validating international phone numbers. It fetches data from a static sqlite database and displays it on a web application. The web application has functionality to filter data based on the country code and validation status. 

#Boot Up the Services.
This project has two services; the backend and frontend application. 
  
    STARTING THE BACKEND SERVICE
    
   The backend directory contains a spring boot application. You can open the project either using eclipse IDE, Intelij or your favourite IDE. 
   To start the application, open your terminal and navigate to the backend directory. In there, type this command
   
   java -jar country-phone-number-0.0.1-SNAPSHOT.jar
   
   This will start the application on port 8000. You can change the port if it's in use. That's it. 
   To confirm if the service is up and running, type the following url on your browser 
   
   http://localhost:8000/customer
   
   This should return a json string with the customer data i.e id, name and phone. 
   
   
      STARTING THE FRONTEND SERVICE
   
   The frontend application is a web app that displays the customer data as given in the above endpoint. The app processes the data to extract the 
   country code, country and validates the numbers using a given regex. 
   
   Copy the frontend directory and paste it a php enabled web server such as apache. If you changed the port for the backend service, please navigate
   to frontend/app/Config.php file and change the port accordingly. Change the value of the data_url element. 
   
   The application should be accessible on your web browser using this url
   
   http://localhost/frontend/app/
   
      UNIT TESTING.
   
   Unit tests are critical in testing the smallest components of an application. This project has unit tests only for the frontend app. This is because new implementation    functions are only written here. The backend application relies heavily on Spring Boot Framework to fetch and display data. There is no implementation methods written in the application. 
   
   To run the unit tests on the frontend app. Navigate to the frontend directory and run this command
   
   Windows: .\vendor\bin\phpunit
   
   Mac/Linux: ./vendor/bin/phpunit
   
   The units tests are built using PHPUnit. You will be required to add this dependency if you do not already have it on your machine. Download PHPUnit from this link:
   https://phpunit.de/getting-started/phpunit-9.html
   
   The unit tests are written in this file. frontend/tests/UtilsTest.php . This tests the validatePhoneNumber($phone) method of the Utils class. This is the method that is being used to validate the phone numbers in the application. 
   
   Thank You!
   
   
   
   
  
    

#Shorten URL Project

Steps how to Shorten URL

Step 1: How to convert the long URL to a shortened URL
        1> Get Long URL.
        2>Create short key using  
        3>Now insert both long and short key into database
        4>I have a database table with four columns
          -id, integer, auto-increment
          -longurl, text, the long URL the user entered
          -shorturl, string, the shortened URL (static)
          -shortkey, text, random generated key
       5>Combine shorturl and shortkey stored into shorturl
       6>Return shorturl to view
       
Step 2:How to resolve a shortened URL to the long URL
       1>Copy that short url and paste it into another browser window.
       2>Parameter contain unique short key.
       3>Find short key related data into database.
       4>Return short key matched long url to view.

# Simplest-wikipedia-search
The code for using wikipedia search api with jquery ajax and php curl.  iits pretty simple really. 

 Since the api cannot bee used always since the domains are not accepted by wikipedia api
 I had to ddo it separately with PHP cURL instead of jquery ajax. This takes more time but
 It will woork on every situations. It will not though any unwanted header access allow errors
 The process is simple. The data obtained with cURL is not recognized as JSON that is why the 
 strring must be defined and cut here and there before parsing with JSON parse of javascript
 

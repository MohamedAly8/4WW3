# 4WW3 Group
Mohamed Aly | 400244055 | alym8

Mehak Rafi Khan | 400260674 | khanm294


# Important Notes


- We have completed all requirements of the project but some requirements have bugs. We ask that if you see something missing to please refer to our code, since every requirment is implemented to at least 90% of the work required. 


- The Dynamic Map Results worked, but then started giving errors when new objects were added. We have completed this requirement but there is a small bug that we were unable to fix with regards to the PHP/SQL aspect to having continious addition of object on the map. Please refer to the code below for how we search for the appropriate latitude and longtitude from the SQL table and plotted the points on the leaflet map. 


```
// var rows = <?php $statement = $pdo->query("SELECT * FROM `MyObjects` WHERE (`name` = $var_value)");
//   $rows = $statement->fetchall(PDO::FETCH_ASSOC);
//   echo json_encode($rows);
// ?>;

for(i = 0; i < rows.length; i++){
  //var marker = L.marker([rows[i]['latitude'], rows[i]['longitude']]).addTo(result_map);
  // const markerContent = rows[I][‘name] + “<br>” + rows[I][‘rating’] + ‘ stars’;
  //marker.bindPopup(markerContent);
}


//var marker = L.marker([43.58318179804465, -79.63780996170709]).addTo(result_map);

//marker.bindPopup("<b>Ozzy Burger</b><br>Great Burgers");
```

- Please note that in the Results page of a search for a restaurant, a table is shown with existing restaurants that match the name, if there are no matches, then no table will be displayed


- The user is only allowed to submit a review if they are logged in. Users must register then log in in order to add a review


- Live Website: http://chewreview.ca




# Our IP Address
http://18.116.139.109

# Link to Github
https://github.com/MohamedAly8/4WW3/




<?php

// Read the JSON file
$json_data = file_get_contents('data.json');

// Decode the JSON data
$data = json_decode($json_data, true);

// Create a search bar
echo '<input type="text" id="search" placeholder="Search...">';

// Create a function to search the data
function search($data, $search_term) {
  $results = [];
  foreach ($data as $item) {
    if (stristr($item['name'], $search_term)) {
      $results[] = $item;
    }
  }
  return $results;
}

// Get the search term from the search bar
$search_term = $_GET['search'];

// Search the data
$results = search($data, $search_term);

// Display the results
if ($results) {
  echo '<ul>';
  foreach ($results as $item) {
    echo '<li>';
    echo '<img src="' . $item['image'] . '" />';
    echo '<h2>' . $item['name'] . '</h2>';
    echo '</li>';
  }
  echo '</ul>';
} else {
  echo 'No results found.';
}

?>
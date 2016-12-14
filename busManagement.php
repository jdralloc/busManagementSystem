<?php
/*
** Solution by Jonathan Collard, of the problem identified here: https://gist.github.com/mnoack/6e4b66d5a8da1a73abd5
**
** Example code - this is to be used to test the new Bus Management System.
*/

require_once 'classes.php';
require_once 'functions.php';

// Instantiate variables in system
$busses = array();
$lines = array();
$routes = array();
$stops = array();

// Create several stops
$stops = createStop($stops, "A1");
$stops = createStop($stops, "A2");
$stops = createStop($stops, "A3");
$stops = createStop($stops, "A4");
$stops = createStop($stops, "B1");
$stops = createStop($stops, "B2");

// Output the stop code for all stops
printAllStops($stops);

// Create several routes
$routes = createRoute($routes, "Route One Forward", array(0, 1, 2, 3));
$routes = createRoute($routes, "Route One Return", array(3, 2, 1, 0));
$routes = createRoute($routes, "Route Two Forward", array(4, 5, 0));
$routes = createRoute($routes, "Route Two Return", array(0, 5, 4));

// Output all details for each route
printAllRoutes($routes, $stops);

// Create several lines
$lines = createLine($lines, 1234, array("Route One Forward", "Route One Return"));
$lines = createLine($lines, 1235, array("Route Two Forward", "Route Two Return"));

// Output all details for each line
printAllLines($lines, $routes, $stops);

// Create a bus, assign it to a line and set the schedule
$busses = createBus($busses, 1234, "08:55");

// Output the details for all busses
printAllBusses($busses);

// Change the schedule the bus is on (for Bus with id=0) to 9:55am and check the schedule has changed
printBusDetails($busses[0]);
echo PHP_EOL;
echo "Changing schedule for bus ID 0 to 09:55" . PHP_EOL . PHP_EOL;
$busses[0]->setSchedule("09:55");
printBusDetails($busses[0]);

// Change the Line the Bus is on and check the line has changed
echo PHP_EOL;
echo "Changing line number for bus ID 0 to 1235" . PHP_EOL . PHP_EOL;
$busses[0]->setLineNumber(1235);
printBusDetails($busses[0]);

// Get the line details for line 1235
echo PHP_EOL;
echo "Line details for Line 1235: ";
printLineDetails($routes, $stops, $lines[1235]);
echo PHP_EOL;

// Remove the bus with id=0 from the system
echo "Removing bus with ID 0" . PHP_EOL;
$busses = remove($busses, 0);

printAllBusses($busses);

?>
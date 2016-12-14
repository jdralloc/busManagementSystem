<?php
/*** Solution by Jonathan Collard, of the problem identified here: https://gist.github.com/mnoack/6e4b66d5a8da1a73abd5
**
** Functions to create, retrieve and update data from Bus Management System.
*/

/*
** Create functions
*/
function createStop($stopsArray, $stopCode) {
	array_push($stopsArray, $stopCode);
	return $stopsArray;
}

function createRoute($routesArray, $routeName, $stops = array()) {
	$thisRoute = new Route($stops);
	$routesArray[$routeName] = $thisRoute;
	return $routesArray;
}

function createLine($linesArray, $lineNumber, $routes) {
	$thisLine = new Line($routes);
	$linesArray[$lineNumber] = $thisLine;
	return $linesArray;
}

function createBus($bussesArray, $lineNumber, $schedule) {
	$thisBus = new Bus($lineNumber, $schedule);
	array_push($bussesArray, $thisBus);
	return $bussesArray;
}

/*
** Functions for printing all object details
*/
function printAllStops($stopsArray) {
	echo "Printing all stops:" . PHP_EOL;
	foreach ($stopsArray as $key => $stopNumber) {
		echo 'Stop ' . $stopNumber . PHP_EOL;
	}
	echo PHP_EOL;
}

function printAllRoutes($routesArray, $stopsArray) {
	echo "Printing all routes:" . PHP_EOL;
	foreach ($routesArray as $name => $route) {
		echo $name . ': ' . PHP_EOL;
		printRouteDetails($stopsArray, $route) . PHP_EOL;
	}
	echo PHP_EOL;
}

function printAllLines($linesArray, $routesArray, $stopsArray) {
	echo "Printing all lines:" . PHP_EOL;
	foreach ($linesArray as $lineNumber => $line) {
		echo 'Line ' . $lineNumber . ':' . PHP_EOL;
		echo 'It\'s routes are:' . PHP_EOL;
		printLineDetails($routesArray, $stopsArray, $line) . PHP_EOL;
	}
	echo PHP_EOL;
}

function printAllBusses($bussesArray) {
	echo "Printing details for all busses:" . PHP_EOL;
	foreach ($bussesArray as $id => $bus) {
		$lineNumber = $bus->getLineNumber();
		$schedule = $bus->getSchedule();
		echo 'Bus ' . $id . ' is assigned to line: ' . $lineNumber . ' and is on schedule: ' . $schedule . PHP_EOL;
	}
	echo PHP_EOL;
}

/*
** Functions for printing individual object details
*/
function printRouteDetails($stopsArray, $aRoute) {
	echo '(Stops:';
	foreach ($aRoute->getStopKeys() as $key => $stopKey) {
	 	echo ' ' . $stopsArray[$stopKey];
	 }
	 echo ')' . PHP_EOL;
}

function printLineDetails($routesArray, $stopsArray, $aLine) {
	foreach ($aLine->getRoutes() as $key => $routeName) {
		echo $routeName . ':';
		printRouteDetails($stopsArray, $routesArray[$routeName]);
	}
}

function printBusDetails($aBus) {
	echo 'Bus details:' . PHP_EOL;
	echo 'Time Schedule: ' . $aBus->getSchedule() . PHP_EOL;
	echo 'Line: ' . $aBus->getLineNumber() .PHP_EOL;
}

/*
** Function for deleting from arrays based on key
*/
function remove($array, $key) {
	unset($array[$key]);
	return $array;
}

?>
<?php
/*
** Solution by Jonathan Collard, of the problem identified here: https://gist.github.com/mnoack/6e4b66d5a8da1a73abd5
**
** Classes for the Bus Management System.
*/

/**
* Route class, defines a route and enables retrieval of the keys of each stop on the route.
*/
class Route
{
	// Each route is defined by a sequence of stops
	private $stops = array();

	// Initialise an array of stop code keys on this route at point of instantiation
	public function __construct($someStopKeys = array())
	{
		$this->stopKeys = $someStopKeys;
	}

	public function getStopKeys()
	{
		return $this->stopKeys;
	}
}

/**
* Line class, defines a line and enables retrieval of the routes on the line.
*/
class Line
{
	// Each bus line is defined as a series of routes (usually 2, forward and return)
	private $routes = array();

	// Initialise an array of routes on this line
	public function __construct($someRoutes)
	{
		$this->routes = $someRoutes;
	}

	public function getRoutes()
	{
		return $this->routes;
	}

	public function setRoutes($newRoutes)
	{
		$this->routes = $newRoutes;
		return true;
	}
}

/**
* Bus class, defines a bus and enables retrieval of the line and schedule that the bus is assigned to.
*/
class Bus
{
	// Buses are assigned to a line and a time schedule
	private $lineNumber = null;
	private $schedule = null;

	// Initialise the line and schedule this bus is assigned to
	public function __construct($theLine, $theSchedule)
	{
		$this->lineNumber = $theLine;
		$this->schedule = $theSchedule;
	}

	public function getLineNumber()
	{
		return $this->lineNumber;
	}

	public function getSchedule()
	{
		return $this->schedule;
	}

	public function setLineNumber($aLine)
	{
		$this->lineNumber = $aLine;
		return true;
	}

	public function setSchedule($anArrivalTime)
	{
		$this->schedule = $anArrivalTime;
		return true;
	}
}
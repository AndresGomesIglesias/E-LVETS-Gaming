<?php
class DateFormat {


//echo DateFormat::toSQL($date);

// version orginal 11/01/1899

// version mod 1899-01-11 22:27:00



	public static function alter($date, $before, $after) {
		return DateTime::createFromFormat($before, $date)->format($after);
	}
	public static function toSQL($date, $before = 'd/m/Y') {
		return self::alter($date, $before, 'Y-m-d H:i:s');
	}

	
	

	public static function toHTML($date, $before = 'Y-m-d H:i:s') {
		return self::alter($date, $before, 'd/m/Y');
	}
}

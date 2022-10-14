<?php

	namespace MF\Model;

	use App\Conection;

	class Container {

		public static function getModel($model){
			
			$db = Conection::getDB();

			$class = "App\\Models\\".ucfirst($model);

			return new $class($db);

		}

	}

?>
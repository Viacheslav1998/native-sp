<?php 

namespace Core;

class Controller
{
	protected function render(string $view, array $data = [])
	{       
		extract($data);

		$filePath = __DIR__ . "/../App/Views/$view.php";

		if(!file_exists($filePath))
		{
			require __DIR__ . "/../App/Views/base/404.php";
			return;
		}
		
		require __DIR__ . "/../App/Views/$view.php";     
	}

}	
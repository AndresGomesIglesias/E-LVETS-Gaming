<?php
class Conf{
    
    /**
     * Varible qui cache les erreurs à l'utilisateur
     */
	static $debug = 1; 

	static $databases = array(

		'default' => array(
			'host'		=> 'localhost',
			'database'	=> 'elvets',
			'login'		=> 'root',
			'password'	=> ''
        ),
	);
}





// prefix
Router::prefix('huadminha','admin');
Router::prefix('manager','admin');



// Main page
Router::connect('home/*','posts/index/*');
Router::connect('blog/*','posts/blog/*');

Router::connect('new/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('team/:slug-:id','users/team/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('team/:slug-:id/:para','users/team/id:([0-9]+)/slug:([a-z0-9\-]+)/para:([a-z0-9\-]+)');
Router::connect('team/:slug','users/team/slug:([a-z0-9\-]+)');
Router::connect('player/:name/:slug-:id','users/player/id:([0-9]+)/slug:([a-z0-9\-]+)/name:([a-z0-9\-]+)');
<?php
/**
 *   Core class file
 *
 *   Class Core
 *
 *
 * PHP Version 5.4
 *
 * @category Nothing
 * @package  Nothing
 * @author   bosca_a <alhan.bosca@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/PHP_Avance_my_framework/
 */
namespace MyCore;
use MyCore\Controller;
use MyCore\exceptions\NotFoundException;

/**
 *   Core class
 *
 *   Class Core
 *
 * @category Nothing
 * @package  Nothing
 * @author   bosca_a <alhan.bosca@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/PHP_Avance_my_framework/
 */
class Core
{
    /**
     * Constructor
     * Connect to bdd
     * @param array $class : name of the class 
     * @return nothing
     */
    public static function registerAutoload($class)
    {
        //recherche si controllers
        if (preg_match("/controllers/", $class) || preg_match("/models/", $class)) {
            if (file_exists(dirname(__FILE__) . '/../../' . str_replace('\\', '/', $class) . '.php')) {
                include_once dirname(__FILE__) . '/../../' . str_replace('\\', '/', $class) . '.php'; // on inclus la classe
            } else { 
                //header("Location: /PHP_Avance_my_framework/public/erreur.php");  
            }
        } else {
            if (file_exists(dirname(__FILE__) . '/../' . str_replace('\\', '/', $class) . '.php')) {
                include_once dirname(__FILE__) . '/../' . str_replace('\\', '/', $class) . '.php'; // on inclus la classe
            } else {
                //header("Location: /PHP_Avance_my_framework/public/erreur.php");
            }
        }
    }

    /**
     * Constructor
     * Connect to bdd
     * @return nothing
     */
    public static function run() 
    {
        try {
            spl_autoload_register('MyCore\Core::registerAutoload'); //On enregistre la fonction elle sera appelé dès qu'on instancie une classe
            if (isset($_GET['page'])) { // si url page definie
                $search = preg_match('([\/])', $_GET['page']); //Recher une slash
                if ($search) { // si la search ok
                    $table = explode('/', $_GET['page']); // recup la page et la ou les methodes
                    $name = ucfirst($table[0])."Controller"; //Nom du controller			
                    $name = "app\\controllers\\" . $name; // chemin + class
                    $test = new $name; //on instancie la class
                    if (empty($table[1])) {
                        $nameMethod = $table[0]."Action"; // nom de la medthode					
                    } else {
                        $nameMethod = $table[1]."Action"; // nom de la medthode
                    }
                    $test->$nameMethod(); // on appel la methode
                } else { // si il n'y a pas de slash (par defaut)
                    $name = ucfirst($_GET['page'])."Controller"; // recup la class
                    $name = "app\\controllers\\" . $name; // emplacement du controller + nom de la class
                    $test = new $name; //on instancie la class
                    $nameMethod = "indexAction"; // nom de la medthode
                    $test->$nameMethod();
                }
            } else { //si page n'est pas defini
                $name =  "app\\controllers\\IndexController";
                $test = new $name;
                $act = "indexAction";
                $test->$act;
            }
        } catch (Exception $e) {
            if ($e instanceof NotFoundException) {
                header("HTTP/1.1 404 Not Found");
            } else {
                header("HTTP/1.1 500 Internal Server Error");
            }
        }
    }
}

?>
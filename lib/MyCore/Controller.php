<?php
/**
 *   MyFramework class file
 *
 *   Class Controller
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

/**
 *   Controller class
 *
 *   Class Controller
 *
 * @category Nothing
 * @package  Nothing
 * @author   bosca_a <alhan.bosca@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/PHP_Avance_my_framework/
 */

abstract class Controller
{
    /**
     * Render 
     * Display content
     * @param  array $view  : The folder of destination
     * @param  array $table : The variable enter
     *   @return nothing
     */
    public function render($view, $table = null) 
    {
        $html = explode(':', $view); // recupere le dossier et html 

        $page =  file_get_contents(dirname(__FILE__) . '/../../app/views/' . $html[0] . '/' . $html[1] . ".html"); //Recupere le contenue de la page

        if ($table) { // si un argument est passer à table

            foreach ($table as $key => $value) {// boucle sur les elements
                $page = preg_replace('/{{ ' . $key . ' }}/', $value, $page); // remplace la clé par la valeur
            }
            echo $page; // affiche la page
        } else {
            echo $page;
        }
    }
}


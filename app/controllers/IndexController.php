<?php
/**
 *   IndexController class file
 *
 *   Class IndexController
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
namespace app\controllers;

use \app\models\UserTable;

/**
 *   IndexController class
 *
 *   Class IndexController
 *
 * @category Nothing
 * @package  Nothing
 * @author   bosca_a <alhan.bosca@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/PHP_Avance_my_framework/
 */
class IndexController extends \MyCore\Controller
{
    /**
     * Action 
     * Call the method indexAction 
     * @return nothing
     */
    public function indexAction() 
    {
        $userTable = new UserTable();
        //$u->create();
        $user = $userTable->findOne('login = ?', array('gs009'));
        $this->render('ControllerIndex:ViewIndex', $user);
    }
}

?>
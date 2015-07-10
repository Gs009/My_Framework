<?php 
/**
 *   UserTable class file
 *
 *   Class UserTable
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
namespace app\models;

use MyCore\Model;

/**
 *   UserTable class
 *
 *   Class UserTable
 *
 * @category Nothing
 * @package  Nothing
 * @author   bosca_a <alhan.bosca@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/PHP_Avance_my_framework/
 */
class UserTable extends Model
{
    /**
     * Action 
     * Call the method indexAction 
     * @return nothing
     */
    public function create()
    {
        $sql="CREATE TABLE user
			(
                id INT PRIMARY KEY NOT NULL,
                nom VARCHAR(100),
                prenom VARCHAR(100),
                email VARCHAR(255),
                date_naissance DATE,
                pays VARCHAR(255),
                ville VARCHAR(255),
                code_postal VARCHAR(5),
                nombre_achat INT
            )";
        $requete = self::$pdo->prepare($sql);
        $requete->execute();
    }
}

?>
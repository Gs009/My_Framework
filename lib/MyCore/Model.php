<?php 
/**
 *   Model class file
 *
 *   Class Model
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
use \PDO;

/**
 *   Model class
 *
 *   Class Model
 *
 * @category Nothing
 * @package  Nothing
 * @author   bosca_a <alhan.bosca@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/PHP_Avance_my_framework/
 */

abstract class Model
{

    /**
     * Get the link of the flux rss
     * @var $pdo {string} 
     */
    protected static $pdo;
    /**
     * Get the link of the flux rss
     * @var _host {string} 
     */
    private $_host;
    /**
     * Get the link of the flux rss
     * @var _dbname {string} 
     */
    private $_dbname;
    /**
     * Get the link of the flux rss
     * @var _socket {string} 
     */
    private $_socket;
    /**
     * Get the link of the flux rss
     * @var _login {string} 
     */
    private $_login;
    /**
     * Get the link of the flux rss
     * @var _pass {string} 
     */
    private $_pass;

    /**
     * Constructor
     * Connect to bdd
     * @return nothing
     */
    public function __construct()
    {
        try{
            $this->_host = 'localhost';
            $this->_dbname = 'myframework';
            $this->_socket = '/home/bosca_a/.mysql/mysql.sock';
            $this->_login = 'root';
            $this->_pass = '';
            // On se connecte à MySQL
            self::$pdo = new PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname.';unix_socket='.$this->_socket, $this->_login, $this->_pass);
        }
        catch(Exception $e){
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }
    }

    /**
     * Get the bdd
     * Connect to bdd
     * @return pdo
     */
    public function getBdd()
    {
        return self::$pdo;
    }

    /**
     * Get the sql req
     * Connect to bdd
     * @param  array $champ : The folder of destination
     * @param  array $name  :  The name od sd
     * @return nothing
     */
    public function findOne ($champ, $name)
    {
        $sql = "SELECT * FROM user WHERE ". $champ;
        $requete = self::$pdo->prepare($sql);
        $requete->execute($name);
        $user = $requete->fetch();
        return $user;
    }
}
?>
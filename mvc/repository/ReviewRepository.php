
<?php  

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class ReviewRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'review';


 public function createcar($marke, $modell, $review)
    {
        
        $query = "INSERT INTO $this->tableName (marke, modell, review) VALUES (?, ?, ?)";
        echo $marke;

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $marke, $modell, $review);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}
?>
<?php 

$totalcredit=$_SESSION['totalc'];
		$query=$db->prepare('UPDATE forum_membres SET  credit=:totalcredit
		WHERE membre_id = :id');
		$query->bindValue(':totalcredit',$totalcredit,PDO::PARAM_INT);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $query->CloseCursor();
		
?>
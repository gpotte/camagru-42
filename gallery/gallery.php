<?php
    include_once (__DIR__.'/../db/connect_db.php');
    session_start();

    function full_gallery(){
      $pdo = connect_db();
      $query = "SELECT id, path FROM photo ORDER BY id DESC";
      $sth = $pdo->prepare($query);
      $sth->execute();
      $i = 1;
      $array = $sth->fetchAll();
      foreach ($array as $value) {
        if (($i - 1) % 3 == 0)
          echo "<tr>";
        echo "<td><a href=showpic.php?id=".$value["id"].">";
        echo "<img src=../".$value["path"]."></img>";
        echo "</a></td>";
        if ($i % 3 == 0)
          echo "</tr>";
        $i++;
      }
    }

    function mini_gallery(){
      $pdo = connect_db();
      $query = "SELECT id, path FROM photo ORDER BY id DESC limit 14";
      $sth = $pdo->prepare($query);
      $sth->execute();
      $i = 1;
      $array = $sth->fetchAll();
      echo '<a href="gallery/index.php"><button>Access gallery</button></a><br>';
      foreach ($array as $value) {
        if (($i - 1) % 2 == 0)
          echo "<tr>";
        echo "<td><a href=gallery/showpic.php?id=".$value["id"].">";
        echo "<img class=gallery_img src=".$value["path"]."></img>";
        echo "</a></td>";
        if ($i % 2 == 0)
          echo "</tr>";
        $i++;
      }
    }

    function get_comm($id)
    {
      $pdo = connect_db();
      $like = "SELECT COUNT(id) AS nbr FROM `like` WHERE id_photo LIKE ?";
      $comm = "SELECT com, login FROM comment INNER JOIN users ON comment.id_user = users.id WHERE id_photo LIKE ?";
      $sth = $pdo->prepare($like);
      $sth->execute(array($id));
      $likes = $sth->fetchColumn();
      echo "<tr><td><span>".$likes." Likes</span>";
      like_button($id);      //AVEC LIKE OU UNLIKE SELON LA VALUE DU BOUTTON
      echo "</td></tr>";
      $sth = $pdo->prepare($comm);
      $sth->execute(array($id));
      $comments = $sth->fetchAll();
      foreach ($comments as $value) {
        echo "<tr><td><p>".htmlspecialchars($value["login"])." : ". htmlspecialchars($value["com"]) ."</p></td></tr>";
      }
      echo '<tr><td>
        <form id="com_form" onsubmit="comment(event)">
          <input type="text" placeholder="your comment" id="new_com" required>
          <input type="submit" value="commentez">
        </form>
      </td></tr>';
    }

    function get_pic($id)
    {
      $pdo = connect_db();
      $query = "SELECT `path` FROM photo WHERE id LIKE ?";
      $sth = $pdo->prepare($query);
      $sth->execute(array($id));
      $path = $sth->fetchColumn();
      echo "<img id=full_img src=../".$path."></img>";
    }

    function like_button($id)
    {
      $pdo = connect_db();
      $query = "SELECT id FROM users WHERE login LIKE ?";
      $like = "SELECT id FROM `like` WHERE id_photo LIKE ? AND id_user LIKE ?";
      $sth = $pdo->prepare($query);
      $sth->execute(array($_SESSION["username"]));
      $usr_id = $sth->fetchColumn();
      $sth = $pdo->prepare($like);
      $sth->execute(array($id, $usr_id));
      $r = $sth->fetch();
      if ($r)
        echo "<input type=submit id=like value=UNLIKE onclick='like()'></input>";
     else
        echo "<input type=submit id=like value=LIKE onclick='like()'></input>";
    }

    function delete_button($id)
    {
      $pdo = connect_db();
      $query = "SELECT id FROM photo WHERE ID_USER = ? AND ID = ? ";
      $user = "SELECT id FROM users WHERE login LIKE ?";
      $sth = $pdo->prepare($user);
      $sth->execute(array($_SESSION["username"]));
      $usr_id = $sth->fetchColumn();
      $sth = $pdo->prepare($query);
      $sth->execute(array($usr_id, $id));
      $r = $sth->fetch();
      if ($r)
        echo "
        <form method=post action=delete.php>
           <button name=delete value=".$id.">Delete Image</button>
        </form>
        ";
    }
 ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="css/style.min.css" rel="stylesheet">

<?php
include 'database.php';

class crudBook extends database
{
    public function Insert($obj)
    {
        $title = $obj->getTitle();
        $auther = $obj->getAuther();
        $price = $obj->getPrice();
        $img = $obj->getImg();
        $insert = $this->connection->prepare("INSERT INTO book (title,auther,price,imgPath) VALUES(?,?,?,?)");
        $insert->bind_param('ssss', $title, $auther, $price,$img);
        $insert->execute();
    }
    public function Show()
    {
        $show = $this->connection->prepare("SELECT * FROM book");
        $show->execute();
        $result = $show->get_result();
        $html = "
        <div class='white-box'>
        <table class='table'>
          <div class='table text-nowrap' id='myTable'>
        <thead>
        <tr>
        <th class='border-top-0'>Id</th>
        <th class='border-top-0'>Title</th>
        <th class='border-top-0'>Auther</th>
        <th class='border-top-0'>Price</th>
        <th class='border-top-0'>Poster</th>
        <th class='border-top-0'>Action</th>
        </tr>
        </thead>
        </div>
        </div>";
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            $html .= "
        <tr>
      <td>" . $row['id'] . "</td>
      <td>" . $row['title'] . "</td>
       <td>" . $row['auther'] . "</td>
       <td>" . $row['price'] . "</td>
       <td><img src='".$row['imgPath']."' height='75px'></td>

       <td>
       <a href='edit.php?id=" . $row['id'] . "' class='btn btn-success'>Edit</a>
       <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
       </td>
    </tr>";
        }
        $html .= '</table>';
        return $html;
    }
    public function Delete($id)
    {
        $delete = $this->connection->prepare("DELETE FROM book WHERE id = ?");
        $delete->bind_param('i', $id);
        $delete->execute();
    }
    public function readById($id)
    {
        $read = $this->connection->prepare("SELECT * FROM book WHERE id = ?");
        $read->bind_param('i', $id);
        $read->execute();
        $result = $read->get_result();
        $row = $result->fetch_assoc();
        return $row;
    }
    public function Edit($obj)
    {
        $title = $obj->getTitle();
        $auther = $obj->getAuther();
        $price = $obj->getPrice();
        $id = $obj->getId();
        $edit = $this->connection->prepare("UPDATE book SET title = ?,auther = ?,price = ? WHERE id  = ?");
        $edit->bind_param("sssi", $title, $auther, $price, $id);
        $edit->execute();
    }
}
?>

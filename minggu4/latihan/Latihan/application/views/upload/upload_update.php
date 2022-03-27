<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial Upload CodeIgniter</title>
  <style>
    .header {
      text-align: center;
    }

    .content {
      text-align: center
    }

    .content table {
      margin: 6px auto;
      text-align: left;
    }

  </style>
</head>

<body>
  <div class="header">
    <h1>Tutorial Upload CodeIgniter</h1>
    <h3>Update - Ubah Data</h3>
  </div>
  <div class="content">
    <?php echo anchor('','Back'); ?>
    <form action="<?=base_url('upload/update')?>" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Author</td>
          <td><input type="text" name="author" value="<?=$upload->author?>"></td>
        </tr>
        <tr>
          <td>Image</td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <img src="<?=base_url()?>assets/upload/images/<?=$upload->image?>" width="160px" alt="<?=$upload->image?>">
          </td>
        </tr>
        <tr>
          <input type="hidden" name="id" value="<?=$upload->id?>">
          <td></td>
          <td><input type="submit" value="Submit"></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>

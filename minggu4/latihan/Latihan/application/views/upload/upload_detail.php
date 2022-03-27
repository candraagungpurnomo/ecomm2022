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
    <h3>Detail Data #<?=$upload->id?></h3>
  </div>
  <div class="content">
    <?php echo anchor('','Back'); ?>
    <table>
      <tr>
        <td>Author</td>
        <td>:</td>
        <td><?=$upload->author?></td>
      </tr>
      <tr>
        <td>Image</td>
        <td>:</td>
        <td>
          <img src="<?=base_url()?>/assets/upload/images/<?=$upload->image?>" width="160px" alt="">
        </td>
      </tr>
    </table>
  </div>
</body>

</html>

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

    .content table,
    th,
    td {
      border: 1px solid black;
      margin: 6px auto;
    }

  </style>
</head>

<body>
  <div class="header">
    <h1>Tutorial Upload CodeIgniter</h1>
    <h3>List Data</h3>
  </div>
  <div class="content">
    <p><?=$this->session->flashdata('msg') ?></p>
    <?php echo anchor('upload/add/','Create'); ?>
    <table>
      <tr>
        <th>No</th>
        <th>Author</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
      <?php
      $no=1;
      foreach($uploads as $upload) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$upload->author?></td>
        <td>
          <img src="<?=base_url()?>assets/upload/images/<?=$upload->image?>" width="50px" alt="<?=$upload->image?>">
        </td>
        <td>
          <?php echo anchor('upload/detail/'.$upload->id,'Detail'); ?> |
          <?php echo anchor('upload/edit/'.$upload->id,'Update'); ?> |
          <?php echo anchor('upload/delete/'.$upload->id,'Delete'); ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>

</html>

<?php require_once('header.php') ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Menu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Number</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Message</th>
                    </tr>
                  </thead>
        
                  <?php foreach($data as $item):?>
             
                  <tbody>
                    
                   <tr>
                      <td><?= $item['name']?></td>
                      <td><?= $item['phone']?></td>
                      <td><?= $item['number_person']?></td>
                      <td><?= $item['date']?></td>
                      <td><?= $item['time']?></td>
                      <td><?= $item['message']?></td>
                  </tr>

                  </tbody>
            
                  <?php endforeach?>

                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
  </div>
  <!-- /.content-wrapper -->
  <?php require_once('footer.php') ?>
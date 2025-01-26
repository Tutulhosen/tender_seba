<style type="text/css">
  table, th, td {
    border: 1px solid black;
  }

  th {
    text-align: left;
  }
  
  td {
    text-align: center;
    padding: 2px 3px;
  }

  .tariff_details_tbl th, td {
    text-align: center;
    padding: 4px 4px;
  }
</style>

<section class="content-header">
  <h1> <?=$meta_title; ?> </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><?=$meta_title; ?></li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?=$meta_title; ?> </h3>
          <a href="<?=base_url('feedback/add')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> Create Feedback</a> 
          <a href="<?=base_url('feedback')?>" class="btn btn-info btn-xs pull-right" style="margin-left: 15px;"> All Feedback</a> 
        </div>        

          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table style="border-collapse: collapse;">
                  <tr>
                    <th> &nbsp;Feedback ID</th>
                    <td><?= $feedback_details['feedback_id'] ?></td>
                    <th> &nbsp;User Name</th>
                    <td><?= $user_details['webu_full_name'] ?></td>
                  </tr>
                  <tr>
                    <th> &nbsp;User E-Mail</th>
                    <td><?= $user_details['webu_email'] ?></td>
                    <th> &nbsp;User Cell No</th>
                    <td><?= $user_details['webu_phone'] ?></td>
                  </tr>
                  <tr>
                    <th> &nbsp;Feedback Subject</th>
                    <td><?= $feedback_details['feedback_subject'] ?></td>
                    <th> &nbsp;Feedback Description</th>
                    <td><?= $feedback_details['feedback_description'] ?></td>
                  </tr>
                </table>
                <hr>
                <table style="border-collapse: collapse; width: 100%;">
                <?php
                foreach($feedback_answer as $ansRow):
                  if($ansRow->answer_from == 1)
                  {
                    $tal = 'left';
                    $bckcol = '#add8e6';
                  }
                  else
                  {
                    $tal = 'right';
                    $bckcol = '#d3d3d3';
                  }
                ?>
                  <tr>
                    <td style="text-align: <?= $tal ?>; background-color: <?= $bckcol ?>;">
                       &nbsp;&nbsp; <?= $ansRow->answer_answer ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <small><?= date('d-m-Y H:i:s', strtotime($ansRow->answer_created)) ?></small>
                    </td>
                  </tr>
                <?php
                endforeach;
                ?>
                </table>
                <hr>
                <div>
                  <form method="post" action="<?= base_url('feedback/insert_answer/' . $feedback_details['feedback_id']) ?>">
                    <input type="text" name="answer_answer" class="form-control" placeholder="Type feedback here" required>
                    <input type="hidden" name="feedback_id" value="<?= $feedback_details['feedback_id'] ?>">
                    <br>
                    <button class="btn btn-primary pull-right">Submit</button>
                  </form>
                </div>
              </div>
            </div>            
            
          </div>
          <!-- /.box-body -->

          <div class="box-footer">  </div>
      </div> <!-- /.box -->
    </div>
  </div> <!-- /.row -->

</section> <!-- /.content -->

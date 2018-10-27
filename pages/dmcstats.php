<?php
    include "../header.php";  
    $sql = mysqli_query($db,"SELECT COUNT(main) as itemcount FROM equipment");
    $result = mysqli_fetch_assoc($sql);
    $items = $result['itemcount'];
    
    $sql = mysqli_query($db,"SELECT COUNT(*) + 460 as checkoutcount FROM checkoutlog");
    $result = mysqli_fetch_assoc($sql);
    $checkouts = $result['checkoutcount'];
    
    $sql = mysqli_query($db,"SELECT COUNT(*) as amountofusers FROM student");
    $result = mysqli_fetch_assoc($sql);
    $users = $result['amountofusers'];

    $sql = mysqli_query($db,"SELECT (COUNT(*)*2)+900 as papersaved FROM checkoutlog");
    $result = mysqli_fetch_assoc($sql);
    $paper = $result['papersaved'];
    $paperpertree = 100*(round(($result['papersaved']/10000), 2));
?>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-tree"></i>
              </div>
              <div class="mr-2"><h2>Paper Saved: <?php echo $paper." pages or ".$paperpertree."% of a tree."; ?></h2></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
                <div class="mr-2"><h2>Users: <?php echo $users; ?></h2></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-2"><h2>Total Checkouts: <?php echo $checkouts; ?></h2></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-briefcase"></i>
              </div>
              <div class="mr-2"><h2>Item Count: <?php echo $items; ?></h2></div>
            </div>
          </div>
        </div>
      </div>
        <div class="row" height="10%">
        </div>
        <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
            <div class="card mb-3 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card-header">
                    <h1>New Media Studies Students Skill Distribution</h1></div>
                <div class="card-body">
                    <canvas id="SkillspieChart" width="100%" height="50"></canvas>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
            <div class="card mb-3 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card-header"><h1>Camera Usage</h1></div>
                <div class="card-body">
                    <canvas id="CamerapieChart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script type='text/javascript'>
        function confirm_alert(node) {
            return confirm('Press OK to confirm.');
        }
        <?php 
        $sql = mysqli_query($db, "SELECT Count(case when game = 'X' then 1 else null end) as game , Count(case when web = 'X' then 1 else null end) as web , Count(case when video = 'X' then 1 else null end) as video, Count(case when sound = 'X' then 1 else null end) as sound, Count(case when graphic = 'X' then 1 else null end) as graphic, Count(case when photo = 'X' then 1 else null end) as photo FROM student"); 
        $result = mysqli_fetch_assoc($sql); 
        $game = $result['game']; 
        $web = $result['web']; 
        $video = $result['video']; 
        $sound = $result['sound']; 
        $graphic = $result['graphic']; 
        $photo = $result['photo'];
        
        $sql2 = mysqli_query($db, "SELECT COnum FROM equipment WHERE barcode IN ('0011','0016','0020','0027','0032','0038')");

        ?>
    </script>
    <script>
        var game = '<?php echo $game; ?>';
        var web = '<?php echo $web; ?>';
        var video = '<?php echo $video; ?>';
        var sound = '<?php echo $sound; ?>';
        var graphic = '<?php echo $graphic; ?>';
        var photo = '<?php echo $photo; ?>';
        var ctxP = document.getElementById("SkillspieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                    labels: ["Game Design", "Web Design", "Video Editing", "Sound Design", "Graphic Design", "Photography"],
                    datasets: [
                    {
                    data: [game, web, video, sound, graphic, photo],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#b73201", "#0e6d1c","#3c108c"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#b74c24", "#316d3a","#533787"]
                    }]},
    options: {
        responsive: true
    }
});
    </script>
    <script>
        //pie
        var ctxP = document.getElementById("CamerapieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                    labels: ["Canon 60D", "Canon T5i", "Sony a7s", "GH5", "Canon C100", "Canon C300"],
                    datasets: [
                    {
                    data: [
                        <?php  
                          while($row = mysqli_fetch_array($sql2))   
                          {  
                               echo $row["COnum"].",";  
                          }  
                          ?>
                    ],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#b73201", "#0e6d1c","#3c108c"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#b74c24", "#316d3a","#533787"]
                    }]},
    options: {
        responsive: true
    }
});
    </script>
  </div>
</div>
</body>

</html>

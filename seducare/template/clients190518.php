    <?php
        require_once 'header.html';



        $con = mysqli_connect("localhost", "scouts_ms_root", "ebNh1KA3fJ", "scouts_mysoft");
        echo mysqli_error($con);

        mysqli_set_charset($con,"utf8");

        $sql = "SELECT * FROM client WHERE client_type = 'education-sector' ORDER BY sort_order ASC";

        $result = mysqli_query($con, $sql);

        echo mysqli_error($con);
    ?>

    <div style="clear: both;"></div>
    <!-- Start Page Title Section -->
    <div class="page-ttl" style="padding-top: 200px;">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>Clients</h1>
                <p><a href="#">Home</a> &#8594; <span>Clients</span></p>
            </div>
        </div>
    </div><!-- End Page Title Section -->

    <!-- Start Faq Section -->
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="row">
                <table border="1" style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color: transparent; font-family: Arial, sans-serif; font-size: 14px;">
                    <thead>
                        <tr style="background-color: #54d3f7;">
                            <th style="text-align: center; padding: ;">SL</th>
                            <th style="text-align: center; padding: 10px 5px;">School/College Name</th>
                            <th style="text-align: center; padding: 10px 5px;">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sl = 0;
                    while($row = $result->fetch_assoc())
                    {
                        $sl++;
                    ?>
                        <tr>
                            <td style="text-align: center; font-weight: normal; "><?= $sl ?></td>
                            <td style="font-weight: normal; padding: 10px 5px;"> <?= $row['client_name'] ?></td>
                            <td style="font-weight: normal; padding: 10px 5px;"> <?= $row['location'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                        
                    </tbody>
                </table> 
            </div>
        </div>
    </div><!-- End Client Section -->
   
    <!-- Start Make an Appointment Modal -->
    <?php require_once 'demo_form.php'; ?>
    <!-- End Make an Appointment Modal -->
    
    <!-- Start Footer Section -->
    <?php require_once 'footer.php'; ?>
    
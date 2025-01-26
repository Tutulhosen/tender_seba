    <?php
        require_once 'header.html';

        require_once 'database.php';
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
                    while($row = $client_result->fetch_assoc())
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
    